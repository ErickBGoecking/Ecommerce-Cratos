<?php 
if(isset($url[2])){
    switch($url[2]){        
        case'delete';
            deletar("cargotipo",$url[3]);
            break;
        case"cadastrar":
            cadastrar('cargotipo');
            break;
        case"alterar":
            alterar('cargotipo');
            break;
        case"editar":    
            include_once('pagina/painel/pagina/cargotipo/view/editarcargotipo.php');
            break;
    }
}
include_once('pagina/painel/pagina/cargotipo/view/listarcargotipo.php');