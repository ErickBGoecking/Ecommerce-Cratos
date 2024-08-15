<?php
    include_once './config/constantes.php';
    include_once './config/conexao.php';
    include_once './func/func.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>TESTE FORMULARIO</title>
</head>

<body class="container">
    <form method="post" action="./add_auto.php">
        <div class="col-md-6">
            <input type="file" name="produto_foto_n" id="">
            <input type="text" name="produto_iddepartamento_n" id="" value="1">
            <div class="mb-3">
                <label for="inputNome" class="form-label">Produto</label>
                <input type="text" id="inputNome" class="form-control" name="produto_produto_n">
            </div>
            <div class="mb-3">
                <label for="inputSobrenome" class="form-label">Descrição</label>
                <input type="text" id="inputSobrenome" class="form-control" name="produto_descricao_n">
            </div>
            <div class="d-flex flex-wrap gap-3 justify-content-between mt-3 mb-3">
                <div class="col-2">
                    <label for="inputSobrenome" class="form-label">Altura</label>
                    <input type="text" id="inputSobrenome" class="form-control" name="produtovariacao_altura_n">
                </div>
                <div class="col-2">
                    <label for="inputSobrenome" class="form-label">Largura</label>
                    <input type="text" id="inputSobrenome" class="form-control" name="produtovariacao_largura_n">
                </div>
                <div class="col-2">
                    <label for="inputSobrenome" class="form-label">Peso</label>
                    <input type="text" id="inputSobrenome" class="form-control" name="produtovariacao_peso_n">
                </div>
                <div class="col-2">
                    <label for="inputSobrenome" class="form-label">Destaque</label>
                    <input type="text" id="inputSobrenome" class="form-control" name="produtovariacao_destaque_n">
                </div>
                <div class="col-2">
                    <label for="inputSobrenome" class="form-label">Quatidade Atual</label>
                    <input type="text" id="inputSobrenome" class="form-control" name="estoque_qtdatual_n">
                </div>
                <div class="col-3">
                    <label for="inputSobrenome" class="form-label">Quatidade Vendido</label>
                    <input type="text" id="inputSobrenome" class="form-control" name="estoque_qtdvendido_n">
                </div>
                <div class="col-2">
                    <label for="inputSobrenome" class="form-label">Custo</label>
                    <input type="text" id="inputSobrenome" class="form-control" name="estoque_custo_n">
                </div>
                <div class="col-2">
                    <label for="inputSobrenome" class="form-label">Venda</label>
                    <input type="text" id="inputSobrenome" class="form-control" name="estoque_venda_n">
                </div>
                <div class="col-2">
                    <label for="inputSobrenome" class="form-label">Lote</label>
                    <input type="text" id="inputSobrenome" class="form-control" name="estoque_lote_n">
                </div>
                <div class="col-2">
                    <label for="inputSobrenome" class="form-label">Vencimento</label>
                    <input type="text" id="inputSobrenome" class="form-control" name="estoque_vencimento_n">
                </div>
            </div>

            <div class="float-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <input class="btn btn-primary" type="submit" value="Cadastrar">
            </div>
        </div>
    </form>
    <!-- <table>
        <thead>
            <tr>
                <th>Id Pai</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $dados = listarGeral('*',"categoria");
            foreach($dados as $row){
            ?>
            <tr>
                <td><?php echo $row->idpai; ?></td>
                <td><?php echo $row->categoria; ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>