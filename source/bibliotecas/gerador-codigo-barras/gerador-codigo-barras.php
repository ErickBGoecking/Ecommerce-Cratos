<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.6/JsBarcode.all.min.js"></script>
    <!-- <link rel="stylesheet" href="<?= $_PREFIXO?>source/bibliotecas/gerador-codigo-barras/css/style.css" /> -->
</head>

<div class="gerador-codigo-barras">
    <h1>Barcode Generator</h1>
    <input type="text" id="input-codigo-barras" />
    <svg id="barcode"></svg>
</div>

<script>
let input = document.getElementById("input-codigo-barras");

input.addEventListener('keydown', () => {
    JsBarcode("#barcode", input.value, {
        format: "code128",
        displayValue: true,
        fontSize: 24,
        lineColor: "#000",
    });
});
window.onload = (event) => {
    input.value = "";
};
</script>