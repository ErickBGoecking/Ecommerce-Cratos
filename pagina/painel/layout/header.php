<style>
#top-header {
    background-color: #161716;
}

.header {
    background-color: black;
}

.search-btn {
    color: black !important;
}
</style>
<?php 
$idsis = $_SESSION['idsis'];
$infoAdm = listarGeral('foto,nome',"pessoa where idpessoa = $idsis");
$FotoAdmin= $infoAdm[0]->foto;
$NomeAdmin= $infoAdm[0]->nome;
$notificacoes = listarGeral('idnotificacao,notificacao,link,data',"notificacao where idpessoa = 0 OR idpessoa = $idsis");
$qtdNotificacoes = count($notificacoes);
?>
<header>
    <div id="top-header" style="height:30px;">

    </div>
    <div id="header" class="header">
        <div class="container-fluid d-flex justify-content-between">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="adm.php" class="logo">
                            <img src="<?php echo $_PREFIXO;?>img/assets/logo1.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="container-fluid pt-3 d-flex justify-content-end">
                    <ul>
                        <li>
                            <button class="btn btn-dark rounded-pill text-warning position-relative dropdown-toggle"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="mdi mdi-bell-outline"></span>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $qtdNotificacoes;?>
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </button>
                            <ul class="dropdown-menu">
                                <div class="d-flex flex-column">
                                    <?php
                                    $qtd = 0;
                                    foreach($notificacoes as $notificacao){
                                        if($qtd <= 5){
                                            $texto = $notificacao->notificacao;
                                            $link = $_PREFIXO ."adm/". $notificacao->link;
                                            $item = <<<EOT
                                            <li class="p-2 pt-0 pb-0 dropdown-item d-flex">
                                                <a href="$link"><div class="text-truncate text-secondary p-2" style="width:200px;">$texto</div></a>
                                                <button class="btn btn-lignt rounded-circle">
                                                    <span class="mdi mdi-close"></span>
                                                </button>
                                            </li>
                                            EOT;
                                            echo $item;
                                            $qtd++;
                                        }
                                    }
                                    ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= $_PREFIXO?>adm/notificacoes/"><span
                                                class="mdi mdi-eye-plus-outline px-3"></span>
                                            Ver Mais</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="logout.php"><span
                                                class="mdi mdi-trash-can-outline px-3"></span>
                                            Linmpar</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                    <div>
                        <ul>
                            <li>
                                <img src="<?php echo $_PREFIXO.'img/usuario/'. $FotoAdmin?>" class="rounded-circle"
                                    alt="<?php echo $NomeAdmin?>" title="<?php echo $NomeAdmin?>" width="35px">
                                <button class="btn text-warning dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <?php echo $NomeAdmin?>
                                </button>
                                <ul class="dropdown-menu">
                                    <div class="d-flex flex-column">

                                        <li><a class="dropdown-item" href="#"><span class="mdi mdi-account"></span>
                                                Perfil</a>
                                        </li>
                                        <li><a class="dropdown-item" href="<?= $_PREFIXO?>adm/logout"><span
                                                    class="mdi mdi-door-closed"></span>
                                                Sair</a></li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>