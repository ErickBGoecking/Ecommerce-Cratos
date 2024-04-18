<style>
.nav li .drop {
    position: absolute;
    z-index: 1;
    background-color: white;
    padding: 10px;
    display: none;
    border-end-end-radius: 10px;
    border-end-start-radius: 10px;
}

.nav li:hover .drop {
    display: block;
}

.subMenu li {
    padding: 5px;
}
</style>

<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Início</a></li>
                    <?php $repeticao=0;while($repeticao<5){$repeticao++;?>
                <li>
                    <a href="#">Whey Protein</a>
                    <ul class="drop">
                        <div style="display:flex;">
                            <div style="min-width:400px;padding:15px; display:flex;flex-direction: column;">
                                <ul class="subMenu">

                                    <li class="item"><a href="">itens</a></li>
                                    <li class="item"><a href="">itens</a></li>
                                    <li class="item"><a href="">itens</a></li>
                                    <li class="item"><a href="">itens</a></li>
                                    <li class="item"><a href="">itens</a></li>

                                </ul>
                            </div>
                            <div style="padding:15px;">
                                <img src="./img/product01.jpg" alt="" style="height:200px;">
                            </div>
                        </div>
                    </ul>
                </li>
                <?php }?>

            </ul>
        </div>
    </div>
</nav>