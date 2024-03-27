<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['idBanner'])) {
    $response = ['sucesso' => false, 'mensagem' => "Banner não encontrado!"];
} elseif (empty($dados['titulo'])) {
    $response = ['sucesso' => false, 'mensagem' => "O título deve ser preenchido!"];
} elseif (empty($dados['sTipoAlt'])) {
    $response = ['sucesso' => false, 'mensagem' => "O tipo deve ser selecionado!"];
} elseif (empty($dados['dataIAlt'])) {
    $response = ['sucesso' => false, 'mensagem' => "A data de início deve ser preenchida!"];
} elseif (empty($dados['dataFAlt'])) {
    $response = ['sucesso' => false, 'mensagem' => "A data fim deve ser preenchida!"];
} else {
    $idbanner = $dados['idBanner'];
    $titulo = addslashes(trim($dados['titulo']));
    $tipo = addslashes(trim($dados['sTipoAlt']));
    $dataI = formatarDataHoraEn(addslashes(trim($dados['dataIAlt'])));
    $dataF = formatarDataHoraEn(addslashes(trim($dados['dataFAlt'])));
    $acao = "Foi Alterado $titulo no sistema!";
    if (!isset($_FILES['imgAlt']) || $_FILES['imgAlt']['error'] !== UPLOAD_ERR_OK) {
        $retornoUpdage = upCinco('banner', 'idadm', 'titulo', 'datai', 'dataf', 'tipo', 'idbanner', "$idAdmin", "$titulo", "$dataI", "$dataF", "$tipo", "$idbanner");
        if ($retornoUpdage) {
            $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 2, 'banner', DATATIMEATUAL, "$ip", $pc, $dispositivo);
            $response = ['sucesso' => true, 'mensagem' => "Banner Alterado com sucesso!"];
        } else {
            $response = ['sucesso' => false, 'mensagem' => "Banner não alterado!"];
        }
    } else {
        $identificador = uniqid();
        $extensaoArquivo = array('jpg', 'jpeg', 'png');
        $caminho = 'banner/img/';
        $nome_original = $_FILES['imgAlt']['name'];
        $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));
        if (!in_array($extensao, $extensaoArquivo)) {
            $response = ['sucesso' => false, 'mensagem' => "Apenas arquivos JPG, JPEG e PNG são permitidos!"];
        } else {
            $novo_nome = 'Exclusivy-' . $identificador . '.' . $extensao;
            $img = '';
            $retornoListarImg = listarRegistroU('banner', 'img, titulo', 'idbanner', $idbanner);

            if ($retornoListarImg) {
                foreach ($retornoListarImg as $itemListarImg) {
                    $img = $itemListarImg->img;
                }
                $caminhoAlt = "banner/img/$img";
                if (isset($img) && file_exists($caminhoAlt)) {
                    unlink($caminhoAlt);
                }

                if (move_uploaded_file($_FILES['imgAlt']['tmp_name'], $caminho . $novo_nome)) {
                    $retornoUpdage = upSeis('banner', 'idadm', 'img', 'titulo', 'datai', 'dataf', 'tipo', 'idbanner', "$idAdmin", "$novo_nome", "$titulo", "$dataI", "$dataF", "$tipo", "$idbanner");
                    if ($retornoUpdage) {
                        $retornoInsertAuditoria = insertOitoId('auditoria', 'idadm, acao, tipo, tabela, datahora, ip, pcusuario, dispositivo', $idAdmin, $acao, 2, 'banner', DATATIMEATUAL, "$ip", $pc, $dispositivo);
                        $response = ['sucesso' => true, 'mensagem' => "Banner Alterado com sucesso!"];
                    } else {
                        $response = ['sucesso' => false, 'mensagem' => "Banner não alterado!"];
                    }
                } else {
                    $response = ['sucesso' => false, 'mensagem' => "Banner não alterado!"];
                }
            } else {
                $response = ['sucesso' => false, 'mensagem' => "Banner não alterado!"];
            }
        }
    }
}

echo json_encode($response);
?>
