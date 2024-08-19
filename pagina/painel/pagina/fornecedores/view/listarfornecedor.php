<div class="pb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCadastro">Novo
        Fornecedor</button>
</div>

<?php
$link = $_PREFIXO."adm";
$info = <<<EOT

<div class="card border border-0 shadow mb-3 p-1 px-3">
    <div class="card-body p-1">
        <div class="d-flex justify-content-between">
            <h4 class="card-title">@val="pessoa_nome"</h4>
            <div>
                <button class="btn" onclick="menuAcoes(true,'@val="fornecedor_idfornecedor"')">
                    <span class="mdi mdi-dots-vertical"></span>
                </button>
                <div id="@val="fornecedor_idfornecedor"" class="d-none botaoAcoes"
                    style="position:absolute;top:0;right:0; z-index:999;">
                    <div class="card">
                        <div class="d-flex justify-content-end p-2 bg-warning rounded-top">
                            <div>
                                <button class="btn btn-warning"
                                    onclick="menuAcoes(false,'@val="fornecedor_idfornecedor"')">
                                    <span class="mdi mdi-close"></span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <a href="$link/fornecedor/editar/@val="pessoa_idpessoa"">
                                <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;">
                                    Editar
                                    <span class="mdi mdi-file-edit-outline"></span>
                                </button>
                            </a>
                            <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;"
                                onclick="msgBoxConfirmacao('fornecedor_@val="fornecedor_idfornecedor"')">
                                Deletar
                                <span class="mdi mdi-delete-outline"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-warp justify-content-between">
            <p class="card-text"><strong>Razão Social:</strong><br>@val="pessoa_sobrenome"</p>
            <p><strong>Telefone:</strong><br>@val="pessoa_telefone"</p>
            <p><strong>CNPJ:</strong><br>@val="pessoa_cnpj"</p>
            <p><strong>E-mail:</strong><br>@val="pessoa_email"</p>
            <p class="d-inline-block text-truncate" style="max-width: 250px;">
                <strong>descricao:</strong><br>@val="fornecedor_descricao"</p>
            <a href="$link/fornecedor/produtos/@val="fornecedor_idfornecedor"">
                <button class="btn btn-primary" style="min-width:150px;">
                    Produtos
                </button>
            </a>
        </div>
    </div>
</div>
EOT;

$lista = listarGeral('f.idpessoa,p.nome',
'fornecedor f
JOIN pessoa p ON p.idpessoa = f.idpessoa
ORDER BY p.nome ASC');

foreach($lista as $row){
    $id = $row->idpessoa;
    echo coletarInfoFormulario($info,$id);
}

?>

<?php
include_once('pagina/painel/pagina/fornecedor/view/modalcadastro.php');
?>


<div aria-live="msgBox" aria-atomic="true" class="bg-body-secondary position-relative bd-example-toasts rounded-3">
    <div class="toast-container top-50 start-50 translate-middle p-3">
        <div id="msboxVerifica" class="toast " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-light">
                <strong class="me-auto">Deletar</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-danger text-light">
                Tem certeza que desaja escluir esse fornecedor?
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
    btnConfirma.href = "<?= $_PREFIXO ?>fornecedor/delete/" + $id

    const toastMsboxVerificar = document.getElementById('msboxVerifica')
    const toast = bootstrap.Toast.getOrCreateInstance(toastMsboxVerificar)
    toast.show()
}
</script>