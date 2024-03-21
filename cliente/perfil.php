<?php 
$itens=array(
    "0" => array(
        "title" => "Dados Pessoais",
        "info" => "Informações do seu documento de identidade e de sua atividade econômica.",
        "icone" => "mdi-account",
        "link" => "#",
    ),
    "1" => array(
        "title" => "Segurança",
        "info" => "Configurações de segurança.",
        "icone" => "mdi-lock-check",
        "link" => "#",
    ),
    "2" => array(
        "title" => "Cartões",
        "info" => "Cartões salvo na sua conta.",
        "icone" => "mdi-card-bulleted-outline",
        "link" => "#",
    ),
    "3" => array(
        "title" => "Endereços",
        "info" => "Endereços salvos na sua conta.",
        "icone" => "mdi-map-marker-outline",
        "link" => "#",
    ));
?>

<style>
.menuPerfil a {
    text-decoration: none;
    color: gray;
    border: 1px solid white;
    border-radius: 10px;
}

.menuPerfil a:hover {
    border: 1px solid gray;
}
</style>

<div class="container col-md-6 pt-3">
    <div class="card border border-0 shadow-sm">
        <div class="card-body d-flex">
            <img src="./img/luciano.jpg" class="rounded-circle" alt="" style="width: 100px">
            <div class="d-flex flex-column ms-5 justify-content-center">
                <h2>Luciano Pettercen</h2>
                <p>luciano@email.com</p>
            </div>
        </div>
    </div>

    <div class="card border border-0 shadow-sm mt-3 menuPerfil">
        <div class="card-body d-flex flex-column justify-content-center ">
            <?php 
            foreach($itens as $item){
            ?>

            <a href="<?php echo $item['link']?>" class="p-2">
                <div class="d-flex justify-content-between justify-content-center pt-2">
                    <div class="text-center ps-2">
                        <div class="rounded-circle border d-flex justify-content-center align-items-center" style="width:50px;height:50px;">
                            <h2 class="d-flex justify-content-center align-items-center "
                                style="color:var(--cor-principal);"><span class="mdi <?php echo $item['icone']?> pt-2"></span>
                            </h2>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-0 ps-3 flex-fill">
                        <p><strong><?php echo $item['title']?></strong>
                            <br><span class="d-inline-block text-truncate" style="max-width: 150px;"><?php echo $item['info']?></span>
                        </p>
                    </div>
                    <span class="mdi mdi-chevron-right px-3 mt-3"></span>
                </div>
            </a>
            <?php };?>

        </div>
    </div>

</div>