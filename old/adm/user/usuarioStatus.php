<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados['status'])) {
    $idPessoa = $dados['status'];
    $retornoStatus = updateAtivar('pessoa', 'IdPessoa', $idPessoa);
    $response = auditoria($retornoStatus,'Foi alterado o Status ','pessoa');
} else {
    $response = ['sucesso' => false, 'mensagem' => "O status não foi reconhecido!"];
}

echo json_encode($response);
?>
