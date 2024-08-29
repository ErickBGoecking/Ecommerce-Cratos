<?php 
if(isset($url[2])){
    switch($url[2]){        
        // case'delete';
        //     deletar("produto",$url[3]);
        //     break;
        case"cadastro":
            include_once('pagina/painel/pagina/produtos/view/cadastroproduto.php');
            break;
        // case"cadastrar":
        //     cadastrar('produto');
        //     break;
        // case"alterar":
        //     alterar('produto');
        //     break;
        // case"editar":    
        //     include_once('pagina/painel/pagina/produtos/view/editarproduto.php');
        //     break;
        default:    
            include_once('pagina/painel/pagina/produtos/view/listarproduto.php');
            break;
    }
}else{
    include_once('pagina/painel/pagina/produtos/view/listarproduto.php');
}
