<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['genero'])) {
    $response = ['sucesso' => false, 'mensagem' => "O gênero deve ser preenchido!"];
} else {
    $genero = addslashes(trim($dados['genero']));
    $retornoInsert = insertUmId('genero', 'genero', $genero);
    if ($retornoInsert) {
        $acao = "Foi adicionado no sistema Genero $genero";
        $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 1, 'genero', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        if ($retornoInsertAuditoria) {
            $response = ['sucesso' => true, 'mensagem' => "Genero cadastrado com sucesso!"];
        } else {
            $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro auditoria!"];
        }
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro banco de dados!"];
    }
}
echo json_encode($response);
?>
