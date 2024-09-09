<?php

// include_once('../../../../../source/funcoes/funcoes.php');
$busca = $controle[3];
$_PREFIXO = "../../../../";
$produtos = listarGeral('p.idproduto, p.produto, MIN(f.foto) AS foto',"
produtovariacao pv
INNER JOIN produto p ON p.idproduto = pv.idproduto
INNER JOIN fotoproduto f ON f.idprodutovariacao = pv.idprodutovariacao
WHERE p.produto LIKE '%$busca%'
GROUP BY p.idproduto, p.produto
LIMIT 5");
if($produtos > 0){
    foreach($produtos as $produto){
        $idproduto = $produto->idproduto;
        $foto = $produto->foto;
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