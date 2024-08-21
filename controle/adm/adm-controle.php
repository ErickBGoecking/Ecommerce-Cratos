<?php 
if (isset($controle[1]) && !empty($controle[1])) {
    switch ($controle[1]) {
        case'produtos':
            include_once 'produtos/produtos-controle.php';
            break;
    }
}