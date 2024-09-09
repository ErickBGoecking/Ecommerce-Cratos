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
                        <span class="mdi mdi-tune"></span>
                        <span class="ps-2">Filtro</span>
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
        <h5 class="offcanvas-title" id="offcanvasRightLabel"><span class="mdi mdi-tune"></span><span class="px-2">Filtros</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column gap-3">
        <div>
            <h5>Estoque</h5>
            <div class="d-flex gap-3">
                <input type="radio" class="btn-check" name="estoque" id="estoqueAll" autocomplete="off" checked>
                <label class="btn btn-outline-secondary" for="estoqueAll">Todos</label>

                <input type="radio" class="btn-check" name="estoque" id="estoqueEmEstoque" autocomplete="off">
                <label class="btn btn-outline-secondary" for="estoqueEmEstoque">Em Estoque</label>

                <input type="radio" class="btn-check" name="estoque" id="estoqueSemEstoque" autocomplete="off">
                <label class="btn btn-outline-secondary" for="estoqueSemEstoque">Sem Estoque</label>
            </div>
        </div>
        <div>
            <h5>Preço</h5>
            <div class="d-flex gap-3">
                <input type="radio" class="btn-check" name="preco" id="precoTodos" autocomplete="off" checked>
                <label class="btn btn-outline-secondary" for="precoTodos">Todos</label>

                <input type="radio" class="btn-check" name="preco" id="precoAbaixo100" autocomplete="off">
                <label class="btn btn-outline-secondary" for="precoAbaixo100">Abaixo de 100</label>

                <input type="radio" class="btn-check" name="preco" id="precoAcima100" autocomplete="off">
                <label class="btn btn-outline-secondary" for="precoAcima100">Acima de 100</label>
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