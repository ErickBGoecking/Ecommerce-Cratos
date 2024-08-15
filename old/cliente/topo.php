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
                        <img src="./img/luciano.jpg" class="rounded-circle" alt="Luciano Pettersen" title="Luciano Pettersen" width="35px">
                        <button class="btn texto-dourado dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Luciano Pettersen
                        </button>
                        <ul class="dropdown-menu">
                            <div class="d-flex flex-column">
                                <li><a class="dropdown-item" href="?pagina=perfil"><span class="mdi mdi-account"></span> Perfil</a></li>
                                <li><a class="dropdown-item" href="#"><span class="mdi mdi-door-closed"></span> Sair</a></li>
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
                        <a href="http://cratos.prod" class="logo">
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