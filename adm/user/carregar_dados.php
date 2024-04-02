<?php
include_once('../config/constantes.php');
include_once('../config/conexao.php');
include_once('../func/func.php');


$getPaginacao=$_GET['paginacao'];
$limite = 10;

echo "<div class='card border border-0 shadow'>";
echo "<div class='card-body'>";

$dados = listarLimitPaginacao('pessoa',$getPaginacao,$limite);
while ($row = $dados->fetch()) {

    $idPessoa = $row['idpessoa'];
    $nome = $row['nome'];
    $email = $row['email'];
    $nomeCompleto =  $row['nome'] ." ".$row['sobrenome'];
    $foto = $row['foto'];
    $cpf = $row['cpf'];
    $cadastro = $row['cadastro'];
    $alteracao = $row['alteracao'];
    $ativo = $row['ativo'];
    if ($ativo == 'A') {
        $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Banner Ativado"><span class="mdi mdi-lock-open-check text-success"></span>Ativo</a>';
    } else {
        $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Banner Desativado"><span class="mdi mdi-lock-check text-danger"></span> Desativado</a>';
}?>

<div class="card card-lista mt-2 border border-0 shadow-sm">
    <div class="card-body d-flex flex-column flex-md-row justify-content-between">
        <div class="d-flex flex-column flex-md-row flex-fill">
            <div class="d-flex col-md-6">
                <img src="./user/img/<?php 
                        if(empty($foto)){echo "semfoto.png";}else{ echo $foto;}?>" class="rounded-circle"
                    style="width:50px;height:50px;">
                <div class="d-flex flex-column ps-2">
                    <div>Nome: <strong><?php echo $nomeCompleto ." / ".$idPessoa?></strong></div>
                    <div>CPF: <strong><?php echo $cpf?></strong></div>
                </div>
            </div>
            <div class="d-flex flex-column ps-2  col-md-6">
                <div>E-mail: <strong><?php echo $email?></strong></div>
                <div>Ativo: <strong><?php echo $btnAtivo?></strong></div>
            </div>
        </div>
        <div class="p-2">
            <div class="d-flex flex-md-row flex-column gap-2">


                <a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" data-bs-toggle="modal"
                    data-bs-target="#modalUsuariosVerMais" title="Ver detalhes do usuario"
                    onclick="bannerVeMais(<?php echo $idPessoa ?>,'usuarioVerMais')"><span
                        class="mdi mdi-monitor-eye"></span> Ver Mais</a>

                <a href="?pagina=administrador&entrada=alterar" class="btn btn-sm btn-outline-primary"
                    title="Alterar informações do Banner"><span class="mdi mdi-file-document-edit"></span>
                    Alterar</a>

                <a href="#" class="btn btn-sm btn-outline-primary" title="Excluir Usuário"
                    onclick="excGeral(<?php echo $idPessoa ?>,'usuarioExc','btnExcluir');"><span
                        class="mdi mdi-delete-alert"></span> Excluir</a>
            </div>
        </div>
    </div>
</div>

<?php 
}

$totalRegistros = contadorRegistroTodos('pessoa');
botoesPaginacao("user/carregar_dados.php",$totalRegistros,$limite,$getPaginacao);

?>

