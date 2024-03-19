<?php 
include_once("cabecalho.php");
?>

<body class="bg-body-tertiary">

    <div class="d-flex flex-column flex-md-row">

        <?php include_once('barraLateral.php');?>

        <div class="conteúdo bg-body-secondary d-flex justify-content-center" style="width:100%">
            <?php 
            
            if (isset($_GET['pagina']) && !empty($_GET['pagina'])){
                $pagina = $_GET['pagina'];

                switch ($pagina){
                    case "historico":
                        include_once('historico.php');
                        break;
                    case "carrinho":
                        include_once('carrinho.php');
                        break;
                    case "lista-desejos":
                        include_once('lista-desejos.php');
                        break;
                }
            }

            ?>
        </div>
    </div>

</body>

</html>