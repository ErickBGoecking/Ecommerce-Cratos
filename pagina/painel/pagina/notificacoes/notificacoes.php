 <?php 
 if(isset($url[2])){
    switch($url[2]){        
        case'delete';
            deletar("notificacoes",$url[3]);
            break;
        // case"cadastrar":
        //     // cadastrar('cargo');
        //     break;
        // case"alterar":
        //     alterar('cargo');
        //     break;
        // case"editar":    
        //     include_once('pagina/painel/pagina/cargo/view/editarcargo.php');
        //     break;
    }
}

include_once('pagina/painel/pagina/notificacoes/view/listarnotificacoes.php');