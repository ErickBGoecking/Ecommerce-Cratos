<?php 
if (isset($controle[2]) && !empty($controle[2])) {
    switch ($controle[2]) {
        case'produtovariacao':
            include_once '../pagina/loja/pagina/produto/view/produtoVariacao.php';
            break;
        case'addCarrinho':
            include_once '../pagina/loja/pagina/produto/acoes/addCarrinho.php';
            break;
        case'upQtdCarrinho':
            include_once '../pagina/loja/pagina/produto/acoes/upQtdCarrinho.php';
            break;
    }
}