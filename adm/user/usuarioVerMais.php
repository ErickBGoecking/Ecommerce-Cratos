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
    $idPessoa = $dados['vermais'];
    // $listarPessoa = listarGeral("*","pessoa WHERE IdPessoa = $idPessoa");
    // if ($listarPessoa) {
    //     $idGenero = $listarPessoa[0]->IdGenero;
    //     $nomeGenero = listarGeral("*","genero WHERE IdGenero = $idGenero");
    //     $listarPessoa[0]['Genero'] = $nomeGenero;
    //     $pessoaData = reset($listarPessoa);
    //     echo json_encode($pessoaData);
    //     exit();
    // } 
    $listarPessoa = listarGeral("*", "pessoa WHERE IdPessoa = $idPessoa");
    if ($listarPessoa) {
        
        $Generos = listarGeral("IdGenero,Genero", "genero");
        $listarPessoa[0]->Generos = $Generos;
        
        $pessoaData = reset($listarPessoa);
        echo json_encode($pessoaData);
        exit();
    }
    
    else {
        $response = ['sucesso' => false, 'mensagem' => "Nenhum Usuario Encontrado para mostrar mais detalhes!"];
    }
}
