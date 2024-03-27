<?php include_once('controle.php'); ?>

<style>
.card-lista:hover {
    background-color: ghostwhite;
}
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="adm.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="?pagina=administrador">Administradores</a></li>
        <!--        <li class="breadcrumb-item active" aria-current="page">Data</li>-->
    </ol>
</nav>
<div class="container-fuid d-flex justify-content-between pt-3 pb-3">
    <h5>Administradores</h5>
    <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdministradorAdd">Cadastrar</button> -->
    <a href="?pagina=administrador&entrada=cadastrar"><button class="btn btn-primary">Cadastrar</button></a>
</div>
<div class="card">
    <div class="card-body">
        <?php 
 $listarPessoa = listarGeral('*', 'pessoa');
foreach ($listarPessoa as $pessoa) {
    $idPessoa = $pessoa->idpessoa;
    $nome = $pessoa->nome;
    $email = $pessoa->email;
    $nomeCompleto =  $pessoa->nome ." ".$pessoa->sobrenome;
    $foto = $pessoa->foto;
    $cpf = $pessoa->cpf;
    $cadastro = $pessoa->cadastro;
    $alteracao = $pessoa->alteracao;
    $ativo = $pessoa->ativo;
    if ($ativo == 'A') {
        $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Banner Ativado"><span class="mdi mdi-lock-open-check text-success"></span>Ativo</a>';
    } else {
        $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Banner Desativado"><span class="mdi mdi-lock-check text-danger"></span> Desativado</a>';
}?>

        <div class="card card-lista mt-2 border border-0 shadow-sm">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between">
                <div class="d-flex flex-column flex-md-row flex-fill">
                    <div class="d-flex col-md-6">
                        <img src="./user/img/<?php echo $foto;?>" class="rounded-circle"
                            style="width:50px;height:50px;">
                        <div class="d-flex flex-column ps-2">
                            <div>Nome: <strong><?php echo $nomeCompleto?></strong></div>
                            <div>CPF: <strong><?php echo $cpf?></strong></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column ps-2  col-md-6">
                        <div>E-mail: <strong><?php echo $email?></strong></div>
                        <div>Ativo: <strong><?php echo $btnAtivo?></strong></div>
                    </div>
                </div>
                <div class="p-2">
                    <div class="d-flex flex-md-row flex-column gap-2">
                        <a href="#" class="btn btn-sm btn-outline-primary" aria-current="page"
                            title="Ver detalhes do banner"><span class="mdi mdi-monitor-eye"></span> Ver Mais</a>
                        <a href="?pagina=administrador&entrada=alterar" class="btn btn-sm btn-outline-primary" title="Alterar informações do Banner"><span
                                class="mdi mdi-file-document-edit"></span>
                            Alterar</a>
                        <a href="?pagina=administrador&entrada=excluir" class="btn btn-sm btn-outline-primary" title="Excluir Banner"><span
                                class="mdi mdi-delete-alert"></span> Excluir</a>
                    </div>
                </div>
            </div>
        </div>


        <?php }?>
        <div class="row float-end pt-3">
            <div class="col-8">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">2</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAdministradorAdd" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="frmAdmAdd" name="frmAdmAdd" method="post" action="#">

                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <input type="file" name="img" id="iImg" style="display: none;">
                                    <label for="iImg" style="cursor: pointer;">
                                        <div id="imagemPreview">
                                            <img id="imgPreview" src="./banner/img/sem-imagem.png"
                                                alt="Preview da Imagem" style="max-width: 100%; height: 200px;">
                                        </div>
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="inputNome" class="form-label">Nome</label>
                                        <input type="text" id="inputNome" class="form-control" name="nome">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputSobrenome" class="form-label">Sobrenome</label>
                                        <input type="text" id="inputSobrenome" class="form-control" name="sobrenome">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputCPF" class="form-label">CPF</label>
                                        <input type="text" id="inputCPF" class="form-control" name="cpf">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputNascimento" class="form-label">Nascimento</label>
                                    <input type="date" id="inputNascimento" class="form-control" name="nascimento">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="inputTelefone" class="form-label">Telefone</label>
                                    <input type="text" id="inputTelefone" class="form-control" name="telefone">
                                </div>
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label">E-mail</label>
                                    <input type="email" id="inputEmail" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button class="btn btn-primary" onclick="cadastrar()">Cadastrar</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-md-center">
                <?php echo formatarDataExtenso() ?>
            </div>
        </div>
    </div>
</div>


<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast show" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="background-color: var(--cor-principal)">
            <strong class="me-auto">Mensagem de Sucesso</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Banner Cadastrado com sucesso!
        </div>
    </div>
</div>

