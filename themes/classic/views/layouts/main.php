<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta property="og:image" content='http://casasdapraia.pt/css/images/casasdapraia2_small.png' />
        <meta property="og:description" content='Casas da Praia. Imóveis, alertas sobre imóveis e muito mais á distância de um click' />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
            <link rel="icon" href="/favicon.ico" type="image/x-icon">
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/normalize.css" media="screen, projection" />

                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
                <!--[if lt IE 8]>
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
                <![endif]-->
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
                <title><?php echo CHtml::encode($this->pageTitle); ?></title>
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-ui-1.9.1.custom.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/foffice.css" />
                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr-2.0.6.min.js"></script>
                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.min.js"></script>
                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.form.js"></script>
                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validate.min.js"></script>
                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.simpleImageCheck.js"></script>
                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.livequery.min.js"></script>
                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/i18n/jquery.ui.datepicker-<?php echo Yii::app()->language . '.js' ?>"></script>
                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jqEasyCharCounter.min.js"></script>
                </head>
                <body>
                    <div class="container" id="page">
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id))
                                    return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/pt_PT/all.js#xfbml=1&appId=790150834333514";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="tabbable tabs-below pull-right">
                            <ul class="nav nav-tabs nav-tabs-top">
                                <div class='langChooser pull-right '>
                                    <?php $this->widget('ext.LangPick.ELangPick', array('id' => 'langs')); ?>
                                </div>
                                <li><div class="pull-right socicons">
                                        <div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="lucida grande"></div>
                                        <a href="https://www.facebook.com/casasda.praia"><img  src="/css/images/fb_1.png"/> </a>
                                        <a href='#'> <img src="/css/images/google_plus.png"/></a>
                                        <a href="http://www.linkedin.com/pub/casasdapraia-imoexcel-media%C3%A7%C3%A3o-imobili%C3%A1ria/62/726/777"><img  src="/css/images/linkedin.png"/></a>
                                        <a href="http://twitter.com/casasdapraia1"><img  src="/css/images/twitter_1.png"/></a>
                                    </div>
                                </li>
                                <li class="active"><a  href="<?php echo Yii::app()->createUrl('cliente/infoToClients') ?>">Cliente</a></li>
                                <li class="active"><a  href="<?php echo Yii::app()->createUrl('proprietario/infotoowners') ?>">Proprietario</a></li>
                                <li class="active brandcolor"><a  href="<?php echo Yii::app()->createUrl('casa/create') ?>">Adicionar casa</a></li>
                            </ul>
                        </div>
                        <div id="header-links">
                            <div class="logo "><a href='<?php echo Yii::app()->createUrl('site/index') ?>' > <div id="logo" class="pull-left"><img src="/css/images/casasdapraia2.png"/></div> <div class="clearfix"></div></a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="header">
                            <?php echo Yii::app()->theme->baseUrl; ?>
                            <div class="navbar  navbar-inverse">
                                <div class="navbar-inner">
                                    <div class="containertest">
                                        <ul class="nav">
                                            <li><a href="<?php echo Yii::app()->createUrl('site/index') ?>"><i class=" icon-home icon-white"></i>Inicio</a></li>
                                            <li><a href="<?php echo Yii::app()->createUrl('site/page/view/about') ?>">Quem Somos</a></li>
                                            <li><a href="<?php echo Yii::app()->createUrl('site/contact') ?>">Contactos</a></li>
                                            <li class="dropdown" id="accountmenu">
                                                <?php if (Yii::app()->user->isGuest || Yii::app()->user->getState('isAdmin') == 'Back'): ?>
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cliente<b class="caret"></b></a>
                                                <?php endif; ?>
                                                <?php if (!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') == 'Front'): ?>
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user icon-white"></i>Hi <?php echo Yii::app()->user->name ?> <b class="caret"></b></a>
                                                <?php endif; ?>
                                                <ul class="dropdown-menu">
                                                    <?php if (Yii::app()->user->isGuest): ?>
                                                        <li><a href="<?php echo Yii::app()->createUrl('site/login') ?>">Login</a></li>
                                                        <li><a href="<?php echo Yii::app()->createUrl('cliente/register') ?>">Registrar-me</a></li>
                                                    <?php endif; ?>
                                                    <?php if (!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') == 'Front'): ?>
                                                        <li><?php echo CHtml::link('Minha Conta', Yii::app()->createUrl('//cliente/view', array('id' => Yii::app()->user->id))); ?>
                                                            <li><?php echo CHtml::link('Logout/Sair', Yii::app()->createUrl('//site/logout', array('id' => Yii::app()->user->id))); ?>
                                                            <?php endif; ?>
                                                            <?php if (!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') == 'Back'): ?>
                                                                <li><?php echo CHtml::link('Logout/Sair', Yii::app()->createUrl('//site/logout', array('id' => Yii::app()->user->id))); ?>
                                                                    <li>Está logado como proprietário. Faça logout.
                                                                    <?php endif; ?>
                                                                    </ul>
                                                                </li>
                                                                <li class="dropdown" id="accountmenuProp">
                                                                    <?php if (Yii::app()->user->isGuest || Yii::app()->user->getState('isAdmin') == 'Front'): ?>
                                                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Proprietário<b class="caret"></b></a>
                                                                    <?php endif; ?>
                                                                    <?php if (!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') == 'Back'): ?>
                                                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user icon-white"></i>Hi <?php echo Yii::app()->user->name ?> <b class="caret"></b></a>
                                                                    <?php endif; ?>
                                                                    <ul class="dropdown-menu">
                                                                        <?php if (Yii::app()->user->isGuest): ?>
                                                                            <li><a href="<?php echo Yii::app()->createUrl('site/loginOwner') ?>">Login</a></li>
                                                                            <li><a href="<?php echo Yii::app()->createUrl('proprietario/register') ?>">Registrar-me</a></li>
                                                                            <li><?php echo CHtml::link('Adicionar Casa', Yii::app()->createUrl('//site/loginOwner'), array('class' => '')); ?></li>
                                                                        <?php endif; ?>
                                                                        <?php if (Yii::app()->user->getState('isAdmin') == 'Back' || Yii::app()->user->isGuest): ?>
                                                                            <?php if (!Yii::app()->user->isGuest): ?>
                                                                                <li><?php echo CHtml::link('Hi ' . Yii::app()->user->name, Yii::app()->createUrl('//casa/admin'), array('class' => '', 'tag' => 'button')); ?></li>
                                                                                <li><?php echo CHtml::link('A minha Conta ', Yii::app()->createUrl('//casa/admin'), array('class' => '', 'tag' => 'button')); ?></li>
                                                                                <li><?php echo CHtml::link('Saír', Yii::app()->createUrl('//site/logout'), array('class' => '', 'tag' => 'button')); ?></li>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                        <?php if (!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') == 'Front'): ?>
                                                                            <li><?php echo CHtml::link('Logout/Sair', Yii::app()->createUrl('//site/logout', array('id' => Yii::app()->user->id))); ?>
                                                                                <li>Está logado como Cliente. Faça logout.
                                                                                <?php endif; ?>
                                                                                </ul>
                                                                            </li>
                                                                            <?php if (Yii::app()->user->isGuest || Yii::app()->user->getState('isAdmin') == 'Front'): ?>
                                                                                <li>
                                                                                    <form class="formautcplt navbar-form navbar-left" action="<?php echo Yii::app()->createUrl('//casa/search'); ?>" method="post" role="search">
                                                                                        <div class="input-append">
                                                                                            <input type="text" name="Casa[localidade]" class="autCpltSearch search-query form-control" placeholder="Para onde?  Nº da casa?" lenght="100"/>
                                                                                            <input type="hidden" id="caconc" name="Casa[concelho]" />
                                                                                            <button type="submit" class="btn btn-primary">Go</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </li>
                                                                            <?php endif; ?>
                                                                    </ul>
                                                                    </div>
                                                                    </div>
                                                                    </div>
                                                                    </div><!-- header -->
                                                                    <!-- mainmenu -->
                                                                    <?php if (isset($this->breadcrumbs)): ?>
                                                                        <?php
                                                                        $this->widget('zii.widgets.CBreadcrumbs', array(
                                                                            'links' => $this->breadcrumbs,
                                                                        ));
                                                                        ?><!-- breadcrumbs -->
                                                                    <?php endif ?>
                                                                    <?php if (Yii::app()->user->getState('isAdmin') == 'Front' || Yii::app()->user->isGuest): ?>
                                                                    <?php endif ?>
                                                                    <div class="clearfix"></div>
                                                                    <?php echo $content; ?>
                                                                    <div class="clear"></div>
                                                                    <div id="footer">
                                                                        Copyright &copy; <?php echo date('Y'); ?> Casas Da Praia.<br/>
                                                                        All Rights Reserved.<br/>
                                                                        Design & Development by Led
                                                                    </div><!-- footer -->
                                                                    </div><!-- page -->
                                                                    <script>
                                                                        //$('.accountBox').hide();
                                                                        $('#langs div').removeClass('portlet-content');
                                                                        $(document).ready(function() {
                                                                            $('input:submit, input:reset').each(function() {
                                                                                $(this).replaceWith('<button type="' + $(this).attr('type') + '"' + ' class="' + $(this).attr('class') + '" >' + $(this).val() + '</button>');
                                                                            });
                                                                            $('.himenu').click(function() {
                                                                                $('.accountBox').toggle('slow');
                                                                            }).mouseover(function() {
                                                                                $('.accountBox').show('slow');
                                                                            });
                                                                            $('.himenu').mouseover(function() {
                                                                                $('.accountBox').fadeIn('slow');
                                                                            });
                                                                            $('input:submit').addClass('but');
                                                                            $('.portlet-decoration').addClass('ui-widget-header');
                                                                            $('.portlet-content').addClass('ui-widget-content');
                                                                            $('.but').button();
                                                                            $('#f-search-submit').button({
                                                                                icons: {
                                                                                    primary: "ui-icon-search"
                                                                                }
                                                                            }).attr('title', 'Pesquisar');
                                                                            $(".autCpltSearch").autocomplete
                                                                                    ({
                                                                                        source: function(request, response)
                                                                                        {
                                                                                            if (jQuery.isNumeric(request.term))
                                                                                            {
                                                                                                $('.autCpltSearch').attr('name', 'Casa[cod_casa]');
                                                                                            }
                                                                                            $.ajax(
                                                                                                    {
                                                                                                        url: "<?php echo Yii::app()->createUrl('casa/AutocompleteSearch') ?>",
                                                                                                        data: {
                                                                                                            term: request.term
                                                                                                        },
                                                                                                        type: "POST", // POST transmits in querystring format (key=value&key1=value1) in utf-8
                                                                                                        dataType: "json", //return data in json format
                                                                                                        success: function(data)
                                                                                                        {
                                                                                                            response($.map(data, function(item)
                                                                                                            {
                                                                                                                if (typeof item.localidade == 'undefined') {
                                                                                                                    return{
                                                                                                                        label: "# " + item.cod_casa + " > " + item.tipoalojamento + " > " + item.tipo,
                                                                                                                        value: item.cod_casa
                                                                                                                    }
                                                                                                                }
                                                                                                                else
                                                                                                                {
                                                                                                                    return {
                                                                                                                        label: item.localidade + ' > ' + item.concelho + ' > ' + item.pais + '  (' + item.ncasas + ')',
                                                                                                                        value: item.localidade,
                                                                                                                        conc: item.concelho
                                                                                                                    }
                                                                                                                }
                                                                                                            }));
                                                                                                        }
                                                                                                    });
                                                                                        },
                                                                                        select: function(event, ui)
                                                                                        {   //"use strict";
                                                                                            $(this).val(ui.item.value);
                                                                                            $("#caconc").val(ui.item.conc);
                                                                                        },
                                                                                        minLength: 1
                                                                                    });
                                                                            /*  $(".autCpltSearch").(function(){
                                                                             $('#caconc').val($(this).val());
                                                                             alert($(this).val());
                                                                             }); */
                                                                            $('.searchBt').button({
                                                                                icons: {
                                                                                    secondary: 'ui-icon-search'
                                                                                }
                                                                            });
                                                                            $('.dropdown-toggle').dropdown();
                                                                            $.datepicker.setDefaults($.datepicker.regional['pt']);
                                                                            $('#tabs').removeClass('ui-widget-content');
                                                                            $('.ulStabs').removeClass('ui-widget-header');
                                                                        });
                                                                    </script>
                                                                    </body>
                                                                    </html>
