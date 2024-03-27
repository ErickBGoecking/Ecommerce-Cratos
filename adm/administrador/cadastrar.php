<?php
echo "alert(´entrou na pagima´)";
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['nome'])) {
    $response = ['sucesso' => false, 'mensagem' => "O nome deve ser preenchido!"];
} elseif (empty($dados['sobrenome'])) {
    $response = ['sucesso' => false, 'mensagem' => "O sobrenome deve ser selecionado!"];
} elseif (empty($dados['cpf'])) {
    $response = ['sucesso' => false, 'mensagem' => "O CPF deve ser preenchido!"];
} else {
    $extensaoArquivo = array('jpg', 'jpeg', 'png');
    $caminho = 'user/img/';
    $nome_original = $_FILES['img']['name'];
    $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));

    if (!in_array($extensao, $extensaoArquivo)) {
        $response = ['sucesso' => false, 'mensagem' => "Apenas arquivos JPG, JPEG e PNG são permitidos!"];
    } else {
        $nome = addslashes(trim($dados['nome']));
        $sobrenome = addslashes(trim($dados['sobrenome']));
        $cpf = addslashes(trim($dados['cpf']));
        $email = addslashes(trim($dados['email']));
        $telefone = addslashes(trim($dados['telefone']));
        $nascimento = formatarDataHoraEn(addslashes(trim($dados['nascimento'])));

        $identificador = uniqid();
        $novo_nome = 'Exclusivy-'.$identificador . '.' . $extensao;

        if (move_uploaded_file($_FILES['img']['tmp_name'], $caminho . $novo_nome)) {
            $retornoInsert = insertSeisId('pessoa', 'nome, sobrenome, foto, cpf, email, telefone, nascimento', $nome, $sobrenome, $novo_nome, $cpf, $email, $telefone, $nascimento);
            if ($retornoInsert) {
                $response = ['sucesso' => true, 'mensagem' => "Banner cadastrado com sucesso!"];
            } else {
                $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro banco de dados!"];
            }
        } else {
            $response = ['sucesso' => false, 'mensagem' => "Erro ao enviar o arquivo!"];
        }
    }
}

echo json_encode($response);
?>
