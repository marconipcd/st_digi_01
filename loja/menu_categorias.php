<div class="menu superior">
    <ul class="nivel-um">

        <?php

        include_once("api.php");
        $categorias = listarCategorias();
        $categorias = json_decode($categorias);

        foreach ($categorias as $categoria) {
        ?>

            <li class="categoria-id-4529461  borda-principal">
                <a href="https://digitalonline.com.br/loja/categoria/index.php?c=<?php echo $categoria->ID; ?>&&n=<?php echo $categoria->NOME; ?>" title="acessórios">
                    <strong class="titulo cor-secundaria"><?php echo $categoria->NOME; ?></strong>
                </a>
            </li>

        <?php
        }
        ?>

    </ul>
</div>