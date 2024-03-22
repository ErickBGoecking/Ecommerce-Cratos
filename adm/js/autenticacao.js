document.addEventListener("DOMContentLoaded", function() {
    var btnLogar = document.getElementById("btnLogarEntrar");
    var alertMsg = document.getElementById("alertMsg");
    var senhaInput = document.getElementById("inSenha");
    var emailInput = document.getElementById("inEmail");
    btnLogar.disabled = true;
    senhaInput.addEventListener("input", validarFormulario);
    emailInput.addEventListener("input", validarFormulario);
    function validarFormulario() {
        var senhaValida = senhaInput.value.length >= 8;
        var emailValido = emailInput.value.trim() !== "";
        if (senhaValida && emailValido) {
            btnLogar.disabled = false;
        } else {
            btnLogar.disabled = true;
        }
    }

    btnLogar.addEventListener("click", function(event) {
        event.preventDefault();
        var form = event.target.form;
        var formData = new FormData(form);
        formData.append('controle', 'login');
        if (emailInput.value.trim() === "") {
            mostrarMensagem("O e-mail não pode ser vazio.", "alert-danger");
            return;
        }

        if (senhaInput.value.length < 8) {
            mostrarMensagem("Senha deve ter 8 ou mais caracteres.", "alert-danger");
            return;
        }

        fetch("controle.php", {
            method: "POST",
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na requisição: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                mostrarProcessando();
                console.log(data)
                if (data.sucesso) {
                    mostrarMensagem(data.mensagem, "alert-success");
                    setTimeout(function() {
                        window.location.href = "adm.php";
                    }, 1000);
                } else {
                    mostrarMensagem(data.mensagem, "alert-danger");
                }
            })
            .catch(error => {
                console.error(error);
            });
    });

    function mostrarMensagem(mensagem, tipo) {
        var alertText = document.getElementById("alertText");
        alertText.textContent = mensagem;
        alertMsg.classList.remove("d-none");
        alertMsg.classList.remove("alert-success", "alert-danger");
        alertMsg.classList.add(tipo);
    }
    function mostrarProcessando() {
        var divFundoEscuro = document.createElement('div');
        divFundoEscuro.id = 'fundoEscuro';
        divFundoEscuro.style.position = 'fixed';
        divFundoEscuro.style.top = '0';
        divFundoEscuro.style.left = '0';
        divFundoEscuro.style.width = '100%';
        divFundoEscuro.style.height = '100%';
        divFundoEscuro.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
        document.body.appendChild(divFundoEscuro);

        var divProcessando = document.createElement('div');
        divProcessando.id = 'processandoDiv';
        divProcessando.style.position = 'fixed';
        divProcessando.style.top = '40%';
        divProcessando.style.left = '50%';
        divProcessando.style.transform = 'translate(-50%, -50%)';
        divProcessando.innerHTML = '<lottie-player autoplay loop mode="normal" src="../loading/loading.json" style="width: 120px">';
        document.body.appendChild(divProcessando);
    }
});