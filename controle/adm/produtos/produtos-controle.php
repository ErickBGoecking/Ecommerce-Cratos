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
        case'formnovofornecedor':
            include_once '../pagina/painel/pagina/fornecedores/view/novofornecedor.php';
            break;
        case'cadastronovofornecedor':
            include_once '../pagina/painel/pagina/fornecedores/acoes/cadastronovofornecedor.php';
            break;
        case'selectfornecedor':
            include_once '../pagina/painel/pagina/produtos/acoes/selectfornecedor.php';
            break;
            
    }
}