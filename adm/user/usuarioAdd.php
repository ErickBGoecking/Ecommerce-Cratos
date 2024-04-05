<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$response = validarCampos($dados, 'IdGenero,Nome,Sobrenome,Nascimento,Cpf,Telefone,Email,Senha');
if ($response['sucesso']) {
    
    $value = recebeForm($dados, 'value');
    $campos = recebeForm($dados, 'campos');
    
    $foto = validaFoto('Foto','user/img/');
    if($foto){  
        $campos .= ',Foto';
        $value[] = $foto;
    }
    $insert = insert('pessoa', $campos, $value);
    if ($insert) {
        $acao = "Foi adicionado no sistema Pessoa ";
        $retornoInsertAuditoria = insert('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', array("$idAdmin", "$acao", "1", 'pessoa', "DATATIMEATUAL", "$ip", "$pc", "$dispositivo"));
        $response = ['sucesso' => true, 'mensagem' => "Pessoa cadastrado com sucesso!"];
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro!"];
    }
}
echo json_encode($response);
?>