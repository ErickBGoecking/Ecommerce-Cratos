<?php
include_once("dados.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$idCompra = 'compra'.$dados['idCompra'];

$db = db();
$compra = $db[$idCompra];

$dbMensagem = dbMensagem();
$mensagem = $dbMensagem[$idCompra];

?>


<div class="container pb-3">
    <div class="card-body d-flex align-items-center justify-content-between">
        <h3><?php echo $compra['produto'] ?></h3>
        <img src="../img/<?php echo $compra['fotoProduto'] ?>" alt="" style="width:100px;">
    </div>
</div>



<div class="card border border-0 shadow-sm">
    <div class="card-body">


        <div class="d-flex flex-column">
            <?php foreach($mensagem as $m){if($m['remetente']=="adm"){?>

            <div class="d-flex justify-content-start">
                <div>
                    <div class="d-flex flex-column bg-secondary-subtle p-2 rounded-2 mt-2">
                        <p><?php echo $m['mensagem']?></p>
                        <div class="d-flex justify-content-end text-secondary"
                            style="font-size:smaller;margin-top:-20px;">
                        </div>
                    </div>
                    <p><?php echo $m['hora']?></p>
                </div>
            </div>

            <?php }else{?>

            <div class="d-flex justify-content-end">
                <div class="d-flex flex-column justify-content-end align-items-end">
                    <div class="bg-primary-subtle p-2 rounded-2 mt-2">
                        <p><?php echo $m['mensagem']?></p>
                        <div class="d-flex justify-content-end text-secondary"
                            style="font-size:smaller;margin-top:-20px;">
                        </div>
                    </div>
                    <p><?php echo $m['hora']?></p>
                </div>
            </div>

            <?php };};?>
        </div>
        <div class="hstack gap-3 mt-3">
            <input class="form-control me-auto" type="text" placeholder="Escreva sua mensagem aqui..."
                aria-label="Escreva sua mensagem aqui...">
            <button type="button" class="btn btn-primary">Enviar</button>
            <div class="vr"></div>
        </div>

    </div>
</div>