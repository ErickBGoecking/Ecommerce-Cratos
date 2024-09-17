<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($controle[3])) {
    $idProdutoVariacao = $controle[3];
    $operacao = $controle[4];

    if (isset($_SESSION['carrinho'][$idProdutoVariacao])) {
        if ($operacao === 'up') {
            $_SESSION['carrinho'][$idProdutoVariacao]++;
            $response['sucesso'] = true;
            $response['mensagem'] = 'Produto atualizado quantidade!';
        } elseif ($operacao === 'down' && $_SESSION['carrinho'][$idProdutoVariacao] > 1) {
            $_SESSION['carrinho'][$idProdutoVariacao]--;
            $response['sucesso'] = true;
            $response['mensagem'] = 'Produto atualizado quantidade!';
        } elseif ($operacao === 'del') {
            unset($_SESSION['carrinho'][$idProdutoVariacao]);
            $response['sucesso'] = true;
            $response['mensagem'] = 'Produto retirado do carrinho!';
        } else {
            $_SESSION['carrinho'][$idProdutoVariacao] = $operacao;
            $response['sucesso'] = true;
            $response['mensagem'] = 'Produto retirado do carrinho! '.$operacao;
        }
//        echo $_SESSION['carrinho'][$idProdutoVariacao];

    } else {
        $response['sucesso'] = false;
        $response['mensagem'] = 'Erro#02 no atualizar carrinho!';
    }
}

echo json_encode($response);
