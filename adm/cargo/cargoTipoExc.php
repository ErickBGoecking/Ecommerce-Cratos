<?php
session_start();
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';

$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['excluir'])) {
    $response = ['sucesso' => false, 'mensagem' => "O Tipo de cargo não foi reconhecido!"];
} else {
    $acao = "Foi Excluido do sistema Tipo de cargo";
    $idCargoTipo = $dados['excluir'];
    $retornoExcluir = deleteRegistroUnico('cargotipo', 'idcargotipo', $idCargoTipo);
    $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 3, 'cargotipo', DATATIMEATUAL, "$ip", $pc, $dispositivo);
    if ($retornoExcluir) {
        $response = ['sucesso' => true, 'mensagem' => "Tipo de cargo deletado com sucesso!"];
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Falha ao excluir registro tipo de cargo!"];
    }
}
echo json_encode($response);
?>
