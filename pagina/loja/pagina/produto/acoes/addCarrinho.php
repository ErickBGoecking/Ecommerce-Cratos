<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($controle[3])) {
    $idProdutoVariacao = codificar($controle[3], 'decodificar');
    $quantidade = $controle[4];

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }
    if (isset($_SESSION['carrinho'][$idProdutoVariacao])) {
        $_SESSION['carrinho'][$idProdutoVariacao] += $quantidade;
    } else {
        $_SESSION['carrinho'][$idProdutoVariacao] = $quantidade;
    }

    // Contar quantos tipos de produtos estão no carrinho
    $totalTiposDeProdutos = count($_SESSION['carrinho']);
    // Contar o total de itens (quantidades) no carrinho
    $totalItensNoCarrinho = array_sum($_SESSION['carrinho']);

    $response['sucesso'] = true;
} else {
    $response['sucesso'] = false;
    $response['mensagem'] = 'Erro no adicionar carrinho!';
}
echo json_encode($response);
