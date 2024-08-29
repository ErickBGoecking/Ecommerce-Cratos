<select name="fornecedor" id="inputFornecedor" class="form-select form-select-sm" aria-label="Small select example">
    <option value="">Selecione um fornecedor</option>
    <?php 
    $fornecedores = listarGeral('f.idfornecedor,f.descricao,p.nome',
    'fornecedor f
    JOIN pessoa p ON f.idpessoa = p.idpessoa
    WHERE p.nome IS NOT NULL
    ');
    foreach($fornecedores as $fornecedor){
        if(isset($controle[3])){
            if($controle[3] == $fornecedor->idfornecedor){
                echo '<option value="'. $fornecedor->idfornecedor .'" selected>'.$fornecedor->nome.'</option>';
            }else{
                echo '<option value="'. $fornecedor->idfornecedor .'">'.$fornecedor->nome.'</option>';
            }

        }else{
            echo '<option value="'. $fornecedor->idfornecedor .'">'.$fornecedor->nome.'</option>';
        }
    }
    ?>
</select>