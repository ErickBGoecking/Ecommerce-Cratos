<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$response = validarCampos($dados, 'IdGenero,Nome,Sobrenome,Nascimento,Cpf,Telefone,Email,Senha');
if ($response['sucesso']) {
    $retornoValidacaoValor = recebeForm($dados, 'value');
    if(!isset($retornoValidacaoValor['sucesso'])){
        $value = recebeForm($dados, 'value');
        $campos = recebeForm($dados, 'campos');
        $extensaoArquivo = array('jpg', 'jpeg', 'png');
        $nome_original = $_FILES['Foto']['name'];
        $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));
        if (!in_array($extensao, $extensaoArquivo)) {
            $retornoInsert = insert('pessoa', $campos, $value);
        }else {
            $identificador = uniqid();
            $novo_nome = 'Exclusivy-' . $identificador . '.' . $extensao;    
            $campos .= ',Foto';
            $value[] = "$novo_nome";
            $caminho = 'user/img/';
        if (move_uploaded_file($_FILES['Foto']['tmp_name'], $caminho . $novo_nome)) {
            $retornoInsert = insert('pessoa', $campos, $value);      
            } else {
                $response = ['sucesso' => false, 'mensagem' => "Erro ao enviar o arquivo!"];
            }
        }
        if ($retornoInsert) {
            $acao = "Foi adicionado no sistema Pessoa ";
            $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 1, 'pessoa', DATATIMEATUAL, "$ip", $pc, $dispositivo);
            $response = ['sucesso' => true, 'mensagem' => "Pessoa cadastrado com sucesso!"];
        } else {
            $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro!"];
        } 
    }else{
        $response =$retornoValidacaoValor;
    }
}
echo json_encode($response);
?>