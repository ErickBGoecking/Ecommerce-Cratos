<?php 
$id = $controle[3];
$Subvariacoes = listarGeral('idtipovariacao,pai,variacao',"tipovariacao where pai = $id");
$pai = listarGeral('idtipovariacao,variacao',"tipovariacao where idtipovariacao = $id");
$nomePai = $pai[0]->variacao;
foreach($Subvariacoes as $Subvariacao){
    $titulo = $Subvariacao->variacao;
    $idTitulo = $Subvariacao->idtipovariacao;
    $elemento = <<<EOT
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" name="$nomePai-$idTitulo-$titulo" checked>
        <label class="form-check-label">$titulo</label>
    </div>
    EOT;
    echo $elemento;
}
?>