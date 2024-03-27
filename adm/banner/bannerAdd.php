<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['titulo'])) {
    $response = ['sucesso' => false, 'mensagem' => "O título deve ser preenchido!"];
} elseif (empty($dados['sTipo'])) {
    $response = ['sucesso' => false, 'mensagem' => "O tipo deve ser selecionado!"];
} elseif (empty($dados['dataI'])) {
    $response = ['sucesso' => false, 'mensagem' => "A data de início deve ser preenchida!"];
} elseif (empty($dados['dataF'])) {
    $response = ['sucesso' => false, 'mensagem' => "A data fim deve ser preenchida!"];
} elseif (!isset($_FILES['img']) || $_FILES['img']['error'] !== UPLOAD_ERR_OK) {
    $response = ['sucesso' => false, 'mensagem' => "Erro ao receber o arquivo!"];
} else {
    $extensaoArquivo = array('jpg', 'jpeg', 'png');
    $caminho = 'banner/img/';
    $nome_original = $_FILES['img']['name'];
    $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));

    if (!in_array($extensao, $extensaoArquivo)) {
        $response = ['sucesso' => false, 'mensagem' => "Apenas arquivos JPG, JPEG e PNG são permitidos!"];
    } else {
        $titulo = addslashes(trim($dados['titulo']));
        $tipo = addslashes(trim($dados['sTipo']));
        $dataI = formatarDataHoraEn(addslashes(trim($dados['dataI'])));
        $dataF = formatarDataHoraEn(addslashes(trim($dados['dataF'])));

        $identificador = uniqid();
        $novo_nome = 'Exclusivy-' . $identificador . '.' . $extensao;

        if (move_uploaded_file($_FILES['img']['tmp_name'], $caminho . $novo_nome)) {
            $retornoInsert = insertSeisId('banner', 'idadm, img, titulo, datai, dataf, tipo', $idAdmin, $novo_nome, $titulo, $dataI, $dataF, $tipo);
            if ($retornoInsert) {
                $acao = "Foi adicionado no sistema Banner $titulo";
                $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 1, 'banner', DATATIMEATUAL, "$ip", $pc, $dispositivo);
                if ($retornoInsertAuditoria) {
                    $response = ['sucesso' => true, 'mensagem' => "Banner cadastrado com sucesso!"];
                } else {
                    $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro auditoria!"];
                }
            } else {
                $response = ['sucesso' => false, 'mensagem' => "Erro no cadastro banco de dados!"];
            }
        } else {
            $response = ['sucesso' => false, 'mensagem' => "Erro ao enviar o arquivo!"];
        }
    }
}

echo json_encode($response);
?>
