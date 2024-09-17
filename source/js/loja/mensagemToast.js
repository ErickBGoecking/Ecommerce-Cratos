function mensagemToast(titulo,mensagem,tipomensagem,posicao) {
    $.Toast(titulo, mensagem, tipomensagem, {
        position_class:posicao,
        has_icon: true,
        has_close_btn: true,
        stack: true,
        fullscreen: false,
        timeout: 1500,
        sticky: false,
        has_progress: true,
        rtl: false,
        width: 350,
        spacing: 5,
        sticky:false,
        border_radius: 6,

    });
}
// PARAMETROS------------------------------------
// $.Toast(title, message, type, options);
// FIM PARAMETROS---------------------------------

// CORES------------------------------------------
// success
// info
// error
// warning
// FIM CORES--------------------------------------

// POSICIONAMENTO---------------------------------
// 'toast-top-left'
// 'toast-top-right'
// 'toast-top-center'
// 'toast-bottom-left'
// 'toast-bottom-right'
// 'toast-bottom-center'
// FIM POSICIONAMENTO----------------------------

// TELA TODA-------------------------------------
// fullscreen:true,
// FIM TELA TODA---------------------------------

// ESPAÇO ENTRE UMA MENSAGE E OUTRA-------------
// spacing: 5
// FIM ESPAÇO ENTRE UMA MENSAGE E OUTRA---------

// BOTÃO PARA FECHAR---------------------------
// has_close_btn:true,
// FIM BOTÃO PARA FECHAR------------------------

// RETIRAR ICON---------------------------------
// has_icon: false,
// FIM RETIRAR ICON-----------------------------

// PRENDER A MENSAGE NO TOPO DA PAGINA-----------
// sticky:true,
// FIM PRENDER A MENSAGE NO TOPO DA PAGINA-------
