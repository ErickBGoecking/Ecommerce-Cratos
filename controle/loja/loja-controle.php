<?php 
if (isset($controle[1]) && !empty($controle[1])) {
    switch ($controle[1]) {
        case'produto':
            include_once 'produto/produto-controle.php';
            break;
    }
}
