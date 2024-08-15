<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['IdGenero'])) {
    $response = ['sucesso' => false, 'mensagem' => "Genero não encontrado!"];
} elseif (empty($dados['Genero'])) {
    $response = ['sucesso' => false, 'mensagem' => "O genero deve ser preenchido!"];
}  else {
    $idGenero = $dados['IdGenero'];
    $genero = addslashes(trim($dados['Genero']));
    $acao = "Foi Alterado Genero $genero no sistema!";
    $retornoUpdage = upUm('genero', 'Genero','IdGenero', "$genero", "$idGenero");
    if ($retornoUpdage) {
        $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 2, 'Genero', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "Genero Alterado com sucesso!"];
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Genero não alterado!"];
    }
}

echo json_encode($response);
?>
