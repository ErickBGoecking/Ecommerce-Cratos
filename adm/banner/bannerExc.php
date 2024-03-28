<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';

$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['excluir'])) {
    $response = ['sucesso' => false, 'mensagem' => "O banner não foi reconhecido!"];
} else {
    $idbanner = $dados['excluir'];
    $retornoListarImg = listarRegistroU('banner', 'img, titulo', 'idbanner', $idbanner);
    if ($retornoListarImg) {
        foreach ($retornoListarImg as $itemListarImg) {
            $img = $itemListarImg->img;
            $titulo = $itemListarImg->titulo;
        }
        $caminho = "banner/img/$img";
    } else {
        $titulo = '';
    }
    $acao = "Foi Excluido do sistema Banner $titulo";
    if (isset($caminho) && file_exists($caminho)) {
        if (unlink($caminho)) {
            $retornoExcluir = deleteRegistroUnico('banner', 'idbanner', $idbanner);
            if ($retornoExcluir) {
                $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 3, 'banner', DATATIMEATUAL, "$ip", $pc, $dispositivo);
                $response = ['sucesso' => true, 'mensagem' => "Banner deletado com sucesso!"];
            } else {
                $response = ['sucesso' => false, 'mensagem' => "Falha ao excluir registro de banner!"];
            }
        } else {
            $response = ['sucesso' => false, 'mensagem' => "Falha ao excluir arquivo de imagem!"];
        }
    } else {
        $retornoExcluir = deleteRegistroUnico('banner', 'idbanner', $idbanner);
        if ($retornoExcluir) {
            $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 3, 'banner', DATATIMEATUAL, "$ip", $pc, $dispositivo);
            $response = ['sucesso' => true, 'mensagem' => "Banner deletado com sucesso!"];
        } else {
            $response = ['sucesso' => false, 'mensagem' => "Falha ao excluir registro de banner!"];
        }
    }
}
echo json_encode($response);
?>
