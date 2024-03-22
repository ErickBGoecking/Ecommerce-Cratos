<?php
$pagina = "";
if(isset($_GET['pagina'])){$pagina = $_GET['pagina'];};
?>
<style>
    .ativo {
        background-color: var(--cor-principal) !important;
        border-radius: 8px;
        color:black;
        font-weight: 600;
    }
    .ativo *{
        background-color: var(--cor-principal) !important;
    }
</style>
<div class="barra_lateral col-md-2" id="menuLateral">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid align-items-start">
            <a class="navbar-brand p-0 m-0" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse m-0 mt-3 " id="navbarTogglerDemo02">
                <nav class="nav flex-column container-fluid justify-content-start p-0">
                    <div class="accordion accordion-flush container-fluid  p-0" id="accordionFlushExample">
                        <div class="accordion-item">
                            <div class=" item-menu
                            <?php
                            if($pagina=='categoria'or$pagina=='produto'or$pagina=='fornecedor')
                            {echo 'menuAberto';}
                            ?>">
                                <h2 class="accordion-header">
                                    <div class="accordion-button collapsed bg-body-tertiary ps-0"
                                         data-bs-toggle="collapse" data-bs-target="#showCadastro"
                                         aria-expanded="false" aria-controls="showCadastro">
                                        <span class="mdi mdi-content-save-move"></span><span class="ps-2"></span>Cadastros
                                    </div>
                                </h2>
                            </div>
                            <div id="showCadastro" class="accordion-collapse collapse
                                <?php
                            if($pagina=='categoria'or$pagina=='produto'or$pagina=='fornecedor')
                            {echo 'show';}
                            ?>"
                                 data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class=" item-menu"><a class="nav-link <?php if($pagina=='categoria'){echo 'ativo';}?>" aria-current="page" href="?pagina=categoria"><span class="mdi mdi-order-bool-descending"></span><span class="ps-2"></span>Categorias</span></a></div>
                                    <div class=" item-menu"><a class="nav-link <?php if($pagina=='produto'){echo 'ativo';}?>" aria-current="page" href="?pagina=produto"><span class="mdi mdi-cart"></span><span class="ps-2"></span>Produtos</span></a></div>
                                    <div class=" item-menu "><a class="nav-link  <?php if($pagina=='fornecedor'){echo 'ativo';}?>" aria-current="page" href="?pagina=fornecedor"><span class="mdi mdi-account-tie"></span><span class="ps-2"></span> Fornecedores</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion accordion-flush container-fluid  p-0" id="accordionConfig">
                        <div class="accordion-item">
                            <div class=" item-menu
                            <?php
                            if($pagina=='cargo'or$pagina=='funcionario'or$pagina=='administrador'or$pagina=='banner')
                            {echo 'menuAberto';}
                            ?>">
                                <h2 class="accordion-header">
                                    <div class="accordion-button collapsed bg-body-tertiary ps-0"
                                         data-bs-toggle="collapse" data-bs-target="#showConfig"
                                         aria-expanded="false" aria-controls="showConfig">
                                        <span class="mdi mdi-content-save-move"></span><span class="ps-2"></span>Configurações
                                    </div>
                                </h2>
                            </div>
                            <div id="showConfig" class="accordion-collapse collapse
                                <?php
                            if($pagina=='cargo'or$pagina=='funcionario'or$pagina=='administrador'or$pagina=='banner')
                            {echo 'show';}
                            ?>"
                                 data-bs-parent="#accordionConfig">
                                <div class="accordion-body">
                                    <div class=" item-menu"><a class="nav-link <?php if($pagina=='cargo'){echo 'ativo';}?>" aria-current="page" href="?pagina=cargo"><span class="mdi mdi-order-bool-descending"></span><span class="ps-2"></span>Cargos</span></a></div>
                                    <div class=" item-menu"><a class="nav-link <?php if($pagina=='funcionario'){echo 'ativo';}?>" aria-current="page" href="?pagina=funcionario"><span class="mdi mdi-cart"></span><span class="ps-2"></span>Funcionários</span></a></div>
                                    <div class=" item-menu "><a class="nav-link  <?php if($pagina=='banner'){echo 'ativo';}?>" aria-current="page" href="?pagina=banner"><span class="mdi mdi-account-tie"></span><span class="ps-2"></span> Banners</a></div>
                                    <div class=" item-menu "><a class="nav-link  <?php if($pagina=='administrador'){echo 'ativo';}?>" aria-current="page" href="?pagina=administrador"><span class="mdi mdi-account-tie"></span><span class="ps-2"></span> Administradores</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <a class="nav-link" href="#">Link</a> -->
                    <div class="item-menu">
                        <a class="nav-link <?php if($pagina=='mensagem'){echo 'ativo';}?>" href="?pagina=mensagem"><span class="mdi mdi-email item-menu-sub"></span><span class="ps-2 item-menu-sub">Mensagens</a>
                    </div>
                    <div class="item-menu">
                        <a class="nav-link <?php if($pagina=='perfil'){echo 'ativo';}?>" href="?pagina=perfil"><span class="mdi mdi-account"></span><span class="ps-2 ">MeuPerfil</a>
                    </div>
                </nav>
            </div>
        </div>
    </nav>
</div>

<script>
    function mudar() {
        var menu = document.getElementById("menuLateral");
        var resolucao = window.innerWidth;

        if (window.scrollY > 260 && resolucao < 720) {
            menu.style.cssText = "position: fixed; top: 0; width: 100%; z-index: 1;";
        } else if (resolucao < 720) {
            menu.style.cssText = "position: relative; width: 100%;";
        } else {
            menu.style.cssText = "position: relative; width: 16%;";
        }
    }

    window.addEventListener('scroll', mudar);
    window.addEventListener('resize', mudar);

</script>