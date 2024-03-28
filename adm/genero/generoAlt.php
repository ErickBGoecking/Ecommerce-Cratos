<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['generoAlt'])) {
    $response = ['sucesso' => false, 'mensagem' => "Genero não encontrado!"];
} elseif (empty($dados['genero'])) {
    $response = ['sucesso' => false, 'mensagem' => "O genero deve ser preenchido!"];
}  else {
    $idGenero = $dados['generoAlt'];
    $genero = addslashes(trim($dados['genero']));
    $acao = "Foi Alterado Genero $genero no sistema!";
    $retornoUpdage = upUm('genero', 'genero','idgenero', "$genero", "$idGenero");
    if ($retornoUpdage) {
        $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 2, 'genero', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "Genero Alterado com sucesso!"];
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Genero não alterado!"];
    }
}

echo json_encode($response);
?>
