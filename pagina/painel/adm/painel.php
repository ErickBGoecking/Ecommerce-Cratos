<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="<?= $_PREFIXO ?>source/bibliotecas/material-design/font/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?= $_PREFIXO?>source/css/padrao.css">
<link rel="stylesheet" href="<?= $_PREFIXO?>source/css/painel-adm.css">
</head>

<script src="<?= $_PREFIXO?>source/js/funcoesjs.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<div>
    <?php include_once('./pagina/painel/adm/layout/header.php');?>
</div>
<div class="d-flex flex-column flex-md-row"  style="min-height:85vh;">
    <div>
        <?php include_once('./pagina/painel/adm/layout/menulateral.php');?>
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
                case "categoria":
                    include_once('pagina/painel/adm/pagina/categoria/categoria.php');
                    break;
                case "fornecedor":
                    include_once('pagina/painel/adm/pagina/fornecedor/fornecedor.php');
                    break;
                case "genero":
                    include_once('pagina/painel/adm/pagina/genero/genero.php');
                    break;
                case "produto":
                    include_once('pagina/painel/adm/pagina/produto/produto.php');
                    break;
                case "usuario":
                    include_once('pagina/painel/adm/pagina/usuario/usuario.php');
                    break;
                case "cargotipo":
                    include_once('pagina/painel/adm/pagina/cargotipo/cargotipo.php');
                    break;
                case "cargo":
                    include_once('pagina/painel/adm/pagina/cargo/cargo.php');
                    break;
            }
        }
        ?>
    </div>
</div>