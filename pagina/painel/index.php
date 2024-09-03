<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="<?= $_PREFIXO ?>source/bibliotecas/material-design/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= $_PREFIXO?>source/css/padrao.css">
    <link rel="stylesheet" href="<?= $_PREFIXO?>source/css/painel-adm.css">
    <link rel="stylesheet" href="<?= $_PREFIXO?>source/css/adm/paineladm.css">
</head>
<script src="<?= $_PREFIXO?>source/js/funcoesjs.js"></script>
<script src="<?= $_PREFIXO?>source/js/adm/adm.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

<script>
urlPrefixo = '<?= $_PREFIXO?>'
</script>

<?php 
session_start();
if(validarSessaoAdm()){
?>



<!-- --------------TOASTS------------------ -->
<?php include_once('./pagina/painel/layout/mensagem.php')?>

<!-- --------------------------------------- -->
<style>
.loading-container {
    text-align: center;
    background-color: rgba(0, 0, 0, 0.5);
    color: aliceblue;
    position: fixed;
    z-index: 999;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>
<div class="loading-container vw-100 vh-100 d-flex flex-column justify-content-center align-items-center d-none" id="loading">
    <div class="spinner-border text-warning" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <p>Carregando...</p>
</div>

<div>
    <?php include_once('./pagina/painel/layout/header.php');?>
</div>
<div class="d-flex flex-column flex-md-row" style="min-height:85vh;">
    <div>
        <?php include_once('./pagina/painel/layout/menulateral.php');?>
    </div>
    <div class="container-fluid p-3" style="background-color: rgb(233, 236, 239);">

        <?php 
        
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(Isset($dados['retorno'])){
            $retorno= explode("_",$dados['retorno']);
            if($retorno[0]=="true"){
                mensagemBox('warning','Sucesso!',$retorno[1]);
            }else{
                mensagemBox('danger','Erro!',$retorno[1]);
            }
        }

        if(isset($url[1])){
            switch($url[1]){
                case "cargotipo":
                    include_once('pagina/painel/pagina/cargotipo/cargotipo.php');
                    break;
                case "cargo":
                    include_once('pagina/painel/pagina/cargo/cargo.php');
                    break;
                case "categoria":
                    include_once('pagina/painel/pagina/categoria/categoria.php');
                    break;
                case "estatisticas":
                    include_once('pagina/painel/pagina/estatisticas/estatisticas.php');
                    break;
                case "fornecedor":
                    include_once('pagina/painel/pagina/fornecedor/fornecedor.php');
                    break;
                case "genero":
                    include_once('pagina/painel/pagina/configuracoes/genero/genero.php');
                    break;
                case "logout":
                    include_once('pagina/painel/pagina/login/acao/logout.php');
                    break;
                case "notificacoes":
                    include_once('pagina/painel/pagina/notificacoes/notificacoes.php');
                    break;
                case "produtos":
                    include_once('pagina/painel/pagina/produtos/produtos.php');
                    break;
                case "usuario":
                    include_once('pagina/painel/pagina/usuario/usuario.php');
                    break;
                default:
                    include_once('pagina/painel/pagina/home/home.php');
                    break;
            }
        }else{
            include_once('pagina/painel/pagina/home/home.php');
        }
        ?>
    </div>
</div>

<?php 
}else{
    include_once('pagina/painel/pagina/login/login.php');
}
?>