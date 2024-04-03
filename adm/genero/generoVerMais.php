<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';

$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['vermais'])) {
    $response = ['sucesso' => false, 'mensagem' => "O Genero não foi reconhecido!"];
} else {
    $idGenero = $dados['vermais'];
    $listarGenero = listarGeral('IdGenero, Genero, Cadastro, Alteracao, Ativo', "genero WHERE IdGenero = $idGenero ORDER BY IdGenero DESC");
    if ($listarGenero) {
        $generoData = reset($listarGenero);
        echo json_encode($generoData);
        exit();
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Nenhum Genero Encontrado para mostrar mais detalhes!"];
    }
}
?>
