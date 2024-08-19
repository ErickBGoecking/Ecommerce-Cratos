<div class="container p-3">
    <h2>Notificações</h2>
</div>
<div class="container d-flex flex-column align-items-center gap-2">
    <?php 
    $idsis = $_SESSION['idsis'];
    $notificacoes = listarGeral('idnotificacao,notificacao,link,data',"notificacao where idpessoa = 0 OR idpessoa = $idsis");
    foreach($notificacoes as $notificacao){
    ?>
    <div class="card col-6">
        <div class="card-body d-flex justify-content-between pb-0">
            <p><?= $notificacao->notificacao?></p>
            <div class="d-flex gap-2">
                <p><?= $notificacao->data?></p>
                <a
                    href="<?=$_PREFIXO?>adm/notificacoes/delete/notificacao_<?php echo base64_encode($notificacao->idnotificacao)?>"><button
                        type="button" class="btn-close" aria-label="Close"></button></a>
            </div>
        </div>
    </div>
    <?php }?>
    <a href="<?=$_PREFIXO?>adm/notificacoes/delete/all"><button class="btn btn-primary">Limpar Todas</button></a>
</div>