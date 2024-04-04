<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['nome'])) {
    $response = ['sucesso' => false, 'mensagem' => "O nome deve ser preenchido!"];
} elseif (empty($dados['idPessoa'])) {
    $response = ['sucesso' => false, 'mensagem' => "O idPessoa deve ser preenchido!"];
} elseif (empty($dados['sobrenome'])) {
    $response = ['sucesso' => false, 'mensagem' => "O sobrenome deve ser preenchido!"];
} elseif (empty($dados['cpf'])) {
    $response = ['sucesso' => false, 'mensagem' => "O CPF deve ser preenchido!"];
} elseif (empty($dados['genero'])) {
    $response = ['sucesso' => false, 'mensagem' => "O genero deve ser selecionado!"];
} elseif (empty($dados['nascimento'])) {
    $response = ['sucesso' => false, 'mensagem' => "A data de nascimento deve ser preenchida!"];
} elseif (empty($dados['telefone'])) {
    $response = ['sucesso' => false, 'mensagem' => "O telefone deve ser preenchido!"];
} elseif (empty($dados['email'])) {
    $response = ['sucesso' => false, 'mensagem' => "O email deve ser preenchido!"];
}else {
    $idPessoa = $dados['idPessoa'];
    $idgenero = $dados['genero'];
    $nome = $dados['nome'];
    $sobrenome = $dados['sobrenome'];
    $cpf = $dados['cpf'];
    $telefone = $dados['telefone'];
    $email = $dados['email'];
    $foto = $_FILES['img']['name'];
    $nascimento = formatarDataHoraEn(addslashes(trim($dados['nascimento'])));

    
    $response = ['sucesso' => false, 'mensagem' => "ANTES DO IF"];
    

    if (!isset($_FILES['img']) || $_FILES['img']['error'] !== UPLOAD_ERR_OK) {
    
        $retornoUpdate = upCinco('pessoa','IdGenero','Nome', 'Sobrenome', 'Nascimento', 'Cpf','IdPessoa',$idgenero,$nome,$sobrenome,$nascimento,$cpf,$idPessoa);

        if ($retornoUpdate) {
            $acao = "Foi adicionado no sistema o usuário".$nome." ".$sobrenome;

            $retornoInsertAuditoria =  insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 1, 'pessoa', DATATIMEATUAL, "$ip", $pc, $dispositivo);
            if ($retornoInsertAuditoria) {
                $response = ['sucesso' => true, 'mensagem' => "Usuário cadastrado com sucesso!"];
            } else {
                $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro auditoria!"];
            }
        } else {
            $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro banco de dados!"];
        }

    } else{
    
        $extensaoArquivo = array('jpg', 'jpeg', 'png');
        $caminho = 'user/img/';
        $nome_original = $_FILES['img']['name'];
        $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));
    
        if (!in_array($extensao, $extensaoArquivo)) {
            $response = ['sucesso' => false, 'mensagem' => "Apenas arquivos JPG, JPEG e PNG são permitidos!"];
        } else {
        
            $identificador = uniqid();
            $novo_nome = 'Exclusivy-' . $identificador . '.' . $extensao;
            
            $foto = $novo_nome;
    
            if (move_uploaded_file($_FILES['img']['tmp_name'], $caminho . $novo_nome)) {
    
               
                    $retornoUpdate = upSeis('pessoa','IdGenero', 'Foto', 'Nome', 'Sobrenome', 'Nascimento', 'Cpf','IdPessoa',$idgenero,$foto,$nome,$sobrenome,$nascimento,$cpf,$idPessoa);
       
                if ($retornoUpdate) {
                    $acao = "Foi adicionado no sistema o usuário".$nome." ".$sobrenome;
                    $retornoInsertAuditoria =  insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 1, 'pessoa', DATATIMEATUAL, "$ip", $pc, $dispositivo);
                    if ($retornoInsertAuditoria) {
                        $response = ['sucesso' => true, 'mensagem' => "Usuário cadastrado com sucesso!"];
                    } else {
                        $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro auditoria!"];
                    }
                } else {
                    $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro banco de dados!"];
                }
            } else {
                $response = ['sucesso' => false, 'mensagem' => "Erro ao enviar o arquivo!"];
            }
        }
    }
}


echo json_encode($response);
?>