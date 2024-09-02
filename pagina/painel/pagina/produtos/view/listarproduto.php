<style>
.btnAtivo:hover {
    color: aliceblue !important;
}
</style>

<div class="container">
    <h5>Produtos / Lista de Produtos:</h5>
    <div class="d-flex justify-content-between gap-3">
        <div class="flex-fill d-flex align-items-center justify-content-center">
            <div>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control flex-fill" id="inputBusca"
                        style="min-width:340px;max-width:500px;">
                    <button class="btn btn-primary" onclick="buscar()">Busca</button>
                    <button class="btn btn-outline-secondary d-flex" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <span class="mdi mdi-filter-outline"></span>
                        Filtro
                    </button>
                </div>
                <div class="card border border-0 shadow d-none"
                    style="position:absolute;min-width:340px;max-width:500px;z-index:999;" id="boxBuscaRapida">
                    <div class="list-group list-group-flush" id="boxBuscaRapidaConteudo">

                    </div>
                </div>
            </div>
        </div>
        <div class="pb-3 d-flex justify-content-between">
            <a href="<?= $_PREFIXO?>adm/produtos/cadastro">
                <button type="button" class="btn btn-primary">Novo
                    Produto</button>
            </a>
        </div>
    </div>
    <div id="conteudoLista">
        <!-- CONTEÚDO -->
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <h5>Estoque</h5>
            <div class="d-flex gap-3">
                <input type="radio" class="btn-check" name="filtro-estoque" id="filtro-estoque1" autocomplete="off" checked>
                <label class="btn btn-outline-secondary" for="filtro-estoque1">Todos</label>

                <input type="radio" class="btn-check" name="filtro-estoque" id="filtro-estoque2" autocomplete="off">
                <label class="btn btn-outline-secondary" for="filtro-estoque2">Em estoque</label>

                <input type="radio" class="btn-check" name="filtro-estoque" id="filtro-estoque3" autocomplete="off">
                <label class="btn btn-outline-secondary" for="filtro-estoque3">Fora de estoque</label>
            </div>
        </div>
    </div>
</div>


<script src="<?=$_PREFIXO?>source/js/adm/produtos/pg-listaprodutos.js"></script>
<script>
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
</script>