<?php 
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
$controleId = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

if (isset($controle) && !empty($controle)) {
    switch ($controle) {
        case 'usuarioStatus':
            include_once('pagina/painel/pagina/usuario/view/status.php');
            break;
        case 'selectvariacoes':
            include_once('pagina/painel/pagina/produtos/acoes/selectvariacoes.php');
            break;
    }
}