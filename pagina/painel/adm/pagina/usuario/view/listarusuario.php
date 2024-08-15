<?php

$dados = listarGeral('idpessoa,idnivelacesso,nome,email,sobrenome,foto,cpf,cadastro,alteracao,ativo','pessoa where idnivelacesso IN (1,3)');
foreach($dados as $row){
    $idPessoa = base64_encode($row->idpessoa);
    $nome = $row->nome;
    $email = $row->email;
    $nomeCompleto =  $row->nome ." ". $row->sobrenome;
    $foto = $row->foto;
    $cpf = $row->cpf;
    $cadastro = $row->cadastro;
    $alteracao = $row->alteracao;
    $ativo = $row->ativo;
 ?>

<div class="card card-lista mt-2 border border-0 shadow-sm">
    <div class="card-body d-flex flex-column flex-md-row justify-content-between">
        <div class="d-flex flex-column flex-md-row flex-fill">
            <div class="d-flex col-md-6">
                <img src="<?= $_PREFIXO?>/img/usuario/<?php 
                        if(empty($foto)){echo "semfoto.png";}else{ echo $foto;}?>" class="rounded-circle"
                    style="width:50px;height:50px;">
                <div class="d-flex flex-column ps-2">
                    <div>Nome: <strong><?php echo $nomeCompleto ?></strong></div>
                    <div>CPF: <strong><?php echo $cpf?></strong></div>
                </div>
            </div>
            <div class="d-flex flex-column ps-2  col-md-6">
                <div>E-mail: <strong><?php echo $email?></strong></div>
                 <div class="d-flex gap-3">Ativo:
                     <!-- <form action="<?php echo $_PREFIXO?>adm/usuario/alterar" method="post"> -->
                         <?php 
                        $btnAtivo = '<button class="btn btn-sm btn-outline-primary" onclick="'. "enviardados('usuarioStatus','$idPessoa')".'">';
                        if ($ativo == 'A') {
                            $btnAtivo.= '<span class="mdi mdi-lock-open-check text-success"></span>Ativo</button>';
                            $valorAtivo = 'D';
                        } else {
                            $btnAtivo .= '<span class="mdi mdi-lock-check text-danger"></span> Desativado</button>';
                            $valorAtivo = 'A';
                        }
                        ?>
                         <!-- <input type="text" name="pessoa_idpessoa" value="<?php echo base64_decode($idPessoa)?>" class="d-none">
                         <input type="text" name="pessoa_ativo" value="<?php echo $valorAtivo?>" class="d-none"> -->
                         <strong><?php echo $btnAtivo?></strong>
                     <!-- </form> -->
                 </div>
            </div>
        </div>
        <div class="p-2">
            <div class="d-flex flex-md-row flex-column gap-2">

                <a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" data-bs-toggle="modal"
                    data-bs-target="#modalUsuarioVerMais" title="Ver detalhes do usuario"
                    onclick="usuarioVerMais(<?php echo $idPessoa ?>,'usuarioVerMais');"><span
                        class="mdi mdi-monitor-eye"></span> Ver Mais</a>

                <a href="#" class="btn btn-sm btn-outline-primary" title="Alterar informações do Banner"
                    data-bs-toggle="modal" data-bs-target="#modalUsuarioAlt"
                    onclick="usuarioDadosAlterar(<?php echo $idPessoa ?>,'usuarioDadosAlt');"><span
                        class="mdi mdi-file-document-edit"></span>
                    Alterar</a>

                <button class="btn btn-sm btn-outline-primary" title="Excluir Usuario"
                    onclick="msgBoxConfirmacao('pessoa_<?php echo $idPessoa ?>')"><span
                        class="mdi mdi-delete-alert"></span> Excluir</button>
            </div>
        </div>
    </div>
</div>


<?php 
}

?>


<div aria-live="msgBox" aria-atomic="true" class="bg-body-secondary position-relative bd-example-toasts rounded-3">
    <div class="toast-container top-50 start-50 translate-middle p-3">
        <div id="msboxVerifica" class="toast " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-light">
                <strong class="me-auto">Deletar</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-danger text-light">
                Tem certeza que desaja este usuario?
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
    btnConfirma.href = "<?= $_PREFIXO ?>adm/usuario/delete/" + $id

    const toastMsboxVerificar = document.getElementById('msboxVerifica')
    const toast = bootstrap.Toast.getOrCreateInstance(toastMsboxVerificar)
    toast.show()
}

// "usuarioStatus","'.$idPessoa.'"


</script>