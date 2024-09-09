<?php
    $_PREFIXO = "../../../../";
    $produtos = listarGeral('p.idproduto, p.produto,p.ativo, MIN(f.foto) AS foto',"
    produtovariacao pv
    INNER JOIN produto p ON p.idproduto = pv.idproduto
    INNER JOIN fotoproduto f ON f.idprodutovariacao = pv.idprodutovariacao
    GROUP BY p.idproduto, p.produto");
    foreach($produtos as $produto){
        $idproduto = $produto->idproduto;
        $link = $_PREFIXO . "adm";
        // $foto = "";
        $foto = $produto->foto;
        $variacao = listarGeral(
        "pv.idprodutovariacao, pv.altura, pv.largura,pv.peso, pv.destaque, pv.idtipovariacao,
        e.idestoque, e.qtdatual, e.qtdvendido, e.custo, e.venda, e.vendapromocional, e.lote, e.vencimento"
        ,
        "produtovariacao pv 
        INNER JOIN estoque e ON e.idprodutovariacao = pv.idprodutovariacao
        where idproduto = $idproduto
        "
    );
    ?>

<div class="card card-lista mt-2 border border-0 shadow-sm d-flex flex-row" id="cardproduto<?=$idproduto?>">
    <div class="card-body d-flex flex-column flex-md-row justify-content-between gap-3" id="inputsEdicaoEstoque">
        <div class="order-0"><a href="<?= $_PREFIXO?>adm/produtos/editar/<?php echo base64_encode($produto->idproduto);?>"><img
                src="<?=$_PREFIXO?>img/produto/<?php if(empty($foto)){echo "semfoto.png";}else{ echo $foto;}?>"
                class="rounded" style="max-width:80px;max-height:80px;"></a>
            </div>
        <div class="order-1" style="max-width:200px;">
            Produto: <a href="<?= $_PREFIXO?>adm/produtos/editar/<?php echo base64_encode($produto->idproduto);?>"><strong><?php echo $produto->produto ?></strong></a>
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
                <div class="card-body d-flex justify-content-between align-items-end gap-3" id="inputsEdicao">
                    <div class="d-flex flex-column">
                        Estoque:
                        <input type="text" class="form-control input-edicao" name="qtdatual"
                            id="<?=$row->idprodutovariacao?>" value="<?php echo $estoque?>" style="max-width:100px;">
                    </div>
                    <div class="d-flex flex-column">
                        Preço:
                        <input type="text" class="form-control input-preco" name="venda"
                            id="<?=$row->idprodutovariacao?>" value="R$ <?php echo $preco?>" style="max-width:100px;">
                    </div>
                    <div class="d-flex flex-column">
                        Preço Promo:
                        <input type="text" class="form-control input-precoPromo" name="vendapromocional"
                            id="<?=$row->idprodutovariacao?>" value="R$ <?php echo $precopromocional?>"
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
            </div>
            <?php 
            }
            ?>
        </div>
        <div class="d-flex gap-3 order-md-3 order-2 justify-content-center" style="width:100px">
            <?php 
                $ativo = $produto->ativo;
                if ($ativo == 'A') {
                    $btnAtivo = '<button class="btn btnAtivo text-success btn-outline-success d-flex gap-2 align-items-center" type="button" value="'. $idproduto .'">';
                    $btnAtivo.= '<span class="mdi mdi-lock-open-check"></span>Ativo</button>';
                    $valorAtivo = 'D';
                } else {
                    $btnAtivo = '<button class="btn btnAtivo text-danger btn-outline-danger d-flex gap-2 align-items-center" type="button" value="'. $idproduto .'">';
                    $btnAtivo .= '<span class="mdi mdi-lock-check"></span> Desativado</button>';
                    $valorAtivo = 'A';
                }
                ?>
            <strong><?php echo $btnAtivo?></strong>
        </div>
        <div class=" order-md-4 order-3">
            <button class="btn" onclick="menuAcoes(true,'<?php echo $idBotaoAcoes;?>')">
                <span class="mdi mdi-dots-vertical"></span>
            </button>
            <div id="<?php echo $idBotaoAcoes;?>" class="d-none botaoAcoes"
                style="position:absolute;top:0;right:0; z-index:999;">
                <div class="card">
                    <div class="d-flex justify-content-end p-2 bg-warning rounded-top">
                        <div>
                            <button class="btn btn-warning" onclick="menuAcoes(false,'<?php echo $idBotaoAcoes;?>')">
                                <span class="mdi mdi-close"></span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;"
                            data-bs-toggle="modal" data-bs-target="#modalAlt">
                            Editar
                            <span class="mdi mdi-file-edit-outline"></span>
                        </button>
                        <button class="btn btn-light d-flex justify-content-between btnDelete" style="min-width:150px;"
                            value="<?php echo $idproduto ?>">
                            Deletar
                            <span class="mdi mdi-delete-outline"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
}
?>