<?php 
if (isset($controle[2]) && !empty($controle[2])) {
    switch ($controle[2]) {
        case'selectvariacoes':
            include_once '../pagina/painel/pagina/produtos/acoes/selectvariacoes.php';
            break;
    }
}