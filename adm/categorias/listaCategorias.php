<?php include_once 'mensagem.php';?>
<style>
.card-lista:hover {
    background-color: ghostwhite;
}
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="adm.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="?pagina=administrador">Categorias</a></li>
        <!--        <li class="breadcrumb-item active" aria-current="page">Data</li>-->
    </ol>
</nav>
<div class="container-fuid d-flex justify-content-between pt-3 pb-3">
    <h5>Categorias</h5>
    <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalAdd"
        onclick="limparCadastro()">Nova Categoria
    </button>
</div>

<div id="conteudo">

</div>


<div class="modal fade " id="modalAdd" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nova Categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="frmCategoriaAdd" name="frmCategoriaAdd" method="post" action="#">

                            <div class="row">
                                <div class="mb-3">
                                    <label for="inputNome" class="form-label">Categoria</label>
                                    <input type="text" id="inputCategoria" class="form-control" name="Categoria">
                                    <input type="text" id="inputPai" class="form-control d-none" name="IdPai">
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btnEnviar">
                                    Cadastrar
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
<div class="modal fade " id="modalAddSub" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nova Sub-Categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="frmCategoriaSubAdd" name="frmCategoriaSubAdd" method="post" action="#">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="inputNome" class="form-label">Categoria</label>
                                    <input type="text" id="inputSubCategoria" class="form-control" name="Categoria">
                                    <input type="text" id="inputPaiSubCategoria" class="form-control d-none" name="IdPai" value="0">
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" id="btnEnviarSub">
                                    Cadastrar
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

<div class="modal fade " id="modalAlt" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: var(--cor-principal)">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar Categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="frmCategoriaAlt" name="frmCategoriaAlt" method="post" action="#">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="inputNome" class="form-label">Categoria</label>
                                    <input type="text" id="inputAltCategoria" class="form-control" name="Categoria">
                                    <input type="text" id="inputAltId" class="form-control d-none" name="idCategoria">
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


<script src="js/usuario.js"></script>
<script src="js/scriptcrato.js"></script>

<script>
window.onload = function() {
    carregarDadosPaginacao('listarCategorias', 1)
};

function configurarOnclickBotoes(controle, pagina){
    if (document.getElementById('btnSalvarAlt')) {
        document.getElementById('btnSalvarAlt').onclick = function() {
            alterarGeral2('categoriaAlt','modalAlt','frmCategoriaAlt',controle,pagina)
        }
    }
    if (document.getElementById('btnEnviar')) {
        document.getElementById('btnEnviar').onclick = function() {
            addGeral2('frmCategoriaAdd', 'categoriaAdd', 'modalAdd', controle, pagina)
        }
    };
    if (document.getElementById('btnEnviarSub')) {
        document.getElementById('btnEnviarSub').onclick = function() {
            addGeral2('frmCategoriaSubAdd', 'categoriaAdd', 'modalAddSub', controle, pagina)
        }
    };

}

function limparCadastro(){
    document.getElementById('inputCategoria').value = "";
    document.getElementById('inputSubCategoria').value = "";
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

function addSubCategoriaOnclick(idPai){
    limparCadastro()
    document.getElementById('inputPaiSubCategoria').value = idPai;
}
function altCategoriaOnclick(idCategoria,categoria){
    document.getElementById('inputAltCategoria').value = categoria;
    document.getElementById('inputAltId').value = idCategoria;
}
</script>