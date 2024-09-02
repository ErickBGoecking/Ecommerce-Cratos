<?php
$busca = $controle[3];
$prefixoPasta = '../../img/produto/';
$produtos = listarGeral('
p.idproduto,p.produto,p.foto,p.descricao,p.ativo,
pv.idprodutovariacao, pv.altura, pv.largura,pv.peso, pv.destaque, pv.idtipovariacao,
e.idestoque, e.qtdatual, e.qtdvendido, e.custo, e.venda, e.vendapromocional, e.lote, e.vencimento
',"
produtovariacao pv
INNER JOIN produto p ON p.idproduto = pv.idproduto
INNER JOIN estoque e ON e.idprodutovariacao = pv.idprodutovariacao
where produto LIKE '%$busca%'

");
// AND qtdatual = 22
if($produtos){
$ultimoProduto = "";
foreach($produtos as $produto){
    if($ultimoProduto == $produto->idproduto){
    }else{
        if($ultimoProduto == ""){
            if(empty($produto->foto)){
                $prefixoPasta.= $produto->foto;
            }else{
                $prefixoPasta.= $produto->foto;
            }
            echo <<<EOT
                <div class="card mt-3">
                    <div class="card-body">   
                        <div class="order-0">
                            <img  src="$prefixoPasta" class="rounded" style="max-width:80px;max-height:80px;">
                        </div>
                        <div class="order-1" style="max-width:200px;">
                            Produto: <strong>$produto->produto</strong>
                        </div>
                EOT;
        }else{
            echo <<<EOT
                </div></div>
                <div class="card mt-3">
                    <div class="card-body">   
                        <div class="order-0">
                            <img  src="$prefixoPasta" class="rounded" style="max-width:80px;max-height:80px;">
                        </div>
                        <div class="order-1" style="max-width:200px;">
                            Produto: <strong>$produto->produto</strong>
                        </div>
                EOT;
        }


             

    }
    echo <<<EOT
            <div class="card p-2">
                Variacao: $produto->idtipovariacao | Estoque: $produto->qtdatual
            </div>
        EOT;
    
    $ultimoProduto = $produto->idproduto;
}}
echo '</div>';
echo '</div>';