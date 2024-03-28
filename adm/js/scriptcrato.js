function previewImg(idimg, imgPreview) {
    document.getElementById(idimg).addEventListener('change', function () {
        var arquivo = this.files[0];
        if (arquivo) {
            var leitor = new FileReader();
            leitor.onload = function () {
                document.getElementById(imgPreview).setAttribute('src', leitor.result);
            }
            leitor.readAsDataURL(arquivo);
        } else {
            document.getElementById(imgPreview).setAttribute('src', 'img/sem-imagem.png');
        }
    });
}

const generoModal = document.getElementById('modalGeneroAdd');
const generoModalAlt = document.getElementById('modalGeneroAlt');
if (generoModal) {
    generoModal.addEventListener('shown.bs.modal', () => {
        const inGenero = document.getElementById('inGenero');
        inGenero.focus();
    });
}
if (generoModalAlt) {
    generoModalAlt.addEventListener('shown.bs.modal', () => {
        const inGeneroAlt = document.getElementById('inGeneroAlt');
        inGeneroAlt.focus();
    });
}

function mensagem(msg) {
    var liveToast = document.getElementById('liveToast');
    var toast = new bootstrap.Toast(liveToast);
    liveToast.querySelector('.toast-body').innerText = msg;
    toast.show();
}

function addGeral(btnAdd, frm, controle, modalAdd) {
    // document.getElementById(btnAdd).addEventListener('click', function () {
    // });
    var form = document.getElementById(frm);
    var formData = new FormData(form);
    formData.append('controle', controle);

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
                mensagem(data.mensagem);
                var modal = document.getElementById(modalAdd);
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
                mensagem(data.mensagem);
            }
        })
        .catch(error => {
            console.error(error.message);
        });
}

function statusGeral(status, controle) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&status=' + encodeURIComponent(status),
    })
        .then(response => response.json())
        .then(data => {
            if (data.sucesso) {
                mensagem(data.mensagem);
                setTimeout(function () {
                    location.reload();
                }, 2000);
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}

function excGeral(excluir, controle, btnAdd) {
    if (excluir > 0) {
        document.getElementById("confirmacao").style.display = "block";
        document.getElementById(btnAdd).addEventListener('click', function () {
            fetch('controle.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'controle=' + encodeURIComponent(controle) + '&excluir=' + encodeURIComponent(excluir),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.sucesso) {
                        document.getElementById("confirmacao").style.display = "none";
                        mensagem(data.mensagem);
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        mensagem(data.mensagem);
                    }
                })
                .catch(error => console.error('Erro na requisição:', error));
        });
    } else {
        mensagem('Error na exclusão');
    }
}

function cancelarExclusao() {
    document.getElementById("confirmacao").style.display = "none";
}

function formatarDataBrasileira(data) {
    return new Date(data).toLocaleString('pt-BR', {timeZone: 'UTC'});
}

function bannerVeMais(vermais, controle) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&vermais=' + encodeURIComponent(vermais),
    })
        .then(response => response.json())
        .then(data => {
            if (data) {
                var estatus = '';
                data.datai = formatarDataBrasileira(data.datai);
                data.dataf = formatarDataBrasileira(data.dataf);
                data.cadastro = formatarDataBrasileira(data.cadastro);
                data.alteracao = formatarDataBrasileira(data.alteracao);
                if (data.ativo == 'A') {
                    estatus = 'Ativado';
                    document.getElementById('iEstatus').classList.add('text-success');
                    document.getElementById('iEstatus').classList.remove('text-danger');
                } else {
                    estatus = 'Desativado';
                    document.getElementById('iEstatus').classList.add('text-danger');
                    document.getElementById('iEstatus').classList.remove('text-success');
                }
                document.getElementById('imgBanner').src = './banner/img/' + data.img;
                document.getElementById('iBannerTitulo').innerText = data.titulo;
                document.getElementById('iDataInicio').innerText = data.datai;
                document.getElementById('iDataFim').innerText = data.dataf;
                document.getElementById('iAdm').innerText = data.nome + ' ' + data.sobrenome;
                document.getElementById('iCadastro').innerText = data.cadastro;
                document.getElementById('iAlteracao').innerText = data.alteracao;
                document.getElementById('iEstatus').innerText = estatus;
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}

function generoVeMais(vermais, controle) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&vermais=' + encodeURIComponent(vermais),
    })
        .then(response => response.json())
        .then(data => {
            if (data) {
                var estatus = '';
                data.cadastro = formatarDataBrasileira(data.cadastro);
                data.alteracao = formatarDataBrasileira(data.alteracao);
                if (data.ativo == 'A') {
                    estatus = 'Ativado';
                    document.getElementById('iEstatus').classList.add('text-success');
                    document.getElementById('iEstatus').classList.remove('text-danger');
                } else {
                    estatus = 'Desativado';
                    document.getElementById('iEstatus').classList.add('text-danger');
                    document.getElementById('iEstatus').classList.remove('text-success');
                }
                document.getElementById('iGeneroTitulo').innerText = data.genero;
                document.getElementById('iCadastro').innerText = data.cadastro;
                document.getElementById('iAlteracao').innerText = data.alteracao;
                document.getElementById('iEstatus').innerText = estatus;
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}

function bannerDadosAlterar(alterar, controle) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&vermais=' + encodeURIComponent(alterar),
    })
        .then(response => response.json())
        .then(data => {
            if (data) {
                var imagemExiste = 'sem-imagem.png'
                if (data.img) {
                    document.getElementById('imgPreviewAlt').src = './banner/img/' + data.img;
                } else {
                    document.getElementById('imgPreviewAlt').src = './banner/img/' + imagemExiste;
                }
                document.getElementById('idBannerAlt').value = data.idbanner;
                document.getElementById('iTituloAlt').value = data.titulo;
                document.getElementById('iDataIAlt').value = data.datai;
                document.getElementById('iDataFAlt').value = data.dataf;
                var selectTipo = document.getElementById('sTipoAlt');
                selectTipo.innerHTML = '';
                var tiposDisponiveis = ['Rotativo', 'Central'];
                tiposDisponiveis.forEach(tipo => {
                    var option = document.createElement('option');
                    option.value = tipo;
                    option.text = tipo;
                    selectTipo.appendChild(option);
                });
                var tipoRetornado = data.tipo;
                var optionSelecionada = selectTipo.querySelector('option[value="' + tipoRetornado + '"]');
                if (optionSelecionada) {
                    optionSelecionada.selected = true;
                }
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}

function generoDadosAlterar(alterar, controle) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&vermais=' + encodeURIComponent(alterar),
    })
        .then(response => response.json())
        .then(data => {
            if (data) {
                document.getElementById('idGeneroAlt').value = data.idgenero;
                document.getElementById('inGeneroAlt').value = data.genero;
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}

function alterarGeral(controle, modalAlt, frm) {
    var form = document.getElementById(frm);
    var formData = new FormData(form);
    formData.append('controle', controle);
    fetch('controle.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.sucesso) {
                mensagem(data.mensagem);
                var modal = document.getElementById(modalAlt);
                var bsModal = bootstrap.Modal.getInstance(modal);
                bsModal.hide();
                form.reset();
                setTimeout(function () {
                    location.reload();
                }, 2000);
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}

