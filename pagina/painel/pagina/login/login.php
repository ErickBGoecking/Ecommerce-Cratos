<?php 
if(isset($_POST) && !empty($_POST)){
    include_once('pagina/painel/pagina/login/acao/logar.php');
}
?>
<div class="container-fluid fundoAdm p-0 d-flex flex column justify-content-center align-items-center" style="height:100vh;">
    <div class="card col-2 border border-0 shadow rounded-4">
        <div class="card-header bg-dark text-white rounded-top-4">
            <div class="row text-center ">
                <div class="col-12 p-2 ">
                    <img src="<?= $_PREFIXO?>img/assets/logo1.png" width="60%" class="img-responsive" alt="Cratos"
                        title="Cratos">
                </div>
                <div class="col-12 bg-gold p-0 fw-bold rounded-3">
                    ÁREA RESTRITA
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="inEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="emailLogar" id="inEmail" aria-describedby="emailHelp"
                        required>
                </div>
                <div class="mb-3">
                    <label for="inSenha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" name="senhaLogar" id="inSenha" required>
                </div>
                <div class="alert alert-dismissible fade show text-center d-none" id="alertMsg" role="alert">
                    <span id="alertText"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <button type="submit" class="btn btn-sm btn-primary float-end fw-bold"
                    id="btnLogarEntrar">Entrar</button>
            </form>
        </div>
    </div>
</div>