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
    $idPessoa = $dados['status'];
    $retornoStatus = updateAtivar('pessoa', 'IdPessoa', $idPessoa);
    if($retornoStatus=='Desativado'){
        $acao = "Foi Desativado o usuario no sistema! Id=$idPessoa";
        $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 2, 'usuario', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "usuario Desativado com sucesso!"];
    }elseif($retornoStatus=='Ativado'){
        $acao = "Foi Ativado o usuario no sistema! Id=$idPessoa";
        $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 2, 'usuario', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "usuario Ativado com sucesso!"];
    }else{
        $response = ['sucesso' => false, 'mensagem' => "Error, usuario não sofreu alteração!"];
    }
}

echo json_encode($response);
?>
