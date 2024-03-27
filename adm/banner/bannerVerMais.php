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
    $listarBanner = listarGeral('b.idbanner, b.img, b.titulo, b.datai, b.dataf, b.tipo, b.cadastro, b.alteracao, b.ativo, p.nome, p.sobrenome', "banner b INNER JOIN pessoa p ON p.idpessoa = b.idadm WHERE b.idbanner = $idbanner ORDER BY b.idbanner DESC");
    if ($listarBanner) {
        $bannerData = reset($listarBanner);
        echo json_encode($bannerData);
        exit();
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Nenhum Banner Encontrado para mostrar mais detalhes!"];
    }
}
?>
