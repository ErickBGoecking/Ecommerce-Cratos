<?php 
if(isset($url[2])){
    switch($url[2]){        
        case'delete';
            deletar("genero",$url[3]);
            break;
        case"cadastrar":
            cadastrar('genero');
            break;
        case"alterar":
            alterar('genero');
            break;
        case"editar":    
            include_once('pagina/painel/pagina/genero/view/editargenero.php');
            break;
    }
}
include_once('pagina/painel/pagina/configuracoes/genero/view/listargenero.php');