<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$idPessoa = $dados['idPessoa'];
$response = validarCampos($dados, 'IdGenero,Nome,Sobrenome,Nascimento,Cpf,Telefone,Email', true, "IdPessoa", $idPessoa);
if ($response['sucesso']){
    $value = recebeForm($dados, 'value');
    $campos = recebeForm($dados, 'campos');
    
    if($foto = validaFoto('Foto','user/img/')){
        $campos .= ',Foto';
        $value[] = $foto;
    }

    $update = upGeral('pessoa', $campos, $value,"WHERE idPessoa = $idPessoa");
    $response = auditoria($update,'Foi alterado no sistema Pessoa ','pessoa');
}
echo json_encode($response);
?>

