<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$response = array();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$idCategoria = $dados['idCategoria'];
$response = validarCampos($dados, 'IdCategoria,Categoria', true, "idCategoria", $idCategoria);
if ($response['sucesso']){
    $value = recebeForm($dados, 'value');
    $campos = recebeForm($dados, 'campos');

    $update = upGeral('categoria', $campos, $value,"WHERE IdCategoria = $idCategoria");

    if ($update) {
        $response = ['sucesso' => true, 'mensagem' =>'A categoria alterada!'];
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Falha ao alterar a categoria!"];
    }
}else{
    $response = ['sucesso' => false, 'mensagem' => 'tentando'];
}
echo json_encode($response);
?>
