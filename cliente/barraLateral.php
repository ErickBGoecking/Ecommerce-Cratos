<?php 
$pagina = "";
    if(isset($_GET['pagina'])){$pagina = $_GET['pagina'];};
?>
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
                                if($pagina=='historico'or$pagina=='carrinho'or$pagina=='lista-desejos')
                                {echo 'menuAberto';}
                                ?>">
                                <h2 class="accordion-header">
                                    <div class="accordion-button collapsed bg-body-tertiary ps-0"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                        <span class="mdi mdi-shopping"></span><span class="ps-2"></span>Compras
                                    </div>
                                </h2>
                            </div>
                            <div id="flush-collapseOne" class="accordion-collapse collapse 
                                <?php 
                                if($pagina=='historico'or$pagina=='carrinho'or$pagina=='lista-desejos')
                                {echo 'show';}
                                ?>"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">

                                    <div class=" item-menu"><a class="nav-link <?php if($pagina=='historico'){echo 'ativo';}?>" aria-current="page"
                                            href="?pagina=historico"><span
                                                class="mdi mdi-order-bool-descending"></span><span
                                                class="ps-2"></span>Histórico</span></a></div>
                                    <div class=" item-menu"><a class="nav-link <?php if($pagina=='carrinho'){echo 'ativo';}?>" aria-current="page"
                                            href="?pagina=carrinho">
                                            <span class="mdi mdi-cart"></span><span class="ps-2"></span>
                                            Carrinho</span></a></div>
                                    <div class=" item-menu "><a class="nav-link  <?php if($pagina=='lista-desejos'){echo 'ativo';}?>" aria-current="page"
                                            href="?pagina=lista-desejos"><span class="mdi mdi-heart"></span><span
                                                class="ps-2"></span> Lista de Desejos</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <a class="nav-link" href="#">Link</a> -->
                    <div class="item-menu  ">
                        <a class="nav-link <?php if($pagina=='mensagem'){echo 'ativo';}?>" href="?pagina=mensagem"><span class="mdi mdi-email item-menu-sub"></span><span
                                class="ps-2 item-menu-sub">Mensagens</a>
                    </div>
                    <div class="item-menu  ">
                        <a class="nav-link <?php if($pagina=='perfil'){echo 'ativo';}?>" href="?pagina=perfil"><span class="mdi mdi-account"></span><span class="ps-2">Meu
                                Perfil</a>
                    </div>
                </nav>
            </div>
            <!-- <div class="vh-100 d-none d-md-block"></div> -->
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