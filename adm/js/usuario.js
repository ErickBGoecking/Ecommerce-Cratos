// ----------------------------FUNÇÕES ESPECÍFICAS----------------------------------

function usuarioVerMais(verMais, controle) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&vermais=' + encodeURIComponent(verMais),
    })
        .then(response => response.json())
        .then(data => {
            if (data) {
                var imagemExiste = 'semfoto.png'
                if (data.Foto) {
                    document.getElementById('imgPreviewVerMais').src = 'user/img/' + data.Foto;
                } else {
                    document.getElementById('imgPreviewVerMais').src = 'user/img/' + imagemExiste;
                }
                document.getElementById('idPessoaVerMais').value = data.IdPessoa;
                document.getElementById('iNomeVerMais').value = data.Nome;
                document.getElementById('iSobrenomeVerMais').value = data.Sobrenome;
                document.getElementById('iCpfVerMais').value = data.Cpf;
                document.getElementById('iNascimentoVerMais').value = data.Nascimento;
                document.getElementById('iTelefoneVerMais').value = data.Telefone;
                document.getElementById('iEmailVerMais').value = data.Email;

                var selectTipo = document.getElementById('iGeneroVerMais');
                selectTipo.innerHTML = '';

                var option = document.createElement('option');
                var tiposDisponiveis =data.Generos;

                tiposDisponiveis.forEach(generoAtual=>{
                    if(generoAtual.IdGenero == data.IdGenero){
                        option.value = generoAtual.IdGenero;
                        option.text = generoAtual.Genero;
                        option.selected = true;
                        selectTipo.appendChild(option);
                    }
                })
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}

function usuarioDadosAlterar(alterar, controle) {
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
                var imagemExiste = 'semfoto.png'
                if (data.Foto) {
                    document.getElementById('imgPreviewAlt').src = 'user/img/' + data.Foto;
                } else {
                    document.getElementById('imgPreviewAlt').src = 'user/img/' + imagemExiste;
                }
                document.getElementById('idPessoaAlt').value = data.IdPessoa;
                document.getElementById('iNomeAlt').value = data.Nome;
                document.getElementById('iSobrenomeAlt').value = data.Sobrenome;
                document.getElementById('iCpfAlt').value = data.Cpf;
                document.getElementById('iNascimentoAlt').value = data.Nascimento;
                document.getElementById('iTelefoneAlt').value = data.Telefone;
                document.getElementById('iEmailAlt').value = data.Email;

                var selectTipo = document.getElementById('iGeneroAlt');
                selectTipo.innerHTML = '';
                var tiposDisponiveis =data.Generos;
                tiposDisponiveis.forEach(generoAtual=>{
                    var option = document.createElement('option');   
                    option.value = generoAtual.IdGenero;
                    option.text = generoAtual.Genero;
                    if(generoAtual.IdGenero == data.IdGenero){
                        option.selected = true;
                    }
                    selectTipo.appendChild(option);
                })
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}
// ----------------------------FUNÇÕES GENERICAS----------------------------------


function mascaraCPF(id){
    var campoCPF = document.getElementById(id);
    campoCPF.addEventListener('input',function(){
        var cpf = campoCPF.value;
    
        if (cpf.length > 14) {   
            cpf = cpf.substring(0, cpf.length - 1)
        }
        cpf = cpf.replace(/\D/g, "");
        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

        campoCPF.value =cpf
    })
}
function mascaraTelefone(id){
    var campoTelefone = document.getElementById(id);
    campoTelefone.addEventListener('input',function(){
        var telefone = campoTelefone.value;
        
        if (telefone.length > 14) {   
            telefone = telefone.substring(0, telefone.length - 1)
        }
        telefone = telefone.replace(/\D/g, '');
        telefone = telefone.replace(/^(\d{2})(\d)/g, '($1)$2');
        telefone = telefone.replace(/(\d{5})(\d)/, '$1-$2');

        campoTelefone.value =telefone
    })
}

function alterarGeral2(controle, modalAlt, frm,recarregar,pagina=1) {
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
                carregarDadosPaginacao(recarregar,pagina);
                setTimeout(2000);
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}
function addGeral2(frm, controle,modalAdd,recarregar,pagina) {
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
                var bsModal = bootstrap.Modal.getInstance(modal);
                bsModal.hide();
                form.reset();
                carregarDadosPaginacao(recarregar,pagina);
                setTimeout( 2000);
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => {
            console.error(error.message);
        });
}

function carregarDadosPaginacao(controle, pagina) {
    
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&paginacao=' + encodeURIComponent(pagina),
    })
    .then(response => response.text())
    .then(data => {
        if (data) {
            document.getElementById('conteudo').innerHTML = data;
            configurarOnclickBotoes(controle, pagina);
        } else {
            mensagem(data.mensagem);
        }
    })
    .catch(error => console.error('Erro na requisição:', error));
}



function abrirConteudo(idDiv, controle,post) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&post=' + encodeURIComponent(post),
    })
    .then(response => response.text())
    .then(data => {
        if (data) {
            document.getElementById(idDiv).innerHTML = data;
        } else {
            mensagem(data.mensagem);
        }
    })
    .catch(error => console.error('Erro na requisição:', error));
}


function statusGeral2(status, controle,atualizar,pagina) {
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
                carregarDadosPaginacao(atualizar, pagina)
                setTimeout(2000);
            } else {
                mensagem(data.mensagem);
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}