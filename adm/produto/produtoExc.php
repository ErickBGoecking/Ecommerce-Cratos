<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';

$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['excluir'])) {
    $response = ['sucesso' => false, 'mensagem' => "O usuário não foi reconhecido!"];
} 
else {
    $idProduto = $dados['excluir'];
    

    $retornoExcluir = deleteRegistroUnico('produto', 'idProduto', $idProduto);
 
    $acao = "Foi Excluido do sistema produto";
        
    if ($retornoExcluir) {
        // $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 3, 'produto', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "Produto deletado com sucesso!"];
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Falha ao excluir registro de produto!"];
    }
}
echo json_encode($response);
?>