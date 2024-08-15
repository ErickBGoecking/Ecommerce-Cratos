<style>
.bg-danger-dark {
    background-color: darkred;
}
</style>


<?php

function mensagemBox($bg,$titulo,$mensagem){

    $color="text-black";
    $bgTitle= "bg-warning";
    $bgBody = "light";
    switch($bg){
        case "danger":
            $color="text-light";
            $bgTitle= "bg-danger";
            $bgBody = 'bg-danger-dark';
            break;
    }
    $m=<<<EOT
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container top-0 end-0 p-3">
                <div id="liveToast" class="toast " role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header $bgTitle $color">
                        <strong class="me-auto">$titulo</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body $bgBody $color">
                        $mensagem
                    </div>
                </div>
            </div>
        </div>
        <script>
        const toastLiveExample = document.getElementById('liveToast')
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastBootstrap.show()
        </script>
    EOT;

    echo $m;

}
function mensagemBoxVerificar($tipo,$titulo,$mensagem,$destino,$tabela,$id){
    $bgTitle ="bg-warning";
    $color="";
    $bgBody="bg-warning";
    switch($tipo){
        case "danger":
            $color="text-light";
            $bgBody="bg-danger-dark";
            $bgTitle ="bg-danger";
            break;
    }

    $m = <<<EOT
          <div aria-live="polite" aria-atomic="true" class="bg-body-secondary position-relative bd-example-toasts rounded-3">
            <div class="toast-container top-50 start-50 translate-middle p-3">
                <div id="msboxVerifica" class="toast " role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header $bgTitle $color">
                        <strong class="me-auto">$titulo</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body $bgBody $color">
                        $mensagem
                        <div class="mt-2 pt-2 border-top">
                            <div class="d-flex gap-3">
                                <form method="post" action="$destino">
                                    <input type="text" name="$tabela" value="$id" class="d-none">
                                    <button class="btn btn-danger btn-sm">Sim</button>
                                </form>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="toast">Não</button>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
            <script>
                const toastMsboxVerificar = document.getElementById('msboxVerifica')
                const toast = bootstrap.Toast.getOrCreateInstance(toastMsboxVerificar)
                toast.show()
            </script>

    EOT;

    echo $m;

}
?>
<!-- Flexbox container for aligning the toasts -->
<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center w-100">

  <!-- Then put toasts within -->
  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small>11 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>


<!-- <div aria-live="polite" aria-atomic="true" class="bg-body-secondary position-relative bd-example-toasts rounded-3">
    <div class="toast-container top-100 start-50 translate-middle p-3">
        <div id="msboxVerifica" class="toast " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header $bgTitle $color">
                <strong class="me-auto">$titulo</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body $bgBody $color">
                $mensagem
                <div class="mt-2 pt-2 border-top">
                    <form method="post" action="$destino">
                        <input type="text" name="$tabela" value="$id" class="d-none">
                        <button class="btn btn-danger btn-sm">Sim</button>
                    </form>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="toast">Não</button>
                </div>
            </div>
        </div>
    </div>
</div> -->