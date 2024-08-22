<select name="" id="inputSelectVariacoes" class="form-select">
    <option value=""></option>
    <?php 
    $variacoes = listarGeral('idtipovariacao,pai,variacao','tipovariacao where pai = 0');
    foreach($variacoes as $variacao){
        echo '<option value="'.$variacao->idtipovariacao.'">'.$variacao->variacao.'</option>';
    }
    ?>
</select>