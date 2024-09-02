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
        case'alterarativo':
            include_once '../pagina/painel/pagina/produtos/acoes/alterarativo.php';
            break;
        case'alterarestoque':
            include_once '../pagina/painel/pagina/produtos/acoes/alterarestoque.php';
            break;
        case'deleteproduto':
            include_once '../pagina/painel/pagina/produtos/acoes/deletarproduto.php';
            break;
        case'listar':
            include_once '../pagina/painel/pagina/produtos/acoes/listar.php';
            break;
        case'busca':
            include_once '../pagina/painel/pagina/produtos/acoes/busca.php';
            break;
        case'buscarapida':
            include_once '../pagina/painel/pagina/produtos/acoes/buscaRapida.php';
            break;
    }
}