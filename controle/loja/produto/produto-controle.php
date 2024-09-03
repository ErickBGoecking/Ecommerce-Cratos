<?php 
if (isset($controle[2]) && !empty($controle[2])) {
    switch ($controle[2]) {
        case'produtovariacao':
            include_once '../pagina/loja/pagina/produto/produtoVariacao.php';
            break;
    }
}