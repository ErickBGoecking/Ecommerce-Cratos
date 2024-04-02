<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$response = validarCampos($dados, 'titulo,tipo,datai,dataf');
if ($response['sucesso']) {
    $extensaoArquivo = array('jpg', 'jpeg', 'png');
    $caminho = 'banner/img/';
    $nome_original = $_FILES['img']['name'];
    $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));
    if (!in_array($extensao, $extensaoArquivo)) {
        $response = ['sucesso' => false, 'mensagem' => "Apenas arquivos JPG, JPEG e PNG são permitidos!"];
    } else {
        $identificador = uniqid();
        $novo_nome = 'Exclusivy-' . $identificador . '.' . $extensao;

        $value = recebeForm($dados, 'value');
        $campos = recebeForm($dados);
        $campos .= ',idadm,img';
        $value[] = $idAdmin;
        $value[] = "$novo_nome";

        if (move_uploaded_file($_FILES['img']['tmp_name'], $caminho . $novo_nome)) {
            $retornoInsert = insert('banner', $campos, $value);
            $acao = "Foi adicionado no sistema Banner ";
            $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 1, 'banner', DATATIMEATUAL, "$ip", $pc, $dispositivo);
            $response = ['sucesso' => true, 'mensagem' => "Banner cadastrado com sucesso!"];
            if ($retornoInsert) {
                $response = ['sucesso' => true, 'mensagem' => "Banner cadastrado com sucesso!"];
            } else {
                $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro auditoria!"];
            }
        } else {
            $response = ['sucesso' => false, 'mensagem' => "Erro ao enviar o arquivo!"];
        }
    }
}
echo json_encode($response);
?>
