<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= $_PREFIXO?>source/bibliotecas/textoeditor/css/style.css" />
</head>

<div>
    <div class="container">
        <div class="options">
            <!-- Text Format -->
            <button id="bold" class="option-button format buttonEditor">
                <i class="fa-solid fa-bold"></i>
            </button>
            <button id="italic" class="option-button format buttonEditor">
                <i class="fa-solid fa-italic"></i>
            </button>
            <button id="underline" class="option-button format buttonEditor">
                <i class="fa-solid fa-underline"></i>
            </button>
            <button id="strikethrough" class="option-button format buttonEditor">
                <i class="fa-solid fa-strikethrough"></i>
            </button>
            <button id="superscript" class="option-button script buttonEditor">
                <i class="fa-solid fa-superscript"></i>
            </button>
            <button id="subscript" class="option-button script buttonEditor">
                <i class="fa-solid fa-subscript"></i>
            </button>
            <!-- List -->
            <button id="insertOrderedList" class="option-button buttonEditor">
                <div class="fa-solid fa-list-ol"></div>
            </button>
            <button id="insertUnorderedList" class="option-button buttonEditor">
                <i class="fa-solid fa-list"></i>
            </button>
            <!-- Undo/Redo -->
            <button id="undo" class="option-button buttonEditor">
                <i class="fa-solid fa-rotate-left"></i>
            </button>
            <button id="redo" class="option-button buttonEditor">
                <i class="fa-solid fa-rotate-right"></i>
            </button>
            <!-- Link -->
            <button id="createLink" class="adv-option-button buttonEditor">
                <i class="fa fa-link"></i>
            </button>
            <button id="unlink" class="option-button buttonEditor">
                <i class="fa fa-unlink"></i>
            </button>
            <!-- Alignment -->
            <button id="justifyLeft" class="option-button align buttonEditor">
                <i class="fa-solid fa-align-left"></i>
            </button>
            <button id="justifyCenter" class="option-button align buttonEditor">
                <i class="fa-solid fa-align-center"></i>
            </button>
            <button id="justifyRight" class="option-button align buttonEditor">
                <i class="fa-solid fa-align-right"></i>
            </button>
            <button id="justifyFull" class="option-button align buttonEditor">
                <i class="fa-solid fa-align-justify"></i>
            </button>
            <button id="indent" class="option-button spacing buttonEditor">
                <i class="fa-solid fa-indent"></i>
            </button>
            <button id="outdent" class="option-button spacing buttonEditor">
                <i class="fa-solid fa-outdent"></i>
            </button>
            <!-- Headings -->
            <select id="formatBlock" class="adv-option-button">
                <option value="H1">H1</option>
                <option value="H2">H2</option>
                <option value="H3">H3</option>
                <option value="H4">H4</option>
                <option value="H5">H5</option>
                <option value="H6">H6</option>
            </select>
            <!-- Font -->
            <select id="fontName" class="adv-option-button"></select>
            <select id="fontSize" class="adv-option-button"></select>
            <!-- Color -->
            <div class="input-wrapper">
                <input type="color" id="foreColor" class="adv-option-button" />
                <label for="foreColor">Font Color</label>
            </div>
            <div class="input-wrapper">
                <input type="color" id="backColor" class="adv-option-button" />
                <label for="backColor">Highlight Color</label>
            </div>
        </div>
        <div id="text-input" contenteditable="true" style="max-height:250px; overflow-y:scroll;"></div>
    </div>

    <script src="<?= $_PREFIXO?>source/bibliotecas/textoeditor/js/script.js"></script>
</div>

<?php 
function inputTextoCopia($nameInput){
    $txt = <<<EOT
    <textarea id="texto-editado" name="$nameInput" class="d-none"></textarea>
    <script>
    const minhaDiv = document.getElementById('text-input');
    const textarea = document.getElementById('texto-editado');

    minhaDiv.addEventListener('input',function(){
        const conteudoHTML = minhaDiv.innerHTML;
        textarea.value = conteudoHTML
    })
    </script>
    EOT;
    echo $txt;
}
?>