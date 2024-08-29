
<!-- <form method="post" action="../../../pagina/painel/pagina/fornecedores/acoes/cadastronovofornecedor.php" id="frmCadastrarFornecedor"> -->
<form method="post" id="frmCadastrarFornecedor">
    <label for="">Fornecedor:</label>
    <input type="text" class="form-control" name="pessoa_nome" required>
    <label for="">Razão Social:</label>
    <input type="text" class="form-control" name="pessoa_sobrenome" required>
    <label for="">CNPJ:</label>
    <input type="text" class="form-control" name="pessoa_cnpj" required>
    <label for="">telefone:</label>
    <input type="text" class="form-control" name="pessoa_telefone" required>
    <label for="">Email:</label>
    <input type="text" class="form-control" name="pessoa_email" required>
    <label for="">Descricao Fornecedor:</label>
    <textarea class="form-control" name="fornecedor_descricao" rows="3"></textarea>
    <div class="d-flex justify-content-end gap-3 mt-3">
        <button type="button" class="btn btn-secondary"  class="btn-close" data-bs-dismiss="modal" id="btnCancelarCadastroFornecedor">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="cadastrarFornecedor()">Salvar</button>
    </div>
</form>

