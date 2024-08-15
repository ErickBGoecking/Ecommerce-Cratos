<div class="pb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCadastro">Novo
        Produto</button>
</div>

<?php

$getPaginacao=1;
$limite = 10;

$link = $_PREFIXO . "adm";
$dados = listarGeral(
"p.idproduto, p.foto, p.produto, p.descricao,p.ativo,pv.altura, pv.largura,
pv.peso, pv.destaque,
e.idestoque, e.qtdatual, e.qtdvendido, e.vendaPrevia, e.custo, e.venda, e.lote, e.vencimento"
,
"produto p
INNER JOIN produtovariacao pv ON pv.idproduto = p.idproduto
INNER JOIN estoque e ON e.idprodutovariacao = pv.idprodutovariacao"
);

// $dados = listarLimitPaginacao('pessoa',$getPaginacao,$limite);
foreach ($dados as $row) {

    $foto = $row->foto;
    $ativo = $row->ativo;
    $produto = $row->produto;
    $descricao = $row->descricao;
    $estoque = $row->qtdatual;
    $vendaprevia = $row->vendaPrevia;
    $quantidadeVendido = $row->qtdvendido;
    $idBotaoAcoes = stringRandomica();
?>
<div class="card card-lista mt-2 border border-0 shadow-sm d-flex flex-row">
    <div class="card-body d-flex flex-column flex-md-row justify-content-between">
        <div><img src="<?=$_PREFIXO?>img/produto/<?php if(empty($foto)){echo "semfoto.png";}else{ echo $foto;}?>"
                class="rounded" style="width:50px;height:50px;">
        </div>
        <div>Produto: <strong><?php echo $produto?></strong></div>
        <div>Descrição: <strong><?php echo $descricao?></strong></div>
        <div>Estoque: <strong><?php echo $estoque?></strong></div>
        <div>Valor: <strong><?php echo $vendaprevia?></strong></div>
        <div>Quant./Vendas: <strong><?php echo $quantidadeVendido?></strong></div>
        <div class="d-flex gap-3">Ativo:
            <form action="<?php echo $_PREFIXO?>adm/produto/alterar" method="post">
                <?php 
                $btnAtivo = '<button class="btn btn-sm btn-outline-primary" type="submit">';
                if ($ativo == 'A') {
                    $btnAtivo.= '<span class="mdi mdi-lock-open-check text-success"></span>Ativo</button>';
                    $valorAtivo = 'D';
                } else {
                    $btnAtivo .= '<span class="mdi mdi-lock-check text-danger"></span> Desativado</button>';
                    $valorAtivo = 'A';
                }
                ?>
                <input type="text" name="produto_idproduto" value="<?php echo $row->idproduto ?>" class="d-none">
                <input type="text" name="produto_ativo" value="<?php echo $valorAtivo?>" class="d-none">
                <strong><?php echo $btnAtivo?></strong>
            </form>
        </div>
        <div>
            <button class="btn" onclick="menuAcoes(true,'<?php echo $idBotaoAcoes;?>')">
                <span class="mdi mdi-dots-vertical"></span>
            </button>
            <div id="<?php echo $idBotaoAcoes;?>" class="d-none botaoAcoes"
                style="position:absolute;top:0;right:0; z-index:999;">
                <div class="card">
                    <div class="d-flex justify-content-end p-2 bg-warning rounded-top">
                        <div>
                            <button class="btn btn-warning" onclick="menuAcoes(false,'<?php echo $idBotaoAcoes;?>')">
                                <span class="mdi mdi-close"></span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;"
                            data-bs-toggle="modal" data-bs-target="#modalAlt"
                            onclick="altCategoriaOnclick('<?php echo $idCategoria?>','<?php echo $categoria?>')">
                            Editar
                            <span class="mdi mdi-file-edit-outline"></span>
                        </button>
                        <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;"
                            onclick="excGeral2(<?php echo $row->idproduto ?>,'produtoExc','btnExcluir','listarProduto','1')">
                            Deletar
                            <span class="mdi mdi-delete-outline"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
}

include_once('pagina/painel/adm/pagina/produto/view/modalcadastro.php');
?>

<div aria-live="msgBox" aria-atomic="true" class="bg-body-secondary position-relative bd-example-toasts rounded-3">
    <div class="toast-container top-50 start-50 translate-middle p-3">
        <div id="msboxVerifica" class="toast " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-light">
                <strong class="me-auto">Deletar</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-danger text-light">
                Tem certeza que desaja escluir esse genero?
                <div class="mt-2 pt-2 border-top">
                    <div class="d-flex gap-3">
                        <a href="" id="btnConfirma"><button class="btn btn-danger btn-sm">Sim</button></a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="toast">Não</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
function menuAcoes(status, idObjeto) {
    let varMenuAcoes = document.getElementById(idObjeto)

    if (status) {
        let todosMenusAcoes = document.querySelectorAll('.botaoAcoes')
        todosMenusAcoes.forEach((elemento) => {
            elemento.classList.add("d-none");
        });
        varMenuAcoes.classList.remove("d-none");
    } else {
        varMenuAcoes.classList.add("d-none");
    }
}


function msgBoxConfirmacao($id) {
    const btnConfirma = document.getElementById('btnConfirma')
    btnConfirma.href = "<?= $_PREFIXO ?>adm/produto/delete/" + $id

    const toastMsboxVerificar = document.getElementById('msboxVerifica')
    const toast = bootstrap.Toast.getOrCreateInstance(toastMsboxVerificar)
    toast.show()
}
</script>

