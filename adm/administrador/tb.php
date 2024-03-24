<div class="card">
    <div class="card-header">
        Listar Administradores
        <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal"
            data-bs-target="#modalBannerAdd">Cadastrar
        </button>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col" width="5%">Foto</th>
                    <th scope="col" width="auto" class="text-center">Nome</th>
                    <th scope="col" width="12%" class="text-center">cpf</th>
                    <th scope="col" width="10%" class="text-center">E-mail</th>
                    <th scope="col" width="7%" class="text-center">Ativo</th>
                    <th scope="col" width="20%" class="text-center">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $listarPessoa = listarGeral('*', 'pessoa');

            if ($listarPessoa) {
                foreach ($listarPessoa as $pessoa) {
                    $idPessoa = $pessoa->idpessoa;
                    $nome = $pessoa->nome;
                    $email = $pessoa->email;
                    $nomeCompleto =  $pessoa->nome ." ".$pessoa->sobrenome;
                    $foto = $pessoa->foto;
                    $cpf = $pessoa->cpf;
                    $cadastro = $pessoa->cadastro;
                    $alteracao = $pessoa->alteracao;
                    $ativo = $pessoa->ativo;
                    if ($ativo == 'A') {
                        $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Banner Ativado"><span class="mdi mdi-lock-open-check text-success"></span>Ativo</a>';
                    } else {
                        $btnAtivo = '<a href="#" class="btn btn-sm btn-outline-primary" aria-current="page" title="Banner Desativado"><span class="mdi mdi-lock-check text-danger"></span> Desativado</a>';
                    }
                
                ?>
                <tr>
                    <td><img src="./user/img/<?php echo $foto;?>" class="rounded-circle"
                            style="width:50px;height:50px;"></td>
                    <td class="text-center"><?php echo $nomeCompleto; ?></td>
                    <td class="text-center"><?php echo $cpf; ?></td>
                    <td class="text-center"><?php echo $email; ?></td>
                    <td class="text-center"><?php echo $btnAtivo; ?></td>
                    <td>
                        <div class="float-end">
                            <a href="#" class="btn btn-sm btn-outline-primary" aria-current="page"
                                title="Ver detalhes do banner"><span class="mdi mdi-monitor-eye"></span> Ver Mais</a>
                            <a href="#" class="btn btn-sm btn-outline-primary"
                                title="Alterar informações do Banner"><span class="mdi mdi-file-document-edit"></span>
                                Alterar</a>
                            <a href="#" class="btn btn-sm btn-outline-primary" title="Excluir Banner"><span
                                    class="mdi mdi-delete-alert"></span> Excluir</a>
                        </div>
                    </td>
                </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <th scope="row" class="text-center" colspan="7">Nenhum administrador cadastrado!</th>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="row float-end">
            <div class="col-8">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">2</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>