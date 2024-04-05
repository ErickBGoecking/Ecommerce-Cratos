<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$idPessoa = $dados['idPessoa'];
$cpf = $dados['Cpf'];
$email = $dados['Email'];
$response = validarCampos($dados, 'IdGenero,Nome,Sobrenome,Nascimento,Cpf,Telefone,Email,Senha',true,"IdPessoa",$idPessoa);

if ($response['sucesso']){
    $value = recebeForm($dados, 'value');
    $campos = recebeForm($dados, 'campos');
    
    $f = $_FILES['Foto']['name'];
    if(!listarGeral("Foto", "pessoa WHERE Foto = '$f'")){
        $foto = validaFoto('Foto','user/img/');
        if($foto){  
            $campos .= ',Foto';
            $value[] = $foto;
        }
    }
    $update = upGeral('pessoa', $campos, $value,"WHERE idPessoa = $idPessoa");
    if ($update) {
        $acao = "Foi alterado no sistema Pessoa ";
        $retornoInsertAuditoria = insert('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', array("$idAdmin", "$acao", "1", 'pessoa', "DATATIMEATUAL", "$ip", "$pc", "$dispositivo"));
        $response = ['sucesso' => true, 'mensagem' => "Pessoa cadastrado com sucesso!"];
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Erro ao alterar o cadastro cadastro!"];
    }
}
echo json_encode($response);
?>