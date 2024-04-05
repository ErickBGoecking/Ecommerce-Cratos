<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['IdBanner'])) {
    $response = ['sucesso' => false, 'mensagem' => "Banner não encontrado!"];
} elseif (empty($dados['Titulo'])) {
    $response = ['sucesso' => false, 'mensagem' => "O título deve ser preenchido!"];
} elseif (empty($dados['Tipo'])) {
    $response = ['sucesso' => false, 'mensagem' => "O Tipo deve ser selecionado!"];
} elseif (empty($dados['DataInicial'])) {
    $response = ['sucesso' => false, 'mensagem' => "A data de início deve ser preenchida!"];
} elseif (empty($dados['DataFinal'])) {
    $response = ['sucesso' => false, 'mensagem' => "A data fim deve ser preenchida!"];
} else {
    $idbanner = $dados['IdBanner'];
    $titulo = addslashes(trim($dados['Titulo']));
    $tipo = addslashes(trim($dados['Tipo']));
    $dataI = formatarDataHoraEn(addslashes(trim($dados['DataInicial'])));
    $dataF = formatarDataHoraEn(addslashes(trim($dados['DataFinal'])));
    $acao = "Foi Alterado banner $titulo no sistema!";
    if (!isset($_FILES['Img']) || $_FILES['Img']['error'] !== UPLOAD_ERR_OK) {
        $retornoUpdage = upCinco('banner', 'IdAdm', 'Titulo', 'DataInicial', 'DataFinal', 'Tipo', 'IdBanner', "$idAdmin", "$titulo", "$dataI", "$dataF", "$tipo", "$idbanner");
        if ($retornoUpdage) {
            $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 2, 'banner', DATATIMEATUAL, "$ip", $pc, $dispositivo);
            $response = ['sucesso' => true, 'mensagem' => "Banner Alterado com sucesso!"];
        } else {
            $response = ['sucesso' => false, 'mensagem' => "Banner não alterado!"];
        }
    } else {
        $identificador = uniqid();
        $extensaoArquivo = array('jpg', 'jpeg', 'png');
        $caminho = 'banner/img/';
        $nome_original = $_FILES['Img']['name'];
        $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));
        if (!in_array($extensao, $extensaoArquivo)) {
            $response = ['sucesso' => false, 'mensagem' => "Apenas arquivos JPG, JPEG e PNG são permitidos!"];
        } else {
            $novo_nome = 'Exclusivy-' . $identificador . '.' . $extensao;
            $img = '';
            $retornoListarImg = listarRegistroU('banner', 'Img, Titulo', 'IdBanner', $idbanner);

            if ($retornoListarImg) {
                foreach ($retornoListarImg as $itemListarImg) {
                    $img = $itemListarImg->Img;
                }
                $caminhoAlt = "banner/img/$img";
                if (isset($img) && file_exists($caminhoAlt)) {
                    unlink($caminhoAlt);
                }

                if (move_uploaded_file($_FILES['Img']['tmp_name'], $caminho . $novo_nome)) {
                    $retornoUpdage = upSeis('banner', 'IdAdm', 'Img', 'Titulo', 'DataInicial', 'DataFinal', 'Tipo', 'IdBanner', "$idAdmin", "$novo_nome", "$titulo", "$dataI", "$dataF", "$tipo", "$idbanner");
                    if ($retornoUpdage) {
                        $retornoInsertAuditoria = insertOitoId('auditoria', 'IdAdm, Acao, Tipo, Tabela, DataHora, Ip, PcUsuario, Dispositivo', $idAdmin, $acao, 2, 'banner', DATATIMEATUAL, "$ip", $pc, $dispositivo);
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
