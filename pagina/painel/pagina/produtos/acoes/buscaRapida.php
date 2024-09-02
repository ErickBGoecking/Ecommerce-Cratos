<?php

// include_once('../../../../../source/funcoes/funcoes.php');
// $busca = 'fdfsdfsdfds';
$busca = $controle[3];
$_PREFIXO = "../../../../";
$produtos = listarGeral('idproduto,produto,foto,descricao,ativo',"produto where produto LIKE '%$busca%' LIMIT 5");
if($produtos > 0){
    foreach($produtos as $produto){
        $idproduto = $produto->idproduto;
        $link = $_PREFIXO . "adm";
        $foto = $produto->foto;
    //     $variacao = listarGeral(
    //     "pv.idprodutovariacao, pv.altura, pv.largura,pv.peso, pv.destaque, pv.idtipovariacao,
    //     e.idestoque, e.qtdatual, e.qtdvendido, e.custo, e.venda, e.vendapromocional, e.lote, e.vencimento"
    //     ,
    //     "produtovariacao pv 
    //     INNER JOIN estoque e ON e.idprodutovariacao = pv.idprodutovariacao
    //     where idproduto = $idproduto
    //     "
    // );
?>

<a class="list-group-item list-group-item-action">
    <img src="../../img/produto/product01.jpg<?=$_PREFIXO?>img/produto/<?php if(empty($foto)){echo "semfoto.png";}else{ echo $foto;}?>"
        style="max-width:30px;max-height:30px;">
    <strong class="text-truncate"><?php echo $produto->produto ?></strong>
</a>

<?php 
}}else{
?>
<div class="container-fluid text-center">
...
</div>
<?php }?>