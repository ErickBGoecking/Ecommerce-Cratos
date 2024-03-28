<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['inCargoTipoAlt'])) {
    $response = ['sucesso' => false, 'mensagem' => "O tipo de cargo não encontrado!"];
} elseif (empty($dados['cargoTipoAlt'])) {
    $response = ['sucesso' => false, 'mensagem' => "O tipo de cargo deve ser preenchido!"];
}  else {
    $idCargoTipo = $dados['inCargoTipoAlt'];
    $cargotipo = addslashes(trim($dados['cargoTipoAlt']));
    $acao = "Foi Alterado o tipo de cargo $cargotipo no sistema!";
    $retornoUpdage = upUm('cargotipo', 'tipocargo','idcargotipo', "$cargotipo", "$idCargoTipo");
    if ($retornoUpdage) {
        $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 2, 'cargotipo', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "Tipo de Cargo $cargotipo Alterado com sucesso!"];
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Tipo de cargo não alterado!"];
    }
}

echo json_encode($response);
?>
