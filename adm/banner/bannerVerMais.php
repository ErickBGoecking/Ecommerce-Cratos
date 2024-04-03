<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';

$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['vermais'])) {
    $response = ['sucesso' => false, 'mensagem' => "O banner não foi reconhecido!"];
} else {
    $idbanner = $dados['vermais'];
    $listarBanner = listarGeral('b.IdBanner, b.Img, b.Titulo, b.DataInicial, b.DataFinal, b.Tipo, b.Cadastro, b.Alteracao, b.Ativo, p.Nome, p.Sobrenome', "banner b INNER JOIN pessoa p ON p.IdPessoa = b.IdAdm WHERE b.IdBanner = $idbanner ORDER BY b.IdBanner DESC");
    if ($listarBanner) {
        $bannerData = reset($listarBanner);
        echo json_encode($bannerData);
        exit();
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Nenhum Banner Encontrado para mostrar mais detalhes!"];
    }
}
?>
