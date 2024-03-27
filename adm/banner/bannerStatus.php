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
    $idbanner = $dados['status'];
    $retornoStatus = updateAtivar('banner', 'idbanner', $idbanner);
    if($retornoStatus=='Desativado'){
        $acao = "Foi Desativado o banner no sistema! Id=$idbanner";
        $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 2, 'banner', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "Banner Desativado com sucesso!"];
    }elseif($retornoStatus=='Ativado'){
        $acao = "Foi Ativado o banner no sistema! Id=$idbanner";
        $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 2, 'banner', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "Banner Ativado com sucesso!"];
    }else{
        $response = ['sucesso' => false, 'mensagem' => "Error, Banner não sofreu alteração!"];
    }
}

echo json_encode($response);
?>
