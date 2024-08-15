<?php include_once 'mensagem.php';?>
<style>
.card-lista:hover {
    background-color: ghostwhite;
}
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="adm.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="?pagina=administrador">Produtos</a></li>
        <!--        <li class="breadcrumb-item active" aria-current="page">Data</li>-->
    </ol>
</nav>
<div class="container-fuid d-flex justify-content-between pt-3 pb-3">
    <h5>Produtos</h5>
    <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalAdd"
        onclick="limparCadastroUsuario()">Cadastrar
    </button>
</div>

<div id="conteudo">

</div>

<div class="modal fade " id="modalAdd" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form method="post" id="frmAdd">
                            <div class="col-md-6">
                                <input type="file" name="produto_foto_s" id="">
                                <div class="mb-3">
                                    <label for="inputNome" class="form-label">Produto</label>
                                    <input type="text" id="inputNome" class="form-control" name="produto_produto_s">
                                </div>
                                <div class="mb-3">
                                    <label for="inputSobrenome" class="form-label">Descrição</label>
                                    <input type="text" id="inputSobrenome" class="form-control"
                                        name="produto_descricao_s">
                                </div>
                                    <select class="form-select" aria-label="Default select example" name="produto_iddepartamento_s">
                                        <option selected></option>
                                        <?php 
                                        $departamentos = listarGeral('*', 'departamento');
                                        foreach($departamentos as $departamento){
                                            echo "<option value='" . $departamento->IdDepartamento . "'>".$departamento->Departamento."</option>";
                                        };
                                        ?>
                                    </select>
                                <div class="d-flex flex-wrap gap-3 justify-content-between mt-3 mb-3">
                                    <div class="col-2">
                                        <label for="inputSobrenome" class="form-label">Altura</label>
                                        <input type="text" id="inputSobrenome" class="form-control"
                                            name="produtovariacao_altura_s">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputSobrenome" class="form-label">Largura</label>
                                        <input type="text" id="inputSobrenome" class="form-control"
                                            name="produtovariacao_largura_s">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputSobrenome" class="form-label">Peso</label>
                                        <input type="text" id="inputSobrenome" class="form-control"
                                            name="produtovariacao_peso_s">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputSobrenome" class="form-label">Destaque</label>
                                        <input type="text" id="inputSobrenome" class="form-control"
                                            name="produtovariacao_destaque_s">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputSobrenome" class="form-label">Quatidade Atual</label>
                                        <input type="text" id="inputSobrenome" class="form-control"
                                            name="estoque_qtdatual_s">
                                    </div>
                                    <div class="col-3">
                                        <label for="inputSobrenome" class="form-label">Quatidade Vendido</label>
                                        <input type="text" id="inputSobrenome" class="form-control"
                                            name="estoque_qtdvendido_s">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputSobrenome" class="form-label">Custo</label>
                                        <input type="text" id="inputSobrenome" class="form-control"
                                            name="estoque_custo_s">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputSobrenome" class="form-label">Venda</label>
                                        <input type="text" id="inputSobrenome" class="form-control"
                                            name="estoque_venda_s">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputSobrenome" class="form-label">Lote</label>
                                        <input type="text" id="inputSobrenome" class="form-control"
                                            name="estoque_lote_s">
                                    </div>
                                    <div class="col-2">
                                        <label for="inputSobrenome" class="form-label">Vencimento</label>
                                        <input type="text" id="inputSobrenome" class="form-control"
                                            name="estoque_vencimento_s">
                                    </div>
                                </div>

                                <div class="float-end">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fechar</button>
                                    <button class="btn btn-primary" type="button" value="Cadastrar" id="btnCadastrar">Cadastrar</button>
                                </div>
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
                                    <input type="file" name="Foto" id="iImgAlt" style="display: none;">
                                    <label for="iImgAlt" style="cursor: pointer;">
                                        <div id="imagemPreview">
                                            <img id="imgPreviewAlt" src="user/img/semfoto.png" alt="Preview da Imagem"
                                                style="max-width: 100%; height: 200px;">
                                        </div>
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="inputNome" class="form-label">Nome</label>
                                        <input type="text" id="iNomeAlt" class="form-control" name="Nome">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputSobrenome" class="form-label">Sobrenome</label>
                                        <input type="text" id="iSobrenomeAlt" class="form-control" name="Sobrenome">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputCPF" class="form-label">CPF</label>
                                        <input type="text" id="iCpfAlt" class="form-control" name="Cpf">
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap">
                                    <div class="col-md-4 mb-3">
                                        <label for="inputNascimento" class="form-label">Gênero</label>
                                        <select class="form-select" aria-label="Default select example" name="IdGenero"
                                            id="iGeneroAlt">
                                            <option selected value="1">Masculino</option>

                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3 px-2">
                                        <label for="inputNascimento" class="form-label">Nascimento</label>
                                        <input type="date" id="iNascimentoAlt" class="form-control" name="Nascimento">
                                    </div>
                                    <div class="col-md-4 mb-3 px-2">
                                        <label for="inputTelefone" class="form-label">Telefone</label>
                                        <input type="text" id="iTelefoneAlt" class="form-control" name="Telefone">
                                    </div>
                                    <div class="col-md-6 mb-3 px-2">
                                        <label for="inputEmail" class="form-label">E-mail</label>
                                        <input type="email" id="iEmailAlt" class="form-control" name="Email">
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
                                            <input type="text" id="iNomeVerMais" class="form-control" name="nome">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputSobrenome" class="form-label">Sobrenome</label>
                                            <input type="text" id="iSobrenomeVerMais" class="form-control"
                                                name="sobrenome">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputCPF" class="form-label">CPF</label>
                                            <input type="text" id="iCpfVerMais" class="form-control" name="cpf">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <div class="col-md-4 mb-3">
                                            <label for="inputNascimento" class="form-label">Gênero</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="genero" id="iGeneroVerMais">
                                                <option selected value="1">Masculino</option>

                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3 px-2">
                                            <label for="inputNascimento" class="form-label">Nascimento</label>
                                            <input type="date" id="iNascimentoVerMais" class="form-control"
                                                name="nascimento">
                                        </div>
                                        <div class="col-md-4 mb-3 px-2">
                                            <label for="inputTelefone" class="form-label">Telefone</label>
                                            <input type="text" id="iTelefoneVerMais" class="form-control"
                                                name="telefone">
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
window.onload = function() {
    carregarDadosPaginacao('listarProduto', 1)
};

