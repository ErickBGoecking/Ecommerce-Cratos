document.getElementById('iImg').addEventListener('change', function () {
    var arquivo = this.files[0];
    if (arquivo) {
        var leitor = new FileReader();
        leitor.onload = function () {
            document.getElementById('imgPreview').src = leitor.result;
        }
        leitor.readAsDataURL(arquivo);
    } else {
        document.getElementById('imgPreview').src = 'img/sem-imagem.png';
    }

    document.getElementById('btnEnviar').addEventListener('click', function () {
        var form = document.getElementById('frmBannerAdd');
        var formData = new FormData(form);
        formData.append('controle', 'bannerAdd');

        fetch('controle.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Erro de conexão.');
            })
            .then(data => {
                if (data.sucesso) {
                    var liveToast = document.getElementById('liveToast');
                    var toast = new bootstrap.Toast(liveToast);
                    liveToast.querySelector('.toast-body').innerText = data.mensagem;
                    toast.show();

                    var modal = document.getElementById('modalBannerAdd');
                    modal.removeAttribute('aria-modal');
                    modal.classList.remove('show');
                    modal.setAttribute('hidden', 'true');
                    document.body.classList.remove('modal-open');
                    document.body.style.paddingRight = '';
                    var modalBackdrop = document.getElementsByClassName('modal-backdrop')[0];
                    if (modalBackdrop) {
                        modalBackdrop.parentNode.removeChild(modalBackdrop);
                    }
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else {
                    var liveToast = document.getElementById('liveToast');
                    var toast = new bootstrap.Toast(liveToast);
                    liveToast.querySelector('.toast-body').innerText = data.mensagem;
                    toast.show();

                    console.log(data.mensagem);
                }
            })
            .catch(error => {
                console.error(error.message);
            });
    });

});

function statusGeral(status,controle) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&status=' + encodeURIComponent(status),
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => console.error('Erro na requisição:', error));
}