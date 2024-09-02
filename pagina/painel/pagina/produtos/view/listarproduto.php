<style>
.btnAtivo:hover {
    color: aliceblue !important;
}
</style>

<div class="container">
<<<<<<< HEAD
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
=======
    <div class="pb-3 d-flex justify-content-between">
        <h5>Produtos / Lista de Produtos:</h5>
        <a href="<?= $_PREFIXO?>adm/produtos/cadastro">
            <button type="button" class="btn btn-primary">Novo
                Produto</button>
        </a>
    </div>
    <?php
    $produtos = listarGeral('idproduto,produto,foto,descricao,ativo','produto');
    foreach($produtos as $produto){
        $idproduto = $produto->idproduto;
        $link = $_PREFIXO . "adm";
        $foto = $produto->foto;
        $variacao = listarGeral(
        "pv.altura, pv.largura,pv.peso, pv.destaque, pv.idtipovariacao,
        e.idestoque, e.qtdatual, e.qtdvendido, e.custo, e.venda, e.vendapromocional, e.lote, e.vencimento"
        ,
        "produtovariacao pv 
        INNER JOIN estoque e ON e.idprodutovariacao = pv.idprodutovariacao
        where idproduto = $idproduto
        "
    );
    ?>

    <div class="card card-lista mt-2 border border-0 shadow-sm d-flex flex-row">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between gap-3">
            <div class="order-0"><img
                    src="<?=$_PREFIXO?>img/produto/<?php if(empty($foto)){echo "semfoto.png";}else{ echo $foto;}?>"
                    class="rounded" style="max-width:80px;max-height:80px;"></div>
            <div class="order-1" style="max-width:200px;">Produto: <strong><?php echo $produto->produto ?></strong>
            </div>
            <!-- <div>Descrição: <strong><?php echo $descricao?></strong></div> -->
            <div class="order-md-3 order-4 d-flex flex-column flex-fill gap-2 align-items-center">
                <?php 
            foreach ($variacao as $row) {
                $idtipovariacao = $row->idtipovariacao;
                // $idtipovariacao = explode(',',$idtipovariacao);
                $estoque = $row->qtdatual;
                $preco = $row->venda;
                $precopromocional = $row->vendapromocional;
                $idBotaoAcoes = stringRandomica();
            ?>
                <div class="card" style="max-width:500px;">
                    <div class="card-body d-flex justify-content-between align-items-end gap-3">
                        <div class="d-flex flex-column">
                            Estoque:
                            <input type="text" class="form-control" value="<?php echo $estoque?>"
                                style="max-width:100px;">
                        </div>
                        <div class="d-flex flex-column">
                            Preço:
                            <input type="text" class="form-control" value="<?php echo $preco?>"
                                style="max-width:100px;">
                        </div>
                        <div class="d-flex flex-column">
                            Preço Promo:
                            <input type="text" class="form-control" value="<?php echo $precopromocional?>"
                                style="max-width:100px;">
                        </div>
                        <div>
                            <h5>
                                <?php 
                                if($idtipovariacao!=""){
                                    $labelVariacao = "";
                                    $tipovariacao = listarGeral('variacao',"tipovariacao where idtipovariacao in ($idtipovariacao)");
                                    foreach($tipovariacao as $v){
                                        if($labelVariacao == ""){
                                            $labelVariacao = $v->variacao;
                                        }else{
                                            $labelVariacao .= " / " . $v->variacao;
                                        }
                                    }

                                    echo $labelVariacao;
                                }else{
                                    echo "Sem variação";
                                }
                                ?>
                            </h5>
                        </div>
                    </div>
>>>>>>> b287a15391691e3e60d3d97594a4919429ec3b2d
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