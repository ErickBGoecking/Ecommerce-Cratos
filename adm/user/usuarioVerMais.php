<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';

$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados['vermais'])) {
    $idPessoa = $dados['vermais'];
    if ($listarPessoa = listarGeral("*", "pessoa WHERE IdPessoa = $idPessoa")) {
        $Generos = listarGeral("IdGenero,Genero", "genero");
        $listarPessoa[0]->Generos = $Generos;
        $response = reset($listarPessoa);
    }else {
        $response = ['sucesso' => false, 'mensagem' => "Nenhum Usuario Encontrado para mostrar mais detalhes!"];
    }
} else {
    $response = ['sucesso' => false, 'mensagem' => "O banner não foi reconhecido!"];
}

echo json_encode($response);