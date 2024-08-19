<div class="modal fade" id="modalCadastro"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Tipo De Cargo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo $_PREFIXO?>adm/cargo/cadastrar" method="post" id="frmCadastrar">
                    <label for="">cargo:</label>
                    <input type="text" class="form-control" name="cargo_cargo" required>
                    <select name="cargo_idcargotipo">
                        <?php
                        $cargotipos = listarGeral('idcargotipo,cargotipo','cargotipo');
                        foreach($cargotipos as $cargoTipo){
                            echo '<option value="'.$cargoTipo->idcargotipo.'">'.$cargoTipo->cargotipo.'</option>';
                        }
                        ?>
                    </select>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-warning" onclick="enviarCadastro()">Cadastrar</button>
            </div>
        </div>
    </div>
</div>


<script>
    function enviarCadastro(){
        document.getElementById('frmCadastrar').submit()
    }
</script>