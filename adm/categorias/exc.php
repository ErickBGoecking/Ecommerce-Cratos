<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';

$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['excluir'])) {
    $response = ['sucesso' => false, 'mensagem' => "A categoria não foi reconhecido!"];
} 
else {
    
    $idCategoria = $dados['excluir'];
    $retornoExcluir = deleteRegistroUnico('categoria', 'IdCategoria', $idCategoria);
        
    if ($retornoExcluir) {
        $response = ['sucesso' => true, 'mensagem' =>'A categoria foi exlcuída!'];
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Falha ao excluir a categoria!"];
    }
}
echo json_encode($response);
?>