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
    $response = ['sucesso' => false, 'mensagem' => "O genero não foi reconhecido!"];
} else {
    $acao = "Foi Excluido do sistema Genero";
    $idGenero = $dados['excluir'];
    $retornoExcluir = deleteRegistroUnico('genero', 'IdGenero', $idGenero);
    $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 3, 'Genero', DATATIMEATUAL, "$ip", $pc, $dispositivo);
    if ($retornoExcluir) {
        $response = ['sucesso' => true, 'mensagem' => "Genero deletado com sucesso!"];
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Falha ao excluir registro de genero!"];
    }
}
echo json_encode($response);
?>
