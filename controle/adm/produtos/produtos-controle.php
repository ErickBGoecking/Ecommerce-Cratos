<?php 
if (isset($controle[2]) && !empty($controle[2])) {
    switch ($controle[2]) {
        case'selectvariacoes':
            include_once '../pagina/painel/pagina/produtos/acoes/selectvariacoes.php';
            break;
        case'selectsubvariacoes':
            include_once '../pagina/painel/pagina/produtos/acoes/selectsubvariacoes.php';
            break;
        case'selectcategorias':
            include_once '../pagina/painel/pagina/produtos/acoes/selectcategorias.php';
            break;
        case'cadastrarproduto':
            include_once '../pagina/painel/pagina/produtos/acoes/cadastrarproduto.php';
            break;
    }
}