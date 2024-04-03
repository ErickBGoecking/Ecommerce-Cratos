<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();
if (empty($dados['CargoTipo'])) {
    $response = ['sucesso' => false, 'mensagem' => "O Tipo de Cargo deve ser preenchido!"];
} else {
    $cargoTipo = addslashes(trim($dados['CargoTipo']));
    $retornoInsert = insertUmId('cargotipo', 'TipoCargo', $cargoTipo);
    if ($retornoInsert) {
        $acao = "Foi adicionado no sistema Tipo de Cargo $cargoTipo";
        $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 1, 'cargotipo', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        if ($retornoInsertAuditoria) {
            $response = ['sucesso' => true, 'mensagem' => "Tipo de Cargo  cadastrado com sucesso!"];
        } else {
            $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro auditoria!"];
        }
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro banco de dados!"];
    }
}
echo json_encode($response);
?>
