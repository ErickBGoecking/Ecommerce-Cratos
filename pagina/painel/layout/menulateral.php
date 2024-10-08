<?php
$pagina = "";
$pagina2 = "";
if(isset($url[1])){$pagina = $url[1];};
if(isset($url[2])){$pagina2 = $url[1].'/'.$url[2];};
$menu = array(
    "Pagina Incicial" => array(
        "icone" => "mdi mdi-home",
        "link" => ""
        ),
    "Estatísticas" => array(
        "icone" => "mdi mdi-chart-bar",
        "subMenu" => array(
            "Visão geral" => array("icone" => "mdi mdi-card-account-details-star", "link" => "estatisticas/visaogeral"),
            "Pagos" => array("icone" => "mdi mdi-card-account-details-star", "link" => "estatisticas/pagos"),
            "Envios" => array("icone" => "mdi mdi-card-account-details-star", "link" => "estatisticas/envios"),
            "Produtos" => array("icone" => "mdi mdi-card-account-details", "link" => "estatisticas/produtos")        
        )),
    "Administrar" => array("icone" => "mdi mdi-email", "link" => "label"),
    "Vendas" => array(
        "icone" => "mdi mdi-currency-usd",
        "subMenu" => array(
            "Lista de vendas" => array("icone" => "mdi mdi-order-bool-descending", "link" => "vendas/lista"),
            "A enviar" => array("icone" => "mdi mdi-order-bool-descending", "link" => "vendas/aenviar"),
            "Enviados" => array("icone" => "mdi mdi-order-bool-descending", "link" => "vendas/enviados"),
        )),
    "Produtos" => array(
        "icone" => "mdi mdi-tag",
        "subMenu" => array(
            "Lista de Produtos" => array("icone" => "mdi mdi-order-bool-descending", "link" => "produtos/lista"),
            "categorias" => array("icone" => "mdi mdi-order-bool-descending", "link" => "produtos/categorias"),
        )),
    "Clientes" => array(
        "icone" => "mdi mdi-account-group",
        "subMenu" => array(
            "Lista de Produtos" => array("icone" => "mdi mdi-order-bool-descending", "link" => "clientes/lista"),
            "categorias" => array("icone" => "mdi mdi-order-bool-descending", "link" => "clientes/categorias"),
        )),
    "Fornecedores" => array(
        "icone" => "mdi mdi-factory",
        "subMenu" => array(
            "Lista de fornecedores" => array("icone" => "mdi mdi-order-bool-descending", "link" => "fornecedores/lista"),
        ),
    // "Cadastro" => array(
    //     "icone" => "mdi mdi-content-save-move",
    //     "subMenu" => array(
    //         "Categorias" => array("icone" => "mdi mdi-order-bool-descending", "link" => "categoria"),
    //         "Produtos" => array("icone" => "mdi mdi-cart", "link" => "produto"),
    //         "Fornecedores" => array("icone" => "mdi mdi-account-tie", "link" => "fornecedor"),
    //     )
    ),
    "Administrador" => array(
        "icone" => "mdi mdi-content-save-move",
        "subMenu" => array(
            "Usuarios" => array("icone" => "mdi mdi-account", "link" => "usuarios"),
        )
    ),
    "Banners" => array(
        "icone" => "mdi mdi-content-save-move",
        "subMenu" => array(
            "Lista de banners" => array("icone" => "mdi mdi-order-bool-descending", "link" => "banner/lista"),
        )),
    "Configurações" => array("icone" => "mdi mdi-email", "link" => "label"),
    "Genero" => array(
        "icone" => "mdi mdi-content-save-move",
        "subMenu" => array(
            "Listar genero" => array("icone" => "mdi mdi-account", "link" => "genero/listar"),
        )
    ),
    "Cargos" => array(
        "icone" => "mdi mdi-content-save-move",
        "subMenu" => array(
            "Listar genero" => array("icone" => "mdi mdi-account", "link" => "cargos/listar"),
        )
    ),
    // "Configurações" => array(
    //     "icone" => "mdi mdi-cog",
    //     "subMenu" => array(
    //         "Genero" => array("icone" => "mdi mdi-card-account-details-star", "link" => "genero"),
    //         "Cargos Tipos" => array("icone" => "mdi mdi-card-account-details-star", "link" => "cargotipo"),
    //         "Cargos" => array("icone" => "mdi mdi-card-account-details-star", "link" => "cargo"),
    //         "Funcionários" => array("icone" => "mdi mdi-card-account-details", "link" => "funcionario"),
    //         "Banners" => array("icone" => "mdi mdi-panorama", "link" => "banner")
    //     )
    // ),
    // "Mensagens" => array("icone" => "mdi mdi-email", "link" => "mensagem"),
    "Meu Perfil" => array("icone" => "mdi mdi-account", "link" => "perfil"),
);
?>
<div class="barra_lateral" id="menuLateral">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid align-items-start">
            <a class="navbar-brand p-0 m-0" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse m-0 mt-3 " id="menu">
                <nav class="nav flex-column container-fluid justify-content-start p-0">

                    <?php foreach ($menu as $titulo => $item) {
                        if(isset($item['link']) && $item['link'] == "label"){
                            echo "<div class='p-3 pb-0 text-body-tertiary rounded'><h5>$titulo</h5></div>";

                        }else{
                        if (is_array($item) && isset($item['subMenu'])) {
                            $id = str_replace(" ","",$titulo);
                            $aberto = False;
                            foreach($item['subMenu'] as $indice => $i){
                                if( $i['link']==$pagina2){
                                    $aberto=True;
                                }
                            };
                        ?>

                    <div class="accordion accordion-flush container-fluid  p-0" id="accordion<?php echo $id;?>">
                        <div class="accordion-item">
                            <div class=" item-menu <?php if($aberto){echo 'menuAberto';}?>">
                                <h2 class="accordion-header">
                                    <div class="accordion-button collapsed bg-body-tertiary p-2 ps-0"
                                        data-bs-toggle="collapse" data-bs-target="#<?php echo $id;?>"
                                        aria-expanded="true" aria-controls="<?php echo $id;?>">
                                        <span class="<?php echo $item['icone']?>"></span><span class="px-3">
                                            <?php  echo $titulo;?>
                                        </span>
                                    </div>
                                </h2>
                            </div>
                            <?php foreach ($item['subMenu'] as $subTitulo => $subItem) { ?>
                            <div id="<?php echo $id;?>"
                                class="accordion-collapse collapse <?php if($aberto){echo 'show';}?>"
                                data-bs-parent="#accordion<?php echo $id;?>">
                                <div class="accordion-body pt-0 pb-0">
                                    <div class="item-menu">
                                        <a class="nav-link <?php if($pagina2==$subItem['link']){echo 'ativo';}?>"
                                            href="<?php echo $_PREFIXO . "adm/" . $subItem['link'];?>">
                                            <!-- <span class="<?php echo $subItem['icone']?>"></span> -->
                                            <span class="ps-2 item-menu-sub"><?php echo $subTitulo;?></a>
                                    </div>
                                </div>
                            </div>
                            <?php };?>
                        </div>
                    </div>

                    <?php }else{?>

                    <div class="item-menu ">
                        <a class="nav-link <?php if($pagina2==$item['link']){echo 'ativo';}?>"
                            href="<?php echo $_PREFIXO. "adm/" . $item['link'];?>"><span
                                class="<?php echo $item['icone']?>"></span><span
                                class="ps-2 item-menu-sub"><?php echo $titulo;?></a>
                    </div>

                    <?php }}};?>
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

window.addEventListener('scroll', mudar());
window.addEventListener('resize', mudar());
</script>