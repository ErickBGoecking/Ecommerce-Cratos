let contadorDivs = 0;
const sequenciaFotosProduto = document.getElementById('SequenciaFotosProduto');
const btnAdd = document.getElementById('btnAdd')

function adicionarFoto() {
    const inputFoto = document.createElement('input');
    inputFoto.type = 'file';
    inputFoto.id = 'produto_foto' + contadorDivs;
    inputFoto.name = 'fotoProduto[]';
    inputFoto.accept = ".jpg,.jpeg,.png"
    inputFoto.classList.add('d-none');

    inputFoto.click()
    inputFoto.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const areaFoto = document.createElement('div');
                areaFoto.id = 'areaFoto' + contadorDivs;
                areaFoto.classList.add('p-2');
                areaFoto.classList.add('border');
                areaFoto.classList.add('rounded');
                areaFoto.classList.add('text-center');
                areaFoto.style.position = 'relative';
                areaFoto.style.width = '150px';
                areaFoto.style.height = '150px';

                const imagemProduto = document.createElement('img');
                imagemProduto.id = 'fotoProduto' + contadorDivs;
                imagemProduto.alt = '';
                imagemProduto.style.maxWidth = '100%';
                imagemProduto.style.maxHeight = '100%';

                const btnLixeira = document.createElement('button')
                btnLixeira.id = 'btnLixeira' + contadorDivs
                btnLixeira.classList.add('btn')
                btnLixeira.classList.add('btn-secondary')
                btnLixeira.classList.add('btnLixeira')

                btnLixeira.onclick = function() {
                    areaFoto.remove()
                };

                const iconeLixeira = document.createElement('span')
                iconeLixeira.classList.add('mdi')
                iconeLixeira.classList.add('mdi-delete-outline')

                novoBtn = btnAdd
                btnAdd.remove()
                areaFoto.appendChild(inputFoto);
                areaFoto.appendChild(imagemProduto);
                btnLixeira.appendChild(iconeLixeira)
                areaFoto.appendChild(btnLixeira);
                sequenciaFotosProduto.appendChild(areaFoto);
                sequenciaFotosProduto.appendChild(novoBtn);
                imagemProduto.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    contadorDivs += 1
}