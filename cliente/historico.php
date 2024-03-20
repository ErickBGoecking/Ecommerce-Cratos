<?php 
include_once("dados.php");

$info = dados();
?>


<div class="container-fluid pt-5 d-flex flex-column gap-3">
    <h3>Histórico</h3>

    <?php 
                foreach($info as $compra){

                ?>
    <div class="card border border-0 shadow-sm">
        <div class="card-body">
            <div class="border-bottom">
                <p><?php echo $compra['dataCompra'] ?></p>
            </div>
            <div class="d-flex flex-column flex-md-row v-100 gap-2 gap-md-0 ">
                <div class="p-2 d-flex justify-content-center align-items-center">
                    <img src="../img/<?php echo $compra['fotoProduto'] ?>" alt="" style="width:100px; height:100px;">
                </div>
                <div class="flex-fill p-2 d-flex flex-column">
                    <span class="text-success"><strong><?php echo $compra['status'] ?></strong></span>
                    <h3><?php echo $compra['dataEntrega'] ?></h3>
                    <p><?php echo $compra['produto'] ?></p>
                    <p><strong><?php echo $compra['quantidade'] ?></strong></p>
                </div>
                <div class="d-flex flex-column p-2 justify-content-center">
                    <button class="btn btn-light"
                        onclick="modalVerMais('modalVerMais',<?php echo $compra['idCompra'];?>,'mensagem')"><span
                            class="mdi mdi-email"><span class="p-2"></span>Mensagens</span></button>
                </div>
                <div class="d-flex flex-column gap-2 p-2 justify-content-center">
                    <button class="btn btn-primary"
                        onclick="modalVerMais('modalVerMais',<?php echo $compra['idCompra'];?>,'saibaMais')">Ver
                        compra</button>
                    <button class="btn btn-secondary">Comprar Novamente</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<div class="modal fade" id="modalVerMais" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Compra Efetuada</h1> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-body-tertiary">
                <div id="conteudoModal"></div>
            </div>
        </div>
    </div>
</div>
<script>
function modalVerMais(modalId, idCompra, rota) {

    const conteudo = document.getElementById('conteudoModal');
    var pagina = "";

    switch (rota) {
        case "mensagem":
            pagina = 'mensagem-produto.php';
            break;
        case "saibaMais":
            pagina = "verConteudoCompra.php"
            break;
    }

    fetch(pagina, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'idCompra=' + encodeURIComponent(idCompra),
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            conteudo.innerHTML = data;
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });

    const nomeModal = new bootstrap.Modal(document.getElementById(modalId));
    nomeModal.show();
}
</script>