function configurarOnclickBotoes(controle, pagina) {
    if (document.getElementById('btnSalvarAlt')) {
        document.getElementById('btnSalvarAlt').onclick = function() {
            alterarGeral2('usuarioAlt', 'modalUsuarioAlt', 'frmUsuarioAlt', controle, pagina)
        }
    };
    if (document.getElementById('btnCadastrar')) {
        document.getElementById('btnCadastrar').onclick = function() {
            addGeral2('frmAdd', 'produtoAdd', 'modalAdd', controle, pagina)
        }
    };
    // addGeral("",'frmAdd','produtoAdd','modalAdd')

    if (document.getElementById('iImg')) {
        previewImg('iImg', 'imgPreview')
    }
    if (document.getElementById('iImgAlt')) {
        previewImg('iImgAlt', 'imgPreviewAlt')
    }
}

// document.getElementById('inputCPF').addEventListener('input', function() {
// document.getElementById('inputSenha').value = this.value;});

function limparCadastroUsuario() {
    document.getElementById('iImg').value = "";
    document.getElementById('imgPreview').src = "./banner/img/sem-imagem.png";
    document.getElementById('inputNome').value = "";
    document.getElementById('inputSobrenome').value = "";
    document.getElementById('inputCPF').value = "";
    document.getElementById('inputNascimento').value = "";
    document.getElementById('inputGenero').value = "";
    document.getElementById('inputTelefone').value = "";
    document.getElementById('inputEmail').value = "";
    document.getElementById('inputSenha').value = "";
}

// mascaraCPF('inputCPF');
// mascaraCPF('iCpfAlt');
// mascaraTelefone('inputTelefone');
// mascaraTelefone('iTelefoneAlt');


function menuAcoes(status, idObjeto) {
    let varMenuAcoes = document.getElementById(idObjeto)

    if (status) {
        let todosMenusAcoes = document.querySelectorAll('.botaoAcoes')
        todosMenusAcoes.forEach((elemento) => {
            elemento.classList.add("d-none");
        });
        varMenuAcoes.classList.remove("d-none");
    } else {
        varMenuAcoes.classList.add("d-none");
    }
}

function addSubCategoriaOnclick(idPai) {
    limparCadastro()
    document.getElementById('inputPaiSubCategoria').value = idPai;
}

function altCategoriaOnclick(idCategoria, categoria) {
    document.getElementById('inputAltCategoria').value = categoria;
    document.getElementById('inputAltId').value = idCategoria;
}
</script>