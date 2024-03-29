<?php
session_start();
include_once './func/func.php';
include_once './config/constantes.php';
include_once './config/conexao.php';
//if (session_status() == PHP_SESSION_NONE) {
//    session_start();
//}
validarSessaoExterna('index.php');
$idAdmin = $_SESSION['idsis'];
$retornoAdm = listarGeral('idpessoa', "pessoa WHERE idpessoa = $idAdmin AND ativo = 'A'");
if ($retornoAdm) {
    foreach ($retornoAdm as $itemAdm) {
        $idAdmin = $itemAdm->idpessoa;
    }
} else {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adm Cratos</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="../css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="../css/nouislider.min.css"/>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" type="text/css"
          href="//cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="../css/bootstrap-personalizado.css">
</head>

<body class="bg-body-tertiary">
<?php
if (isset($_GET['pagina']) && !empty($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = '';
}
include_once("topo.php");
?>

<div class="d-flex flex-column flex-md-row">

    <?php include_once('menuLateral.php'); ?>

    <div class="bg-body-secondary" style="width:100%; min-height:83vh;">
        <div class="container-fluid mt-4">
            <?php
            switch ($pagina) {
                case "categoria":
                    include_once('./produto/listaCategoria.php');
                    break;
                case "produto":
                    include_once('./produto/listaProduto.php');
                    break;
                case "fornecedor":
                    include_once('./fornecedor/listaFornecedor.php');
                    break;
                case "banner":
                    include_once('./banner/listaBanner.php');
                    break;
                case "usuarios":
                    include_once('./user/listaUsuarios.php');
                    break;
                case "cargoTipo":
                    include_once('./cargo/cargoTipoListar.php');
                    break;
                case "genero":
                    include_once('./genero/generoListar.php');
                    break;
            }
            ?>
        </div>
    </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/nouislider.min.js"></script>
<script src="../js/jquery.zoom.min.js"></script>
<!--<script src="../js/main.js"></script>-->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</body>

</html>