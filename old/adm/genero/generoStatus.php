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
    $idGenero = $dados['status'];
    $retornoStatus = updateAtivar('genero', 'IdGenero', $idGenero);
    if($retornoStatus=='Desativado'){
        $acao = "Foi Desativado o genero no sistema! Id=$idGenero";
        $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 2, 'Genero', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "Genero Desativado com sucesso!"];
    }elseif($retornoStatus=='Ativado'){
        $acao = "Foi Ativado o genero no sistema! Id=$idGenero";
        $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 2, 'Genero', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "Genero Ativado com sucesso!"];
    }else{
        $response = ['sucesso' => false, 'mensagem' => "Error, Genero não sofreu alteração!"];
    }
}

echo json_encode($response);
?>
