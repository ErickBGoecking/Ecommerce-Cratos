<?php
session_start();
include_once './func/func.php';
//if (session_status() == PHP_SESSION_NONE) {
//    session_start();
//}
validarSessaoExterna('index.php');
?>
<?php
include_once("topo.php");
?>

<body class="bg-body-tertiary">

<div class="d-flex flex-column flex-md-row">

    <?php include_once('menuLateral.php');?>

    <div class="conteúdo col-md-10 bg-body-secondary" style="min-height: 100vh;">

    </div>
</div>

</body>

</html>