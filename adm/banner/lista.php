<?php
include_once('config/constantes.php');
include_once('config/conexao.php');
include_once('func/func.php');
//echo "<div class='card border border-0 shadow'>";
//echo "<div class='card-body'>";
?>
<div class="card">
    <div class="card-header">
        #Listar Banners
        <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal"
                data-bs-target="#modalBannerAdd">Cadastrar
        </button>
    </div>
    <div class="card-body">
        <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $getPaginacao = $dados['paginacao'];
        $limite = 10;
        $dados = listarLimitPaginacao2('banner b INNER JOIN pessoa p ON p.IdPessoa = b.IdAdm ORDER BY b.IdBanner DESC', 'b.IdBanner, b.Img, b.Titulo, b.DataInicial, b.DataFinal, b.Tipo, b.Cadastro, b.Alteracao, b.Ativo, p.Nome, p.Sobrenome',$getPaginacao, $limite);
        if ($dados) {
            while ($row = $dados->fetch()) {
                $idbanner = $row['IdBanner'];
                $adm = $row['Nome'];
                $admSobrenome = $row['Sobrenome'];
                $nomeCompleto = $adm . ' ' . $admSobrenome;
                $img = $row['Img'];
                if (empty($img)) {
                    $img = 'sem-imagem.png';
                }
                $titulo = $row['Titulo'];
                $datai = formatarDataHoraBr($row['DataInicial']);
                $dataf = formatarDataHoraBr($row['DataFinal']);
                $tipo = $row['Tipo'];
                $cadastro = $row['Cadastro'];
                $alteracao = $row['Alteracao'];
                $ativo = $row['Ativo'];
                if ($ativo == 'A') {
                    $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Banner Ativado. Clique para Desativar" id="btnStatus" onclick="statusGeral2(' . $idbanner . ',\'bannerStatus\',\'listaBanner\',\'' . $getPaginacao . '\');"><span class="mdi mdi-lock-open-check text-success"></span>Ativo</a>';
                } else {
                    $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Banner Desativado. Clique para Ativar" id="btnStatus" onclick="statusGeral2(' . $idbanner . ',\'bannerStatus\',\'listaBanner\',\'' . $getPaginacao . '\');"><span class="mdi mdi-lock-check text-danger"></span> Desativado</a>';
                }
                ?>
                <div class="card card-lista mt-2 border border-0 shadow-sm">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between">
                        <div class="d-flex flex-column flex-md-row flex-fill">
                            <div class="d-flex col-md-6">
                                <Img src="./banner/Img/<?php echo $img; ?>" class="rounded-circle"
                                     style="width:50px;height:50px;">
                                <div class="d-flex flex-column ps-2">
                                    <div><strong>Títiulo:</strong> <?php echo $titulo ?></div>
                                    <div class="d-flex flex-md-row flex-column">
                                        <div class=""><strong>Data Início:</strong> <?php echo $datai ?></div>
                                        <div class="ps-md-2"><strong>Data Fim:</strong> <?php echo $dataf ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column ps-2  col-md-6">
                                <div><strong>Tipo:</strong> <?php echo $tipo ?></div>
                                <div><strong>Ativo:</strong> <?php echo $btnAtivo ?></div>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="d-flex flex-md-row flex-column gap-2">
                                <a href="#" class="btn btn-sm btn-outline-primary" aria-current="page"
                                   data-bs-toggle="modal" data-bs-target="#modalBannerVerMais"
                                   title="Ver detalhes do banner"
                                   onclick="bannerVeMais(<?php echo $idbanner ?>,'bannerVerMais')"><span
                                            class="mdi mdi-monitor-eye"></span> Ver Mais</a>
                                <a href="#" class="btn btn-sm btn-outline-primary"
                                   title="Alterar informações do Banner" data-bs-toggle="modal"
                                   data-bs-target="#modalBannerAlt"
                                   onclick="bannerDadosAlterar(<?php echo $idbanner ?>,'bannerDadosAlt');"><span
                                            class="mdi mdi-file-document-edit"></span>
                                    Alterar</a>
                                <a href="#" class="btn btn-sm btn-outline-primary" title="Excluir Banner"
                                   onclick="excGeral(<?php echo $idbanner ?>,'bannerExc','btnExcluir');"><span
                                            class="mdi mdi-delete-alert"></span> Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        } else {
            ?>
            <div class="text-center">
                Nenhum banner para apresentar!
            </div>
            <?php
        }
        $totalRegistros = count(listarGeral('idpessoa', 'pessoa'));
        botoesPaginacao("listarUsuario", $totalRegistros, $limite, $getPaginacao);
        ?>
    </div>
</div>
