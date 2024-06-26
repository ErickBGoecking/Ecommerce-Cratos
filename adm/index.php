<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM-Cratos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap-personalizado.css">
</head>
<body class="fundoAdm">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-8 col-md-6 col-lg-3 pt-3 pb-3 topoAdmCratos shadow rounded">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <div class="row text-center ">
                        <div class="col-12 p-2 ">
                            <img src="../img/logo1.png" width="60%" class="img-responsive" alt="Cratos" title="Cratos">
                        </div>
                        <div class="col-12 bg-gold p-0 fw-bold rounded-3">
                            ÁREA RESTRITA
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form name="frmLogar" id="frmLogar" action="#" method="POST">
                        <div class="mb-3">
                            <label for="inEmail" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="emailLogar" id="inEmail" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="inSenha" class="form-label">Senha:</label>
                            <input type="password" class="form-control" name="senhaLogar" id="inSenha">
                        </div>
                        <div class="alert alert-dismissible fade show text-center d-none" id="alertMsg" role="alert">
                            <span id="alertText"></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary float-end fw-bold" id="btnLogarEntrar">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/tgs-player.js"></script>
<script src="./js/autenticacao.js"></script>
</body>
</html>