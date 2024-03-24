<style>
    .card-lista:hover{
        background-color:ghostwhite;
    }
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="adm.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="?pagina=banner">Administradores</a></li>
        <!--        <li class="breadcrumb-item active" aria-current="page">Data</li>-->
    </ol>
</nav>

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
                <img src="./user/img/<?php echo $foto;?>" class="rounded-circle" style="width:50px;height:50px;">
                <div class="d-flex flex-column ps-2">
                    <div >Nome: <strong><?php echo $nomeCompleto?></strong></div>
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
                <a href="#" class="btn btn-sm btn-outline-primary" title="Alterar informações do Banner"><span
                        class="mdi mdi-file-document-edit"></span>
                    Alterar</a>
                <a href="#" class="btn btn-sm btn-outline-primary" title="Excluir Banner"><span
                        class="mdi mdi-delete-alert"></span> Excluir</a>
            </div>
        </div>
    </div>
</div>

<?php }?>

<div class="modal fade" id="modalBannerAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">#Novo Banner</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        Cadastrar
                    </div>
                    <div class="card-body">
                        <form id="frmBannerAdd" name="frmBannerAdd" method="post" action="#">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <input type="file" name="img" id="iImg" style="display: none;">
                                    <label for="iImg" style="cursor: pointer;">
                                        <div id="imagemPreview">
                                            <img id="imgPreview" src="./banner/img/sem-imagem.png"
                                                alt="Preview da Imagem" style="max-width: 100%; height: 200px;">
                                        </div>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="iTitulo" class="form-label">Título:</label>
                                        <input type="text" class="form-control" id="iTitulo" name="titulo"
                                            aria-describedby="tituloHelp">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="sTipo" class="form-label">Tipo:</label>
                                        <select class="form-select" aria-label="Default select example" id="sTipo">
                                            <option value="Rotativo" selected>Rotativo</option>
                                            <option value="Central">Central</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="iDataF" class="form-label">Data Final:</label>
                                        <input type="text" class="form-control" name="dataf" id="iDataF">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="iDataF" class="form-label">Data Final:</label>
                                        <input type="text" class="form-control" name="dataf" id="iDataF">
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
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

<script>
document.getElementById('iImg').addEventListener('change', function() {
    var arquivo = this.files[0];
    if (arquivo) {
        var leitor = new FileReader();
        leitor.onload = function() {
            document.getElementById('imgPreview').src = leitor.result;
        }
        leitor.readAsDataURL(arquivo);
    } else {
        document.getElementById('imgPreview').src = 'img/sem-imagem.png';
    }
});
</script>