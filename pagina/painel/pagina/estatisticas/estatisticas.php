<?php 
if(isset($url[2])){
    switch($url[2]){        
        case'delete';
            deletar("estatisticas",$url[3]);
            break;
        // case"cadastrar":
        //     cadastrar('estatisticas');
        //     break;
        case"alterar":
            alterar('estatisticas');
            break;
        // case"editar":    
        //     include_once('pagina/painel/adm/pagina/estatisticas/view/editarestatisticas.php');
        //     break;
        case "visaogeral":
            include_once('pagina/painel/pagina/estatisticas/view/visaogeral.php');
            break;
        case "pagos":
            include_once('pagina/painel/pagina/estatisticas/view/pagos.php');
            break;
        case "envios":
            include_once('pagina/painel/pagina/estatisticas/view/envios.php');
            break;
        case "produtos":
            include_once('pagina/painel/pagina/estatisticas/view/produtos.php');
            break;
    }
}