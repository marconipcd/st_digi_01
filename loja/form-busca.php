<div class="inferior row-fluid ">
    <div class="span8 busca-mobile" style="width:100%;">
        <a href="javascript:;" class="atalho-menu visible-phone icon-th botao principal"> </a>

        <div class="busca borda-alpha">
            <form id="form-buscar" action="https://digitalonline.com.br/loja/buscar.php" method="get">
                <input type="text" name="s" placeholder="Digite o que você procura" value="<?php if (isset($_REQUEST['s'])) {echo $_REQUEST['s']; } ?>" autocomplete="off" />
                <button class="botao botao-busca icon-search fundo-secundario"></button>
            </form>
        </div>
    </div>
</div>