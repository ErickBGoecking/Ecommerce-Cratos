<?php
if (isset($idAdmin)) {
    $idAdmin = $idAdmin;
}else{
    $idAdmin = 0;
}
if (isset($FotoAdmin)) {
    $FotoAdmin = $FotoAdmin;
}else{
    $FotoAdmin = 'semfoto.png';
}
if (isset($NomeAdmin)) {
    $NomeAdmin = $NomeAdmin;
}else{
    $NomeAdmin = '';
}
?>

<style>
    .search-btn {
        color: black !important;
    }
</style>
<header>
    <div id="top-header">
        <div class="container-fluid p-3">
            <ul class="header-links pull-right" style="margin-top: -20px">
                <li>
                    <div class="dropdown">
                        <img src="./user/img/<?php echo $FotoAdmin?>" class="rounded-circle" alt="<?php echo $NomeAdmin?>"
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
            </ul>
        </div>
    </div>
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="adm.php" class="logo">
                            <img src="../img/logo1.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">Categorias</option>
                                <option value="1">Categoria 01</option>
                                <option value="1">Categoria 02</option>
                            </select>
                            <input class="input" placeholder="Digite aqui">
                            <button class="search-btn">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>