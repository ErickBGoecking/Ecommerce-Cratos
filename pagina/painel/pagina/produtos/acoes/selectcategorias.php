<select name="" id="inputSelectCategoria" class="form-select">
    <option value=""></option>
    <?php 
    $categorias = listarGeral('idcategoria,idpai,categoria','categoria where idpai = 0');
    foreach($categorias as $categoria){
        echo '<option value="'.$categoria->idcategoria.'-'.$categoria->categoria.'">'.$categoria->categoria.'</option>';
    }
    ?>
</select>