
<style>
    #top-header{
        background-color: #161716;
    }
    .header{
        background-color: black;
    }
    .search-btn {
        color: black !important;
    }
</style>
<header>
    <div id="top-header">
        <div class="container-fluid p-3">
            <!-- <ul class="header-links pull-right" style="margin-top: -20px">
                <li>
                    <div class="dropdown">
                        <img src="<?php echo $FotoAdmin?>" class="rounded-circle" alt="<?php echo $NomeAdmin?>"
                             title="<?php echo $NomeAdmin?>" width="35px">
                        <button class="btn texto-dourado dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <?php echo $NomeAdmin?>
                        </button>
                        <ul class="dropdown-menu">
                            <div class="d-flex flex-column">
                                <li><a class="dropdown-item" href="#"><span class="mdi mdi-account"></span> Perfil</a>
                                </li>
                                <li><a class="dropdown-item" href="logout.php"><span class="mdi mdi-door-closed"></span>
                                        Sair</a></li>
                            </div>
                        </ul>
                    </div>
                </li>
            </ul> -->
        </div>
    </div>
    <div id="header" class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="adm.php" class="logo">
                            <img src="<?php echo $_PREFIXO;?>img/assets/logo1.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>