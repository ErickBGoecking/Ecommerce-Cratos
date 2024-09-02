<?php

// include_once('../../../../../source/funcoes/funcoes.php');
header('Content-Type: application/json');

// $idproduto = '150';
$idproduto = $controle[3];

$delete = deleteRegistroUnico('produto', 'idproduto', $idproduto);
// print_r($delete);

// if(!$delete){
//     $response['sucesso'] = false;
//     $response['mensagem'] = 'Não foi possível deletar o produto';
//     echo json_encode($response);
//     die();
// }
$response['sucesso'] = true;
$response['mensagem'] = 'Produto deletado com sucesso!';
echo json_encode($response);
