<?php 
if(isset($url[2])){
    switch($url[2]){        
        case'delete';
            deletar("usuario",$url[3]);
            break;
        // case"cadastrar":
        //     cadastrar('usuario');
        //     break;
        case"alterar":
            alterar('usuario');
            break;
        // case"editar":    
        //     include_once('pagina/painel/adm/pagina/usuario/view/editarusuario.php');
        //     break;
    }
}
include_once('pagina/painel/adm/pagina/usuario/view/listarusuario.php');