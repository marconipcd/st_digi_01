<?php

if ($_REQUEST['p']) {

    include_once("api.php");
    $p = buscarProduto($_REQUEST['p']);  
    $p = json_decode($p);
?>

    <!DOCTYPE html>
    <html lang="pt-br">


    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <head>
        <meta charset="utf-8">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <title><?php echo $p[0]->NOME; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="Loja Integrada" />

        <meta property="og:url" content="fone-headset-monoauricular-intelbras-ths-55-usb.html" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="LOJADIGITALONLINE" />
        <meta property="og:locale" content="pt_BR" />

        <!-- Metadata para o facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:title" content="FONE HEADSET MONOAURICULAR INTELBRAS THS 55 USB" />
        <meta property="og:image" content="<?php echo "fotos_produtos/" . $p->ENDERECO_FOTO; ?>" />
        <meta name="twitter:card" content="product" />
        <meta name="twitter:site" content="@None" />
        <meta name="twitter:creator" content="@None" />
        <meta name="twitter:domain" content="loja.digitalonline.com.br" />
        <meta name="twitter:url" content="fone-headset-monoauricular-intelbras-ths-55-usb6e0e.html?utm_source=twitter&amp;utm_medium=twitter&amp;utm_campaign=twitter" />
        <meta name="twitter:title" content="FONE HEADSET MONOAURICULAR INTELBRAS THS 55 USB" />
        <meta name="twitter:description" content="Veja mais detalhes sobre este produto acessando nossa loja." />
        <meta name="twitter:image" content="<?php echo "fotos_produtos/" . $p->ENDERECO_FOTO; ?>" />
        <meta name="twitter:label1" content="Código" />
        <meta name="twitter:data1" content="15132" />
        <meta name="twitter:label2" content="Disponibilidade" />
        <meta name="twitter:data2" content="1 dia útil" />

        <link rel="canonical" href="fone-headset-monoauricular-intelbras-ths-55-usb.html" />

        <meta name="description" content="Veja mais detalhes sobre este produto acessando nossa loja." />
        <meta property="og:description" content="Veja mais detalhes sobre este produto acessando nossa loja." />
        <meta name="robots" content="index, follow" />

        <link rel="shortcut icon" href="../cdn.awsli.com.br/962/962506/favicon/fe50452e60.png" />
        <link rel="icon" href="../cdn.awsli.com.br/962/962506/favicon/fe50452e60.png" sizes="192x192">
        <meta name="theme-color" content="">
        <link rel="stylesheet" href="../cdn.awsli.com.br/production/static/loja/estrutura/v1/css/all.minc947.css?v=7966cff" type="text/css">

        <!--[if lte IE 8]><link rel="stylesheet" href="https://cdn.awsli.com.br/production/static/loja/estrutura/v1/css/ie-fix.min.css" type="text/css"><![endif]-->
        <!--[if lte IE 9]><style type="text/css">.lateral-fulbanner { position: relative; }</style><![endif]-->

        <link href='http://fonts.googleapis.com/css?family=Open%20Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../cdn.awsli.com.br/production/static/loja/estrutura/v1/css/bootstrap-responsivec947.css?v=7966cff" type="text/css">
        <link rel="stylesheet" href="../cdn.awsli.com.br/production/static/loja/estrutura/v1/css/style-responsivec947.css?v=7966cff">
        <link rel="stylesheet" href="tema5761.css?v=20210503-051154">

        <script type="text/javascript">
            var LOJA_ID = 962506;
            var MEDIA_URL = "https://cdn.awsli.com.br/";
            var API_URL_PUBLIC = 'https://api.awsli.com.br/';
            var CARRINHO_PRODS = [];
            var ENVIO_ESCOLHIDO = 0;
            var ENVIO_ESCOLHIDO_CODE = 0;
            var CONTRATO_INTERNACIONAL = false;
            var CONTRATO_BRAZIL = !CONTRATO_INTERNACIONAL
        </script>

        <script src="../cdn.awsli.com.br/production/static/loja/estrutura/v1/js/all.minc947.js?v=7966cff"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="../cdn.awsli.com.br/production/static/css/jquery.fancybox.min.css" type="text/css" />
        <script src="../cdn.awsli.com.br/production/static/js/jquery/jquery.fancybox.pack.min.js"></script>

        <script type="text/javascript">
            var owa_baseUrl = 'https://analytics.awsli.com.br/';
            var owa_cmds = owa_cmds || [];
            owa_cmds.push(['setSiteId', 'loja-962506']);
            owa_cmds.push(['trackPageView']);
            (function() {
                var _owa = document.createElement('script');
                _owa.type = 'text/javascript';
                _owa.async = true;
                _owa.src = '../cdn.awsli.com.br/production/static/analytics/owa.minc947.js?v=7966cff';
                var _owa_s = document.getElementsByTagName('script')[0];
                _owa_s.parentNode.insertBefore(_owa, _owa_s);
            }());
        </script>

        <link rel="stylesheet" href="../cdn.awsli.com.br/production/static/loja/estrutura/v1/css/imagezoom.min.css" type="text/css">
        <script src="../cdn.awsli.com.br/production/static/loja/estrutura/v1/js/jquery.imagezoom.min.js"></script>

        <script type="text/javascript">
            var URL_PRODUTO_FRETE_CALCULAR = 'carrinho/frete.html';
            var variacoes = undefined;
            var grades = undefined;
            var imagem_grande = "<?php echo "fotos_produtos/" . $p->ENDERECO_FOTO; ?>";
            var produto_grades_imagens = {};
        </script>
        <script type="text/javascript" src="../cdn.awsli.com.br/production/static/loja/estrutura/v1/js/produto.minc947.js?v=7966cff"></script>

        <!-- Código do cabecalho -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155035129-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-155035129-1');
        </script>

        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '../www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-155035129-1', document.domain.replace(/^(www|store|loja)\./, ''));
            ga('require', 'displayfeatures');
            ga('set', 'ecomm_prodid', '15132');
            ga('set', 'ecomm_pagetype', 'product');
            ga('set', 'ecomm_totalvalue', '199.0000');
            ga('send', 'pageview');
        </script>

        <link href="../cdn.awsli.com.br/temasv2/263/__theme_custom1fa9.css?v=1542136055" rel="stylesheet" type="text/css">
        <script src="../cdn.awsli.com.br/temasv2/263/__theme_custom1fa9.js?v=1542136055"></script>
        <link rel="stylesheet" href="avancado5761.css?v=20210503-051154" type="text/css" />

    </head>

    <body class="pagina-produto produto-47233202   " data-spy="scroll" data-target=".navegacao" ontouchstart="">
        <div id="fb-root"></div>

        <div class="barra-inicial fundo-secundario">
            <div class="conteiner">
                <div class="row-fluid">
                    <div class="lista-redes span3 hidden-phone">

                    </div>
                    <div class="canais-contato span9">
                        <ul>
                            <li class="hidden-phone">
                                <a href="#modalContato" data-toggle="modal" data-target="#modalContato">
                                    <i class="icon-comment"></i>
                                    Fale Conosco
                                </a>
                            </li>
                            <li>
                                <span>
                                    <i class="icon-phone"></i>Telefone: (81) 3726-3125
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>




        <div class="conteiner-principal">
            <div id="cabecalho">

                <div class="atalhos-mobile visible-phone fundo-secundario borda-principal">
                    <ul>
                        <li><a href="index.php" class="icon-home"> </a></li>
                        <li class="fundo-principal"><a href="carrinho/index.html" class="icon-shopping-cart"> </a></li>
                        <li><a href="conta/loginb308.html" class="icon-user"> </a></li>
                        <li class="vazia"><span>&nbsp;</span></li>
                    </ul>
                </div>

                <div class="conteiner">
                    <div class="row-fluid">
                        <div class="span3">
                            <h2 class="logo cor-secundaria">
                                <a href="index.php" title="LOJADIGITALONLINE">
                                    <img src="../cdn.awsli.com.br/400x300/962/962506/logo/c06c85177e.png" alt="LOJADIGITALONLINE" />
                                </a>
                            </h2>
                        </div>

                        <div class="conteudo-topo span9">
                            <div class="superior row-fluid hidden-phone">
                                <div class="span8">
                                    <a href="conta/login.html" class="bem-vindo cor-secundaria">
                                        Bem-vindo, <span class="cor-principal">identifique-se</span> para fazer pedidos
                                    </a>
                                </div>
                                <div class="span4">
                                    <ul class="acoes-conta borda-alpha">
                                        <li>
                                            <i class="icon-list fundo-principal"></i>
                                            <a href="conta/logincddc.html" class="cor-secundaria">Meus Pedidos</a>
                                        </li>
                                        <li>
                                            <i class="icon-user fundo-principal"></i>
                                            <a href="conta/loginb308.html" class="cor-secundaria">Minha Conta</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <?php include_once("form-busca.php"); ?>

                        </div>
                    </div>

                    <?php
                        include_once("menu_categorias.php");
                    ?>
                </div>
                <span id="delimitadorBarra"></span>
            </div>

            <div class="secao-banners">
                <div class="conteiner">
                    <div class="row-fluid">
                        <div class="spanNone banner tarja">
                            <img src="../cdn.awsli.com.br/1140x1448/962/962506/banner/a12baf91ba.jpg" alt="Facilidades" />
                        </div>
                    </div>
                </div>
            </div>

            <div id="corpo">
                <div class="conteiner">
                    <div class="secao-principal row-fluid sem-coluna">
                        <div class="span12 produto" itemscope="itemscope" itemtype="http://schema.org/Product">
                            <div class="row-fluid">
                                <div class="span7">
                                    <div class="thumbs-vertical hidden-phone">
                                        <div class="produto-thumbs">
                                            <div id="carouselImagem" class="flexslider">
                                                <ul class="miniaturas slides">
                                                    <li>
                                                        <a href="javascript:;" title="FONE HEADSET MONOAURICULAR INTELBRAS THS 55 USB - Imagem 1" data-imagem-grande="<?php echo "fotos_produtos/" . $p->ENDERECO_FOTO; ?>" data-imagem-id="44298222">
                                                            <span>
                                                                <img src="<?php echo "fotos_produtos/" . $p[0]->ENDERECO_FOTO; ?>" alt="FONE HEADSET MONOAURICULAR INTELBRAS THS 55 USB - Imagem 1" data-largeimg="<?php echo "fotos_produtos/" . $p->ENDERECO_FOTO; ?>" data-mediumimg="<?php echo "fotos_produtos/" . $p->ENDERECO_FOTO; ?>" />
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="conteiner-imagem">
                                        <div>
                                            <a src="<?php echo "fotos_produtos/" . $p[0]->ENDERECO_FOTO; ?>" title="Ver imagem grande do produto" id="abreZoom" style="display: none;"><i class="icon-zoom-in"></i></a>
                                            <img src="<?php echo "fotos_produtos/" . $p[0]->ENDERECO_FOTO; ?>" alt="FONE HEADSET MONOAURICULAR INTELBRAS THS 55 USB" id="imagemProduto" itemprop="image" />
                                        </div>
                                    </div>
                                    <div class="produto-thumbs thumbs-horizontal hide">
                                        <div id="carouselImagem" class="flexslider visible-phone">
                                            <ul class="miniaturas slides">
                                                <li>
                                                    <a href="javascript:;" title="FONE HEADSET MONOAURICULAR INTELBRAS THS 55 USB - Imagem 1" data-imagem-grande="<?php echo "fotos_produtos/" . $p->ENDERECO_FOTO; ?>" data-imagem-id="44298222">
                                                        <span>
                                                            <img src="<?php echo "fotos_produtos/" . $p->ENDERECO_FOTO; ?>" alt="FONE HEADSET MONOAURICULAR INTELBRAS THS 55 USB - Imagem 1" data-largeimg="<?php echo "fotos_produtos/" . $p->ENDERECO_FOTO; ?>" data-mediumimg="<?php echo "fotos_produtos/" . $p->ENDERECO_FOTO; ?>" />

                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="visible-phone">

                                    </div>

                                    <!--googleoff: all-->

                                    <div class="produto-compartilhar">
                                        <div class="lista-redes">
                                            <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                                                <ul>
                                                    <li class="visible-phone">
                                                        <a href="https://api.whatsapp.com/send?text=FONE%20HEADSET%20MONOAURICULAR%20INTELBRAS%20THS%2055%20USB%20http%3A%2F%2Floja.digitalonline.com.br/fone-headset-monoauricular-intelbras-ths-55-usb" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                    </li>
                                                    <li class="hidden-phone">                                                   
                                                    </li>
                                                    <li class="fb-compartilhar">
                                                        <div class="fb-share-button" data-href="https://loja.digitalonline.com.br/fone-headset-monoauricular-intelbras-ths-55-usb" data-layout="button"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!--googleon: all-->

                                </div>
                                <div class="span5">
                                    <div class="principal">
                                        <div class="info-principal-produto">

                                            <div class="breadcrumbs borda-alpha ">
                                                <ul>
                                                    <li>
                                                        <a href="index.php"><i class="fa fa-folder"></i>Início</a>
                                                    </li>

                                                    <li>
                                                        <a href="#">eletrônicos</a>
                                                    </li>

                                                    <!-- <li>
                                                        <strong class="cor-secundaria">FONE HEADSET MONOAURICULAR INTELBRAS THS 55 USB</strong>
                                                    </li> -->
                                                </ul>
                                            </div>

                                            <h1 class="nome-produto titulo cor-secundaria" itemprop="name"><?php echo $p[0]->NOME; ?></h1>

                                            <div class="codigo-produto">
                                                <span class="cor-secundaria">
                                                    <b>Código: </b> <span itemprop="sku"><?php echo $p[0]->ID; ?></span>
                                                </span>

                                                <div class="hide trustvox-stars">
                                                    <a href="#comentarios" target="_self">
                                                        <div data-trustvox-product-code-js="47233202" data-trustvox-should-skip-filter="true" data-trustvox-display-rate-schema="true"></div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>










                                        <div class="acoes-produto disponivel SKU-15132" data-produto-id="47233202" data-variacao-id="">





                                            <div>

                                                <div class="preco-produto destaque-parcela com-promocao">







                                                    <!--
                                                    <div>
                                                        <span class="preco-parcela cor-principal">

                                                            <strong>12x</strong>

                                                            de
                                                            <strong class="cor-principal titulo">R$ 19,97</strong>

                                                        </span>
                                                    </div>
                                                    -->

                                                    <div>
                                                        <?php

                                                        if ($p[0]->PRECO_PROMOCIONAL_LOJA != null && $p[0]->PRECO_PROMOCIONAL_LOJA != "0.00") {
                                                        ?>

                                                            <s class="preco-venda ">
                                                                R$ <?php echo str_replace(".",",",$p[0]->VALOR_VENDA); ?>
                                                            </s>
                                                            <strong class="preco-promocional cor-principal ">
                                                                R$ <?php echo str_replace(".",",",$p[0]->PRECO_PROMOCIONAL_LOJA); ?>
                                                            </strong>

                                                        <?php
                                                        } else {
                                                        ?>
                                                            <strong class="preco-promocional cor-principal ">
                                                                R$ <?php echo str_replace(".",",",$p[0]->VALOR_VENDA); ?>
                                                            </strong>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>


                                                </div>

                                            </div>














                                            <div itemprop="offers" itemscope="itemscope" itemtype="http://schema.org/Offer">

                                                <meta itemprop="price" content="239.64" />

                                                <meta itemprop="priceCurrency" content="BRL" />
                                                <meta itemprop="availability" content="http://schema.org/LimitedAvailability" />
                                                <meta itemprop="itemCondition" itemtype="http://schema.org/OfferItemCondition" content="http://schema.org/NewCondition" />

                                            </div>



                                            <div class="comprar">


                                                <!--  <a href="carrinho/index.html" class="botao botao-comprar principal grande " rel="nofollow">
                                                    <i class="icon-shopping-cart"></i> Comprar
                                                </a>-->

                                                <span class="cor-secundaria disponibilidade-produto">

                                                    Estoque:
                                                    <b class="cor-principal">
                                                        1 dia útil
                                                    </b>

                                                </span>

                                            </div>


                                        </div>


                                        <span id="DelimiterFloat"></span>







                                        <div class="parcelas-produto borda-alpha padrao" data-produto-id="47233202">


                                            <ul class="accordion" id="formas-pagamento-lista-47233202">

                                                <li class="accordion-group">
                                                    <div class="accordion-heading">

                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#formas-pagamento-lista-47233202" href="#pagseguro_1_47233202">
                                                            <span class="text-parcelas pull-right cor-secundaria">Parcelas <span class="icon-chevron-down"></span></span>



                                                            <img src="../cdn.awsli.com.br/production/static/img/formas-de-pagamento/pagseguro-cardsc947.png?v=7966cff" alt="Aura, American Express, Visa, Diners, Mastercard, Hipercard, Elo" />



                                                        </a>

                                                    </div>

                                                    <div id="pagseguro_1_47233202" class="accordion-body collapse in">
                                                        <div class="accordion-inner">

                                                            <!--googleoff: all-->

                                                            <ul style="text-align: left;">
                                                                <li class="parcela p-1 sem-juros">
                                                                    <span class="cor-secundaria">
                                                                        <b class="cor-principal">1x</b>
                                                                        de R$ 
                                                <?php
                                                if ($p[0]->PRECO_PROMOCIONAL_LOJA != null && $p[0]->PRECO_PROMOCIONAL_LOJA != "0.00") {
                                                ?>                                                    
                                                    <strong class="preco-promocional cor-principal ">
                                                        R$ <?php echo str_replace(".",",",$p[0]->PRECO_PROMOCIONAL_LOJA); ?>
                                                    </strong>
                                                <?php
                                                } else {
                                                ?>
                                                    <strong class="preco-promocional cor-principal ">
                                                        R$ <?php echo str_replace(".",",",$p[0]->VALOR_VENDA); ?>
                                                    </strong>
                                                <?php
                                                }
                                                ?>
                                                                        <!--googleoff: all-->
                                                                        sem juros
                                                                        <!--googleon: all-->
                                                                    </span>
                                                                </li>
                                                            </ul>

                                                            <ul style="text-align: left;">                                                               


                                                            </ul>
                                                            <!--googleon: all-->
                                                        </div>
                                                    </div>

                                                </li>

                                            </ul>
                                            <div class="cep">

                                            </div>

                                        </div>










                                    </div>
                                </div>
                            </div>




                            <div class="row-fluid hide" id="comentarios-container">
                                <div class="span12">
                                    <div id="smarthint-product-position2"></div>
                                    <div id="blank-product-position2"></div>
                                    <div class="abas-custom">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="comentarios">
                                                <div id="facebook_comments">

                                                    <!-- <div class="fb-comments" data-href="https://loja.digitalonline.com.br/fone-headset-monoauricular-intelbras-ths-55-usb" data-width="100%" data-numposts="3" data-colorscheme="light"></div> -->

                                                </div>
                                                <div id="disqus_thread"></div>
                                                <div id="_trustvox_widget"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row-fluid">
                                <div class="span12">
                                    <div id="smarthint-product-position3"></div>
                                    <div id="blank-product-position3"></div>
                                    <div class="listagem com-caixa aproveite-tambem borda-alpha">
                                        <h4 class="titulo cor-secundaria">Produtos relacionados</h4>

                                        <ul>
                                            <li style="width: 100%;" class="listagem-linha">
                                                <ul class="row-fluid">


                                                <?php


                                                    include_once("api.php");
                                                    $p1 = listarProdutos();                                               

                                                    $produtos = json_decode($p1);
                                                        
                                                    $i = 1;
                                                    foreach ($produtos as $p) {
                                                        if($i < 5){
                                                ?>

                                                    <li class="span3">
                                                        <div class="listagem-item " itemprop="isRelatedTo" itemscope="itemscope" itemtype="http://schema.org/Product">
                                                            <a href="produto.php?p=<?php echo $p->ID; ?>" class="produto-sobrepor" title="FONE DE OUVIDO HEADSET FLOW BRANCO, OEX HS207" 
                                                            itemprop="url"></a>
                                                            <div class="imagem-produto">
                                                                <img src="<?php echo "fotos_produtos/" . $p->ENDERECO_FOTO; ?>" alt="<?php echo substr($p->NOME, 0, 40) . "..."; ?>" itemprop="image" content="../cdn.awsli.com.br/300x300/962/962506/produto/61412351/223ebb0002.jpg" />
                                                            </div>
                                                            <div class="info-produto" itemprop="offers" itemscope="itemscope" itemtype="http://schema.org/Offer">
                                                                <a href="produto.php?p=<?php echo $p->ID; ?>" class="nome-produto cor-secundaria" itemprop="name">
                                                                    <?php echo substr($p->NOME, 0, 40) . "..."; ?>
                                                                </a>
                                                                <div class="produto-sku hide">15233</div>

                                                                <div>
                                                                    <div class="preco-produto destaque-parcela ">

                                                                        <!--
                                                                        <div>
                                                                            <span class="preco-parcela cor-principal">
                                                                                <strong>12x</strong>
                                                                                de
                                                                                <strong class="cor-principal titulo">R$ 6,51</strong>
                                                                            </span>
                                                                        </div>
                                                                        -->
                                                                        <div>
                                                                            <strong class="preco-promocional cor-principal ">
                                                                                <?php if ($p->PRECO_PROMOCIONAL_LOJA != null && $p->PRECO_PROMOCIONAL_LOJA != "0.00") { ?>
                                                                                R$ <?php echo str_replace(".",",",$p->PRECO_PROMOCIONAL_LOJA); ?>
                                                                                <?php } else { ?>                                                                            
                                                                                R$ <?php echo str_replace(".",",",$p->VALOR_VENDA); ?>                                                                            
                                                                                <?php } ?>
                                                                            </strong>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="acoes-produto hidden-phone">
                                                                <a href="produto.php?p=<?php echo $p->ID; ?>" title="Ver detalhes do produto" class="botao botao-comprar principal">
                                                                    <i class="icon-search"></i>Ver mais
                                                                </a>
                                                            </div>
                                                            <div class="acoes-produto-responsiva visible-phone">
                                                                <a href="produto.php?p=<?php echo $p->ID; ?>" title="Ver detalhes do produto" class="tag-comprar fundo-principal">
                                                                    <span class="titulo">Ver mais</span>
                                                                    <i class="icon-search"></i>
                                                                </a>
                                                            </div>

                                                            <div class="bandeiras-produto">
                                                            </div>
                                                        </div>
                                                    </li>


                                                <?php $i++; } } ?>












                                                </ul>
                                            </li>



                                        </ul>


                                    </div>
                                </div>
                            </div>

                            <div id="smarthint-product-position4"></div>
                            <div id="blank-product-position4"></div>






                        </div>






                    </div>


                    <div class="secao-secundaria">

                        <div id="smarthint-product-position5"></div>
                        <div id="blank-product-position5"></div>

                    </div>
                </div>
            </div>






            <div id="rodape">

                
                <?php
                    include_once("newsletter.php");
                ?>


                <div class="pagamento-selos">
                    <div class="conteiner">
                        <div class="row-fluid">







                            <div class="span4 pagamento">
                                <span class="titulo cor-secundaria">Pague com</span>
                                <ul class="bandeiras-pagamento">

                                    <li><i class="icone-pagamento amex" title="amex"></i></li>

                                    <li><i class="icone-pagamento aura" title="aura"></i></li>

                                    <li><i class="icone-pagamento diners" title="diners"></i></li>

                                    <li><i class="icone-pagamento elo" title="elo"></i></li>

                                    <li><i class="icone-pagamento hipercard" title="hipercard"></i></li>

                                    <li><i class="icone-pagamento mastercard" title="mastercard"></i></li>

                                    <li><i class="icone-pagamento visa" title="visa"></i></li>

                                </ul>
                                <ul class="gateways-rodape">




                                </ul>
                            </div>





                            <div class="span4 selos ">
                                <span class="titulo cor-secundaria">Selos</span>
                                <ul>


                                    <li>
                                        <img src="../cdn.awsli.com.br/production/static/img/struct/stamp_encryptssl.png" alt="Site Seguro">
                                    </li>






                                </ul>
                            </div>







                        </div>
                    </div>
                </div>


            </div>





        </div>



        <div id="barraTopo" class="hidden-phone">
            <div class="conteiner">
                <div class="row-fluid">
                    <div class="span3 hidden-phone">
                        <h4 class="titulo">
                            <a href="index.php" title="LOJADIGITALONLINE" class="cor-secundaria">LOJADIGITALONLINE</a>
                        </h4>
                    </div>
                    <div class="span3 hidden-phone">
                        <div class="canais-contato">
                            <ul>
                                <li><a href="#modalContato" data-toggle="modal" data-target="#modalContato">
                                        <i class="icon-comment"></i>Fale Conosco</a>
                                </li>

                                <li>
                                    <a href="#modalContato" data-toggle="modal" data-target="#modalContato">
                                        <i class="icon-phone"></i>Tel: (81) 3726-3125
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="row-fluid">
                            <div class="busca borda-alpha span6">
                                <form action="#" method="get">
                                    <input type="text" name="q" placeholder="Digite o que você procura" />
                                    <button class="botao botao-busca botao-input icon-search fundo-secundario"></button>
                                </form>
                            </div>

                            <div class="span6 hidden-phone">



                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--googleoff: all-->

        <div id="modalWindow" class="modal hide">
            <div class="modal-body">
                <div class="modal-body">
                    Carregando conteúdo, aguarde...
                </div>
            </div>
        </div>

        <div id="modalAlerta" class="modal hide">
            <div class="modal-body"></div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="botao principal" rel="nofollow">Fechar</a>
            </div>
        </div>

        <div id="modalContato" class="modal hide" tabindex="-1" aria-labelledby="modalContatoLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
                <span class="titulo cor-secundaria">Fale Conosco</span>
                Preencha o formulário abaixo.
            </div>
            <form action="#" method="post" class="form-horizontal">
                <div class="modal-body borda-principal">
                    <div class="contato-loading">
                        <i class="icon-spin icon-refresh"></i>
                    </div>
                </div>
            </form>
        </div>






        <div id="AdicionarFavoritoSucessoModal" class="modal hide">
            <div class="modal-header">
                <span>Favorito adicionado</span>
            </div>
            <div class="modal-body">
                O produto foi adicionado com sucesso à sua <strong>Lista de Desejos</strong>.
            </div>
            <div class="modal-footer">
                <a class="botao" data-dismiss="modal" aria-hidden="true">Fechar</a>
                <a class="botao principal" href="conta/login.html">Visualizar Lista de Desejos</a>
            </div>
        </div>

        <div id="AdicionarFavoritoErroModal" class="modal hide">
            <div class="modal-header">
                <span class="titulo cor-secundaria">Erro ao adicionar favorito</span>
            </div>
            <div class="modal-body">
                <p>
                    O produto não foi adicionado com sucesso ao seus favoritos, por favor tente mais tarde.
                    para visualizar a lista de favoritos clique <a href="conta/login.html">aqui</a>.
                </p>
            </div>
            <div class="modal-footer">
                <a class="botao" data-dismiss="modal" aria-hidden="true">Fechar</a>
                <a class='botao principal' style="display: none;" id="AdicionarFavoritoLogin">Logar</a>
            </div>
        </div>






        <div id="avise-me-cadastro" style="display: none;">


            <div class="avise-me">
                <form action="#" method="POST" class="avise-me-form">
                    <span class="avise-tit">
                        Ops!
                    </span>
                    <span class="avise-descr">
                        Esse produto encontra-se indisponível.<br />
                        Deixe seu e-mail que avisaremos quando chegar.
                    </span>
                    <div class="avise-input">
                        <div class="controls controls-row">
                            <input class="span5 avise-nome" name="avise-nome" type="text" placeholder="Digite seu nome" />
                            <label class="span7">
                                <i class="icon-envelope avise-icon"></i>
                                <input class="span12 avise-email" name="avise-email" type="email" placeholder="Digite seu e-mail" />
                            </label>
                        </div>
                    </div>
                    <div class="avise-btn">
                        <input type="submit" value="Avise-me quando disponível" class="botao fundo-secundario btn-block" />
                    </div>
                </form>
            </div>


        </div>

        <div id="avise-me-sucesso" style="display: none;">
            <span class="avise-suc-tit cor-principal">
                Obrigado!
            </span>
            <span class="avise-suc-descr">
                Você receberá um e-mail de notificação, assim que esse produto estiver disponível em estoque
            </span>
        </div>










        <!--googleon: all-->









        <!-- Código do rodapé -->








        <script>
            window.fbAsyncInit = function() {

                if ($('meta[property="fb:app_id"]').length) {
                    FB.init({
                        appId: $('meta[property="fb:app_id"]').attr('content'),
                        xfbml: true,
                        version: 'v2.5'
                    });
                } else {
                    FB.init({
                        xfbml: true,
                        version: 'v2.5'
                    });
                }

            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "../connect.facebook.net/pt_BR/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

    </body>

    <!-- Mirrored from loja.digitalonline.com.br/fone-headset-monoauricular-intelbras-ths-55-usb by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 May 2021 18:09:07 GMT -->

    </html>



<?php
}
?>