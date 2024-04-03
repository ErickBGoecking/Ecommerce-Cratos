<?php
include_once('config/constantes.php');
include_once('config/conexao.php');
include_once('func/func.php');


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$getPaginacao=$dados['paginacao'];
$limite = 10;

echo "<div class='card border border-0 shadow'>";
echo "<div class='card-body'>";

$dados = listarLimitPaginacao('pessoa',$getPaginacao,$limite);
while ($row = $dados->fetch()) {

    $idPessoa = $row['IdPessoa'];
    $nome = $row['Nome'];
    $email = $row['Email'];
    $nomeCompleto =  $row['Nome'] ." ".$row['Sobrenome'];
    $foto = $row['Foto'];
    $cpf = $row['Cpf'];
    $cadastro = $row['Cadastro'];
    $alteracao = $row['Alteracao'];
    $ativo = $row['Ativo'];
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
                    onclick="bannerVeMais(<?php echo $idPessoa ?>,'verMais')"><span
                        class="mdi mdi-monitor-eye"></span> Ver Mais</a>

                <a href="#" class="btn btn-sm btn-outline-primary"
                            title="Alterar informações do Banner" data-bs-toggle="modal"
                            data-bs-target="#modalBannerAlt"
                            onclick="bannerDadosAlterar(<?php echo $idPessoa ?>,'usuarioDadosAlt');"><span
                                    class="mdi mdi-file-document-edit"></span>
                            Alterar</a>
                <a href="#" class="btn btn-sm btn-outline-primary" title="Excluir Usuario"
                    onclick="excGeral2(<?php echo $idPessoa ?>,'usuarioExc','btnExcluir','listarUsuario',<?php echo $getPaginacao ?>);"><span
                            class="mdi mdi-delete-alert"></span> Excluir</a>
            </div>
        </div>
    </div>
</div>

<?php 
}

$totalRegistros = count(listarGeral('idpessoa','pessoa'));
botoesPaginacao("listarUsuario",$totalRegistros,$limite,$getPaginacao);

?>

