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
    
    $idPessoa = $dados['excluir'];
    $retornoListarImg = listarRegistroU('pessoa', 'foto, nome', 'idPessoa', $idPessoa);
    $caminho = "";
    
    if ($retornoListarImg) {
        foreach ($retornoListarImg as $itemListarImg) {
            $foto = $itemListarImg->foto;
            $nome = $itemListarImg->nome;
        }
        
        if(empty($foto)){}else{
            $caminho = "user/img/$foto";
        }
    }

    $retornoExcluir = deleteRegistroUnico('pessoa', 'idPessoa', $idPessoa);
    $acao = "Foi Excluido do sistema Pessoa";
        
    if ($retornoExcluir) {
        $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 3, 'pessoa', DATATIMEATUAL, "$ip", $pc, $dispositivo);
        $response = ['sucesso' => true, 'mensagem' => "Usuario $nome deletado com sucesso!"];
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Falha ao excluir registro de usuario!"];
    }

    if (file_exists($caminho)) {
        unlink($caminho);
    }
}
echo json_encode($response);
?>