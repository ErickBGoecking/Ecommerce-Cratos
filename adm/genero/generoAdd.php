<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['Genero'])) {
    $response = ['sucesso' => false, 'mensagem' => "O gênero deve ser preenchido!"];
} else {
    $Genero = addslashes(trim($dados['Genero']));
    $retornoInsert = insertUmId('genero', 'Genero', $Genero);
    if ($retornoInsert) {
        $acao = "Foi adicionado no sistema Genero $Genero";
        $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 1, 'Genero', DATATIMEATUAL, "$ip", $pc, $dispositivo);
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
