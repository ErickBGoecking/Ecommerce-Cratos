<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['IdCargoTipo'])) {
    $response = ['sucesso' => false, 'mensagem' => "O tipo de cargo não encontrado!"];
} elseif (empty($dados['TipoCargo'])) {
    $response = ['sucesso' => false, 'mensagem' => "O tipo de cargo deve ser preenchido!"];
}  else {
    $idCargoTipo = $dados['IdCargoTipo'];
    $cargotipo = addslashes(trim($dados['TipoCargo']));
    $acao = "Foi Alterado o tipo de cargo $cargotipo no sistema!";
    $retornoUpdage = upUm('cargotipo', 'TipoCargo','IdCargoTipo', "$cargotipo", "$idCargoTipo");
    if ($retornoUpdage) {
        $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 2, 'cargotipo', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "Tipo de Cargo $cargotipo Alterado com sucesso!"];
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Tipo de cargo não alterado!"];
    }
}

echo json_encode($response);
?>
