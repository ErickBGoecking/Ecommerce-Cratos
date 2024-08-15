<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$response = validarCampos($dados, 'Categoria');
if ($response['sucesso']) {
    $value = recebeForm($dados, 'value');
    $campos = recebeForm($dados, 'campos');
    
    $insert = insert('categoria', $campos, $value);
    $response = auditoria($insert,'O nova categoria foi adicionado no sistema','categoria');
}
echo json_encode($response);
?>

