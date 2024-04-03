<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['status'])) {
    $response = ['sucesso' => false, 'mensagem' => "O status não foi reconhecido!"];
} else {
    $idCargoTipo = $dados['status'];
    $retornoStatus = updateAtivar('cargotipo', 'IdCargoTipo', $idCargoTipo);
    if($retornoStatus=='Desativado'){
        $acao = "Foi Desativado o tipo de cargo no sistema! Id=$idCargoTipo";
        $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 2, 'cargotipo', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "Tipo de Cargo Desativado com sucesso!"];
    }elseif($retornoStatus=='Ativado'){
        $acao = "Foi Ativado o tipo de cargo no sistema! Id=$idCargoTipo";
        $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 2, 'cargotipo', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "Tipo de Cargo Ativado com sucesso!"];
    }else{
        $response = ['sucesso' => false, 'mensagem' => "Error, Tipo de Cargo não sofreu alteração!"];
    }
}

echo json_encode($response);
?>
