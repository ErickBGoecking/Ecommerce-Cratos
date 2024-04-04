<?php include_once 'mensagem.php';?>
<style>
.card-lista:hover {
    background-color: ghostwhite;
}
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="adm.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="?pagina=administrador">Usuarios</a></li>
        <!--        <li class="breadcrumb-item active" aria-current="page">Data</li>-->
    </ol>
</nav>
<div class="container-fuid d-flex justify-content-between pt-3 pb-3">
    <h5>Usuarios</h5>
    <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal"
        data-bs-target="#modalUsuariosAdd" onclick="limparCadastroUsuario()">Cadastrar
    </button>
</div>

<div id="conteudo">
 
</div>


<div class="modal fade " id="modalUsuariosAdd" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="frmUsuarioAdd" name="frmUsuarioAdd" method="post" action="#">

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
                                <div class="d-flex flex-wrap">
                                    <div class="col-md-4 mb-3">
                                        <label for="inputNascimento" class="form-label">Gênero</label>
                                        <select class="form-select" aria-label="Default select example" name="genero" id="inputGenero">
                                        <option selected></option>
                                            <?php 
                                                $generos = listarGeral('*', 'genero');
                                                foreach($generos as $genero){
                                                    echo "<option value='" . $genero->IdGenero . "'>".$genero->Genero."</option>";
                                                };
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3 px-2">
                                        <label for="inputNascimento" class="form-label">Nascimento</label>
                                        <input type="date" id="inputNascimento" class="form-control" name="nascimento">
                                    </div>
                                    <div class="col-md-4 mb-3 px-2">
                                        <label for="inputTelefone" class="form-label">Telefone</label>
                                        <input type="text" id="inputTelefone" class="form-control" name="telefone">
                                    </div>
                                    <div class="col-md-6 mb-3 px-2">
                                        <label for="inputEmail" class="form-label">E-mail</label>
                                        <input type="email" id="inputEmail" class="form-control" name="email">
                                    </div>
                                    <div class="col-md-6 mb-3 px-2">
                                        <label for="inputSenha" class="form-label">Senha</label>
                                        <input type="password" id="inputSenha" class="form-control" name="senha">
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btnEnviar">
                                    Cadastrar
                                    
                                    <!-- onclick="addGeral('btnEnviar','frmUsuarioAdd','usuarioAdd', 'frmUsuarioAdd');" -->
                                </button>
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

<div class="modal fade " id="modalUsuarioAlt" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="frmUsuarioAlt" name="frmUsuarioAlt" method="post" action="#">
                            <input type="hidden" id="idPessoaAlt" class="form-control" name="idPessoa">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <input type="file" name="img" id="iImgAlt" style="display: none;">
                                    <label for="iImgAlt" style="cursor: pointer;">
                                        <div id="imagemPreview">
                                            <img id="imgPreviewAlt" src="user/img/semfoto.png"
                                                alt="Preview da Imagem" style="max-width: 100%; height: 200px;">
                                        </div>
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="inputNome" class="form-label">Nome</label>
                                        <input type="text" id="iNomeAlt" class="form-control" name="nome">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputSobrenome" class="form-label">Sobrenome</label>
                                        <input type="text" id="iSobrenomeAlt" class="form-control" name="sobrenome">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputCPF" class="form-label">CPF</label>
                                        <input type="text" id="iCpfAlt" class="form-control" name="cpf">
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap">
                                    <div class="col-md-4 mb-3">
                                        <label for="inputNascimento" class="form-label">Gênero</label>
                                        <select class="form-select" aria-label="Default select example" name="genero" id="iGeneroAlt">
                                            <option selected value="1">Masculino</option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3 px-2">
                                        <label for="inputNascimento" class="form-label">Nascimento</label>
                                        <input type="date" id="iNascimentoAlt" class="form-control" name="nascimento">
                                    </div>
                                    <div class="col-md-4 mb-3 px-2">
                                        <label for="inputTelefone" class="form-label">Telefone</label>
                                        <input type="text" id="iTelefoneAlt" class="form-control" name="telefone">
                                    </div>
                                    <div class="col-md-6 mb-3 px-2">
                                        <label for="inputEmail" class="form-label">E-mail</label>
                                        <input type="email" id="iEmailAlt" class="form-control" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btnSalvarAlt">
                                    Salvar Alterações
                                </button>
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

<div class="modal fade " id="modalUsuarioVerMais" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Administrador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="frmUsuarioVerMais" name="frmUsuarioVerMais" method="post" action="#">
                            <fieldset disabled>
                                <input type="hidden" id="idPessoaVerMais" class="form-control" name="idPessoa">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <input type="file" name="img" id="iImgVerMais" style="display: none;">
                                        <label for="iImgVerMais">
                                            <div id="imagemPreview">
                                                <img id="imgPreviewVerMais" src="user/img/semfoto.png"
                                                    alt="Preview da Imagem" style="max-width: 100%; height: 200px;">
                                            </div>
                                        </label>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="inputNome" class="form-label">Nome</label>
                                            <input type="text" id="iNomeVerMais" class="form-control" name="nome" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputSobrenome" class="form-label">Sobrenome</label>
                                            <input type="text" id="iSobrenomeVerMais" class="form-control" name="sobrenome">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputCPF" class="form-label">CPF</label>
                                            <input type="text" id="iCpfVerMais" class="form-control" name="cpf">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <div class="col-md-4 mb-3">
                                            <label for="inputNascimento" class="form-label">Gênero</label>
                                            <select class="form-select" aria-label="Default select example" name="genero" id="iGeneroVerMais">
                                                <option selected value="1">Masculino</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3 px-2">
                                            <label for="inputNascimento" class="form-label">Nascimento</label>
                                            <input type="date" id="iNascimentoVerMais" class="form-control" name="nascimento">
                                        </div>
                                        <div class="col-md-4 mb-3 px-2">
                                            <label for="inputTelefone" class="form-label">Telefone</label>
                                            <input type="text" id="iTelefoneVerMais" class="form-control" name="telefone">
                                        </div>
                                        <div class="col-md-6 mb-3 px-2">
                                            <label for="inputEmail" class="form-label">E-mail</label>
                                            <input type="email" id="iEmailVerMais" class="form-control" name="email">
                                        </div>
                                    </div>
                                </div>
                                
                            </fieldset>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
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

<script src="js/usuario.js"></script>
<script src="js/scriptcrato.js"></script>

<script>
    window.onload = function() {carregarDadosPaginacao('listarUsuario',1)};

    function configurarOnclickBotoes(controle, pagina){
        if(document.getElementById('btnSalvarAlt')){document.getElementById('btnSalvarAlt').onclick = function() {
                alterarGeral2('usuarioAlt','modalUsuarioAlt','frmUsuarioAlt',controle,pagina)}};
        if(document.getElementById('btnEnviar')){document.getElementById('btnEnviar').onclick = function() {
                addGeral2('frmUsuarioAdd','usuarioAdd','modalUsuariosAdd',controle,pagina)}};
                // addGeral("",'frmUsuarioAdd','usuarioAdd','modalUsuariosAdd')
        
        if(document.getElementById('iImg')){previewImg('iImg', 'imgPreview')}
        if(document.getElementById('iImgAlt')){previewImg('iImgAlt', 'imgPreviewAlt')}
    }

    mascaraCPF('inputCPF');
    mascaraCPF('iCpfAlt');
    mascaraTelefone('inputTelefone');
    mascaraTelefone('iTelefoneAlt');

</script>
