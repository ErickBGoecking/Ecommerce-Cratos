<?php
function deletar($destino,$dados){
    $dados = explode("_",$dados);
    $id = base64_decode($dados[1]);
    $tabela = $dados[0];
    if(deleteRegistroUnico($tabela, 'id'.$tabela, $id)){
        $retorno = <<<EOT
            <form action="../../$destino" method="post" id="frmRetorno">
            <input type="text" name="retorno" value="true_Registro deletado com sucesso!">
            </form>
            <script>
            document.getElementById('frmRetorno').submit();
            </script>
            EOT;
    }else{
        $retorno = <<<EOT
            <form action="../../$destino" method="post" id="frmRetorno">
            <input type="text" name="retorno" value="false_Não foi possível deletar o registro selecionado.">
            </form>
            <script>
            document.getElementById('frmRetorno').submit();
            </script>
            EOT;
    }
    echo $retorno;
}
?>