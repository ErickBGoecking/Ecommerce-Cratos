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

const tipoCargoModal = document.getElementById('modalTipoCargoAdd');
const cargoTipoModalAlt = document.getElementById('cargoTipoModalAlt');
if (tipoCargoModal) {
    tipoCargoModal.addEventListener('shown.bs.modal', () => {
        const inTipoCargo = document.getElementById('inTipoCargo');
        inTipoCargo.focus();
    });
}
if (cargoTipoModalAlt) {
    cargoTipoModalAlt.addEventListener('shown.bs.modal', () => {
        const inCargoTipoAlt = document.getElementById('inCargoTipoAlt');
        inCargoTipoAlt.focus();
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
                data.DataInicial = formatarDataBrasileira(data.DataInicial);
                data.DataFinal = formatarDataBrasileira(data.DataFinal);
                data.Cadastro = formatarDataBrasileira(data.Cadastro);
                data.Alteracao = formatarDataBrasileira(data.Alteracao);
                if (data.Ativo == 'A') {
                    estatus = 'Ativado';
                    document.getElementById('iEstatus').classList.add('text-success');
                    document.getElementById('iEstatus').classList.remove('text-danger');
                } else {
                    estatus = 'Desativado';
                    document.getElementById('iEstatus').classList.add('text-danger');
                    document.getElementById('iEstatus').classList.remove('text-success');
                }
                document.getElementById('imgBanner').src = './banner/img/' + data.Img;
                document.getElementById('iBannerTitulo').innerText = data.Titulo;
                document.getElementById('iDataInicio').innerText = data.DataInicial;
                document.getElementById('iDataFim').innerText = data.DataFinal;
                document.getElementById('iAdm').innerText = data.Nome + ' ' + data.Sobrenome;
                document.getElementById('iCadastro').innerText = data.Cadastro;
                document.getElementById('iAlteracao').innerText = data.Alteracao;
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
                data.Cadastro = formatarDataBrasileira(data.Cadastro);
                data.Alteracao = formatarDataBrasileira(data.Alteracao);
                if (data.Ativo == 'A') {
                    estatus = 'Ativado';
                    document.getElementById('iEstatus').classList.add('text-success');
                    document.getElementById('iEstatus').classList.remove('text-danger');
                } else {
                    estatus = 'Desativado';
                    document.getElementById('iEstatus').classList.add('text-danger');
                    document.getElementById('iEstatus').classList.remove('text-success');
                }
                document.getElementById('iGeneroTitulo').innerText = data.Genero;
                document.getElementById('iCadastro').innerText = data.Cadastro;
                document.getElementById('iAlteracao').innerText = data.Alteracao;
                document.getElementById('iEstatus').innerText = estatus;
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}
function cargoTipoVeMais(vermais, controle) {
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
                data.Cadastro = formatarDataBrasileira(data.Cadastro);
                data.Alteracao = formatarDataBrasileira(data.Alteracao);
                if (data.Ativo == 'A') {
                    estatus = 'Ativado';
                    document.getElementById('iEstatus').classList.add('text-success');
                    document.getElementById('iEstatus').classList.remove('text-danger');
                } else {
                    estatus = 'Desativado';
                    document.getElementById('iEstatus').classList.add('text-danger');
                    document.getElementById('iEstatus').classList.remove('text-success');
                }
                document.getElementById('iCargoTipoTitulo').innerText = data.TipoCargo;
                document.getElementById('iCadastro').innerText = data.Cadastro;
                document.getElementById('iAlteracao').innerText = data.Alteracao;
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
                if (data.Img) {
                    document.getElementById('imgPreviewAlt').src = './banner/img/' + data.Img;
                } else {
                    document.getElementById('imgPreviewAlt').src = './banner/img/' + imagemExiste;
                }
                document.getElementById('idBannerAlt').value = data.IdBanner;
                document.getElementById('iTituloAlt').value = data.Titulo;
                document.getElementById('iDataIAlt').value = data.DataInicial;
                document.getElementById('iDataFAlt').value = data.DataFinal;
                var selectTipo = document.getElementById('sTipoAlt');
                selectTipo.innerHTML = '';
                var tiposDisponiveis = ['Rotativo', 'Central'];
                tiposDisponiveis.forEach(Tipo => {
                    var option = document.createElement('option');
                    option.value = Tipo;
                    option.text = Tipo;
                    selectTipo.appendChild(option);
                });
                var tipoRetornado = data.Tipo;
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
                document.getElementById('idGeneroAlt').value = data.IdGenero;
                document.getElementById('inGeneroAlt').value = data.Genero;
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}
function cargoTipoDadosAlterar(alterar, controle) {
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
                document.getElementById('idCargoTipoAlt').value = data.IdCargoTipo;
                document.getElementById('inCargoTipoAlt').value = data.TipoCargo;
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


// ------------------------PAGINAÇÃO---------------------------------------------
function carregarDadosPaginacao(caminho,pagina) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', caminho + "?paginacao=" + pagina, true);
    xhr.onload = function() {
        if (this.status == 200) {
            document.getElementById('conteudo').innerHTML = this.responseText;
            criarBotoesPaginacao(pagina);
        }
    }
    xhr.send();
}