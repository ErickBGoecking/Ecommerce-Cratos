<?php
$busca = $controle[3];
$paginacao = $controle[4];
$filtros = $controle[5];

$filtroCondicao = "";

$filtros = explode(',',$filtros);

foreach($filtros as $filtro){
    switch($filtro){
        case 'estoqueAll':
            $filtroCondicao .= "";
            break;
        case 'estoqueEmEstoque':
            $filtroCondicao .= ' AND qtdatual > 0';
            break;
        case 'estoqueSemEstoque':
            $filtroCondicao .= ' AND qtdatual = 0';
            break;
        case 'precoTodos':
            $filtroCondicao .= '';
            break;
        case 'precoAbaixo100':
            $filtroCondicao .= ' AND venda < 100';
            break;
        case 'precoAcima100':
            $filtroCondicao .= ' AND venda > 100';
            break;
    }
}

$produtos = listarGeral('
p.idproduto,p.produto,p.foto,p.descricao,p.ativo,
pv.idprodutovariacao, pv.altura, pv.largura,pv.peso, pv.destaque, pv.idtipovariacao,
e.idestoque, e.qtdatual, e.qtdvendido, e.custo, e.venda, e.vendapromocional, e.lote, e.vencimento
',"
produtovariacao pv
INNER JOIN produto p ON p.idproduto = pv.idproduto
INNER JOIN estoque e ON e.idprodutovariacao = pv.idprodutovariacao
where produto LIKE '%$busca%'
$filtroCondicao
");
// AND qtdatual = 22
if($produtos){
$ultimoProduto = "";
foreach($produtos as $produto){
    
    $prefixoPasta = '../../img/produto/';
    if(empty($produto->foto)){
        $prefixoPasta.= $produto->foto;
    }else{
        $prefixoPasta.= $produto->foto;
    }

    if($ultimoProduto == $produto->idproduto){
    }else{
        if($ultimoProduto == ""){

            $idproduto = $produto->idproduto;

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
            
            $idBotaoAcoes = stringRandomica();

            echo <<<EOT
                <div class="card mt-3"  id="cardproduto$idproduto">
                    <div class="card-body d-flex justify-content-between"  id="inputsEdicaoEstoque">
                        <div class="d-flex order-0">
                            <div class="order-0">
                                <img src="$prefixoPasta" class="rounded" style="max-width:80px;max-height:80px;">
                            </div>
                            <div class="order-1" style="max-width:200px;">
                                Produto: <strong>$produto->produto</strong>
                            </div>
                        </div>
                        <div class="order-4 flex-reverse d-flex flex-row-reverse">
                            <div class="d-flex gap-3 order-md-3 order-2 justify-content-center" style="width:100px">
                                <strong>$btnAtivo</strong>
                            </div>
                            <div>
                                <div>
                                    <button class="btn" onclick="menuAcoes(true,'$idBotaoAcoes;')">
                                        <span class="mdi mdi-dots-vertical"></span>
                                    </button>
                                </div>
                                <div id="$idBotaoAcoes" class="d-none botaoAcoes" style="position:absolute;top:0;right:0; z-index:999;">
                                    <div class="card">
                                        <div class="d-flex justify-content-end p-2 bg-warning rounded-top">
                                            <div>
                                                <button class="btn btn-warning" onclick="menuAcoes(false,'$idBotaoAcoes;')">
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
                                            <button class="btn btn-light d-flex justify-content-between btnDelete"
                                                style="min-width:150px;" value="produto->idproduto">
                                                Deletar
                                                <span class="mdi mdi-delete-outline"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-2 flex-fill d-flex flex-column gap-2 align-items-center">
            EOT;
        }else{
            echo <<<EOT
                </div></div></div>
                <div class="card mt-3"  id="cardproduto$idproduto">
                    <div class="card-body d-flex justify-content-between"  id="inputsEdicaoEstoque">
                        <div class="d-flex order-0">
                            <div class="order-0">
                                <img src="$prefixoPasta" class="rounded" style="max-width:80px;max-height:80px;">
                            </div>
                            <div class="order-1" style="max-width:200px;">
                                Produto: <strong>$produto->produto</strong>
                            </div>
                        </div>
                        <div class="order-4 flex-reverse d-flex flex-row-reverse">
                            <div class="d-flex gap-3 order-md-3 order-2 justify-content-center" style="width:100px">
                                <strong>$btnAtivo</strong>
                            </div>
                            <div>
                                <div>
                                    <button class="btn" onclick="menuAcoes(true,'$idBotaoAcoes;')">
                                        <span class="mdi mdi-dots-vertical"></span>
                                    </button>
                                </div>
                                <div id="$idBotaoAcoes" class="d-none botaoAcoes" style="position:absolute;top:0;right:0; z-index:999;">
                                    <div class="card">
                                        <div class="d-flex justify-content-end p-2 bg-warning rounded-top">
                                            <div>
                                                <button class="btn btn-warning" onclick="menuAcoes(false,'$idBotaoAcoes;')">
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
                                            <button class="btn btn-light d-flex justify-content-between btnDelete"
                                                style="min-width:150px;" value="produto->idproduto">
                                                Deletar
                                                <span class="mdi mdi-delete-outline"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-2 flex-fill d-flex flex-column align-items-center">
            EOT;
        }
    }
    $labelVariacao = "";
    if($produto->idtipovariacao != ""){
        $tipovariacao = listarGeral('variacao',"tipovariacao where idtipovariacao in ($produto->idtipovariacao)");
        foreach($tipovariacao as $v){
            if($labelVariacao == ""){
                $labelVariacao = $v->variacao;
            }else{
                $labelVariacao .= " / " . $v->variacao;
            }
        }

    }
        
    echo <<<EOT
        <div class="card" style="max-width:520px;">
            <div class="card-body d-flex gap-3">
                <div class="d-flex flex-column">
                    Estoque:
                    <input type="text" class="form-control input-edicao" name="qtdatual"
                        id="$produto->idprodutovariacao" value="$produto->qtdatual" style="max-width:100px;">
                </div>
                <div class="d-flex flex-column">
                    Preço:
                    <input type="text" class="form-control input-preco" name="venda"
                        id="$produto->idprodutovariacao" value="R$ $produto->venda" style="max-width:100px;">
                </div>
                <div class="d-flex flex-column">
                    Preço Promo:
                    <input type="text" class="form-control input-precoPromo" name="vendapromocional"
                        id="$produto->idprodutovariacao" value="R$ $produto->vendapromocional"
                        style="max-width:100px;">
                </div>
                <strong>$labelVariacao</strong>
            </div>
        </div>
    EOT;
    
    $ultimoProduto = $produto->idproduto;
    }
}

echo '</div>';
echo '</div>';
echo '</div>';
