<?php 
include_once("dados.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$idCompra = 'compra'.$dados['idCompra'];

$db = db();
$compra = $db[$idCompra];

$dbMensagem = dbMensagem();
$mensagem = $dbMensagem[$idCompra];
?>

<div class="d-flex flex-column">
    <?php foreach($mensagem as $m){if($m['remetente']=="adm"){?>

    <div class="d-flex justify-content-start">
        <div class="d-flex flex-column bg-secondary-subtle p-2 rounded-2 mt-2">
            <p><?php echo $m['mensagem']?></p>
            <div class="d-flex justify-content-end text-secondary" style="font-size:smaller;margin-top:-20px;">
            </div>
        </div>
        
        <p><?php echo $m['hora']?></p>
    </div>

    <?php }else{?>

    <div class="d-flex justify-content-end">
        <div class="bg-primary-subtle p-2 rounded-2 mt-2">
            <p><?php echo $m['mensagem']?></p>
            <div class="d-flex justify-content-end text-secondary" style="font-size:smaller;margin-top:-20px;">
                <p><?php echo $m['hora']?></p>
            </div>
        </div>
    </div>
    <?php };};?>

</div>