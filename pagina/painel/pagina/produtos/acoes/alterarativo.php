<?php

// include_once('../../../../../source/funcoes/funcoes.php');
header('Content-Type: application/json');

$idproduto = $controle[3];
$status = listarGeral('ativo',"produto where idproduto = $idproduto");

if($status[0]->ativo == "A"){
    $value[] = 'D';
    $atualizacaoStatus = upGeral('produto','ativo',$value,"WHERE idproduto = $idproduto");
    if(!$atualizacaoStatus){
        $response['sucesso'] = false;
        $response['mensagem'] = 'Não foi possível alterar o status';
        echo json_encode($response);
        die();
    }
}else{
    $value[] = 'A';
    $atualizacaoStatus = upGeral('produto','ativo',$value,"where idproduto = $idproduto");
    if(!$atualizacaoStatus){
        $response['sucesso'] = false;
        $response['mensagem'] = 'Não foi possível alterar o status';
        echo json_encode($response);
        die();
    }
}

$response['sucesso'] = true;
$response['mensagem'] = 'Status alterado com sucesso!';
echo json_encode($response);

