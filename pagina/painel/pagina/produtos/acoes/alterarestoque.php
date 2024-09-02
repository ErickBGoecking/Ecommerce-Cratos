<?php

// include_once('../../../../../source/funcoes/funcoes.php');
header('Content-Type: application/json');

$campo = $controle[3];
$idprodutovariacao = $controle[4];

$value[] = $controle[5];
$atualizacaoStatus = upGeral('estoque',$campo,$value,"WHERE idprodutovariacao = $idprodutovariacao");

if(isset($atualizacaoStatus['Erro'])){
    $response['sucesso'] = false;
    $response['mensagem'] = 'Não foi possível alterar o campo';
    echo json_encode($response);
    die();
}
$response['sucesso'] = true;
$response['mensagem'] = 'Campo alterado com sucesso!';
echo json_encode($response);
