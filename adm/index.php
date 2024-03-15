<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADM-Cratos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            margin-top:8%;
            background-color: Gold;
            font-family: 'Nunito', sans-serif;
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            font-weight: 300;
            line-height: 1.5;

        }
        .bg-gold{
            font-size: small;
            color: #000000;
            background-color: Gold;
        }
        .btn-Gold {
            --bs-btn-color: #000;
            --bs-btn-bg: #f5c400;
            --bs-btn-border-color: #f5c400;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #f4de87;
            --bs-btn-hover-border-color: #f4de87;
            --bs-btn-focus-shadow-rgb: 49, 132, 253;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #0a58ca;
            --bs-btn-active-border-color: #f4de87;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #f4de87;
            --bs-btn-disabled-border-color: #f5c400;
        }
        .alert {
            font-size:smaller;
            /*--bs-alert-bg: transparent;*/
            --bs-alert-padding-x: 0.3rem!important;
            --bs-alert-padding-y: 0.3rem!important;
            /*--bs-alert-margin-bottom: 1rem;*/
            /*--bs-alert-color: inherit;*/
            /*--bs-alert-border-color: transparent;*/
            /*--bs-alert-border: var(--bs-border-width) solid var(--bs-alert-border-color);*/
            /*--bs-alert-border-radius: var(--bs-border-radius);*/
            /*--bs-alert-link-color: inherit;*/
            position: relative;
            /*padding: var(--bs-alert-padding-y) var(--bs-alert-padding-x);*/
            /*margin-bottom: var(--bs-alert-margin-bottom);*/
            /*color: var(--bs-alert-color);*/
            /*background-color: var(--bs-alert-bg);*/
            /*border: var(--bs-alert-border);*/
            /*border-radius: var(--bs-alert-border-radius);*/
        }
        .alert-dismissible .btn-close {
            /*position: absolute;*/
            /*top: 0;*/
            /*right: 0;*/
            /*z-index: 2;*/
            padding: 0.6rem 1rem!important;
        }
        .alert-dismissible {
             padding-right: 0.1rem!important;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 col-sm-8 col-md-6 col-lg-3 pt-3 pb-3 shadow rounded">
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

                        <button type="submit" class="btn btn-sm btn-Gold float-end fw-bold" id="btnLogarEntrar">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="./js/scriptcrato.js"></script>
</body>
</html>