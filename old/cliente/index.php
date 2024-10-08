<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cliente Cratos</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../source/bibliotecas/slick/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="../../source/bibliotecas/slick/css/slick-theme.css" />
    <link type="text/css" rel="stylesheet" href="../css/nouislider.min.css" />
    <link rel="stylesheet" href="../../source/fonts/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../../source/css/style.css" />
    <link rel="stylesheet" type="text/css"
        href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/bootstrap-personalizado.css">

</head>

<body class="bg-body-tertiary">
    <?php 
    include_once("topo.php");
    ?>

    <div class="d-flex flex-column flex-md-row">

        <?php 
        include_once('barraLateral.php');
        
        ?>

        <div class="bg-body-secondary" style="width:100%; min-height:83vh;">
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
                    case "perfil":
                        include_once('perfil.php');
                        break;                
                    default:
                        include_once('perfil.php');
                        break;
                }
            }else{
                include_once('perfil.php');
            }

            ?>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../../source/bibliotecas/slick/js/slick.min.js"></script>
    <script src="../../source/bibliotecas/novislider/js/nouislider.min.js"></script>
    <script src="../../source/bibliotecas/jquery/jquery.zoom.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

</body>

</html>