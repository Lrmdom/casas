<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo Yii::app()->getLanguage() ?>" lang="<?php echo Yii::app()->getLanguage() ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta property="og:image" content='http://casasdapraia.pt/css/images/casasdapraia2_small.png' />
            <meta property="og:description" content='Casas da Praia. Imóveis, férias' />

            <meta property="fb:app_id" content="<?php echo Yii::app()->params['fbAppId'] ?>"/>
            <meta property="og:type" content="place" />
            <meta property="og:title" content="<?php echo Yii::app()->name ?>" />
            <meta property="og:url" content="<?php echo Yii::app()->request->hostInfo ?>" />
            <meta property="og:site_name" content="<?php echo Yii::app()->request->hostInfo ?>" />

            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />

            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-ui-1.9.1.custom.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/foffice.css" />
            <?php
//            if (!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') == 'Back') {
//                $this->redirect($this->createUrl("proprietario/view", array('id' => Yii::app()->user->id)));
//            }
            Yii::app()->controller->widget('ext.seo.widgets.SeoHead', array(
                'httpEquivs' => array(
                    'Content-Type' => 'text/html; charset=utf-8',
                    'Content-Language' => Yii::app()->getLanguage(),
                ),
                'defaultDescription' => Yii::t("seo", "Imoveis e casas de ferias na praia"),
                'defaultKeywords' => Yii::t("seo", 'casas, algarve,ferias,algarve,praia'),
            ));

            $this->pageTitle = Yii::app()->name;
            ?>
            <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
                <link rel="icon" href="/favicon.ico" type="image/x-icon">

                    <link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>

                        <!--[if lt IE 8]>
                    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
                    <![endif]-->
                        <script   src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr-2.0.6.min.js"></script>
                        <script   src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script>
                        <script   src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.min.js"></script>
                        <script   src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.form.js"></script>
                        <script   src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validate.min.js"></script>
                        <script   src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.simpleImageCheck.js"></script>
                        <script   src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.livequery.min.js"></script>
                        <script   src="<?php echo Yii::app()->theme->baseUrl; ?>/js/i18n/jquery.ui.datepicker-<?php echo Yii::app()->language . '.js' ?>"></script>
                        <script   src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jqEasyCharCounter.min.js"></script>


                        <script src="https://maps.googleapis.com/maps/api/js?v=3&amp;key=<?php echo Yii::app()->params['mapsKey']; ?>&amp;sensor=true" ></script>
                        <script >
                            var _gaq = _gaq || [];
                            _gaq.push(['_setAccount', '<?php echo Yii::app()->params['analyticsKey']; ?>']);
                            _gaq.push(['_trackPageview']);
                            (function() {
                                var ga = document.createElement('script');
                                ga.type = 'text/javascript';
                                ga.async = true;
                                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                                var s = document.getElementsByTagName('script')[0];
                                s.parentNode.insertBefore(ga, s);
                            })();</script>
                        </head>
                        <body>

                            <div id="page" class="container" lang="<?php echo Yii::app()->getLanguage() ?>">
                                <div class="waitforprices">
                                    <div>
                                        <img src="/images/loader.GIF"/>
                                    </div>
                                </div>
                                <nav class="navbar-default topMenu" role="navigation">

                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href='<?php echo Yii::app()->createUrl('site/index') ?>'> <img class="logo" src="/<?php echo Yii::app()->params['watermarkImg'] ?>" alt="<?php echo Yii::app()->name ?>"/></a>
                                    </div>
                                    <div class="collapse navbar-collapse" id="collapse-1">



                                        <ul class="nav nav-tabs menu text-center navbar-right">
                                            <?php echo $this->renderPartial('//cliente/ext', array('id' => Yii::app()->user->id)); ?>

                                            <li><a href="<?php echo Yii::app()->createUrl('site/contact') ?>"><span class="glyphicon glyphicon-envelope"></span> <?php echo Yii::t('content', 'Contatos') ?></a>
                                            </li>

                                            <li>

                                                <?php if (Yii::app()->user->isGuest || Yii::app()->user->getState('isAdmin') == 'Back'): ?>
                                                    <a  href="#" class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown"> <span class="glyphicon glyphicon-user"></span> <?php echo Yii::t('content', 'Cliente') ?><span class="caret"></span></a>
                                                <?php endif; ?>
                                                <?php if (!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') == 'Front'): ?>
                                                    <a class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu2" href="#"><span class="glyphicon glyphicon-user"></span><?php echo Yii::t('content', 'ola') ?> <?php echo Yii::app()->user->name ?> <b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <?php if (Yii::app()->user->isGuest): ?>
                                                            <li><a href="<?php echo Yii::app()->createUrl('site/login') ?>"><?php echo Yii::t('content', 'Login') ?></a></li>
                                                            <li><a href="<?php echo Yii::app()->createUrl('cliente/register') ?>"><?php echo Yii::t('content', 'Registrar-me') ?></a></li>
                                                        <?php endif; ?>
                                                        <?php if (!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') == 'Front'): ?>
                                                            <li><?php echo CHtml::link(Yii::t('content', 'Minha Conta'), Yii::app()->createUrl('//cliente/view', array('id' => Yii::app()->user->id))); ?></li>
                                                            <li><?php echo CHtml::link(Yii::t('content', 'Sair'), Yii::app()->createUrl('//site/logout', array('id' => Yii::app()->user->id))); ?></li>
                                                        <?php endif; ?>
                                                        <?php if (!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') == 'Back'): ?>
                                                            <li><?php echo CHtml::link(Yii::t('content', 'Sair'), Yii::app()->createUrl('//site/logout', array('id' => Yii::app()->user->id))); ?></li>
                                                            <li class="text-danger"><?php echo Yii::t('content', 'Está logado como proprietário. Faça logout.') ?></li>
                                                        <?php endif; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                            <li>
                                                <?php if (Yii::app()->user->isGuest || Yii::app()->user->getState('isAdmin') == 'Front'): ?>
                                                    <a class="dropdown-toggle" id="dropdownMenu3" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user "></span> <?php echo Yii::t('content', ' Proprietário') ?><b class="caret"></b></a>
                                                <?php endif; ?>
                                                <?php if (!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') == 'Back'): ?>
                                                    <a class="dropdown-toggle" id="dropdownMenu3" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user "></span> Hi <?php echo Yii::app()->user->name ?> <b class="caret"></b></a>

                                                    <ul class="dropdown-menu">
                                                        <?php if (Yii::app()->user->isGuest): ?>
                                                            <li><a href="<?php echo Yii::app()->createUrl('site/loginOwner') ?>">Login</a></li>
                                                            <li><a href="<?php echo Yii::app()->createUrl('proprietario/register') ?>">Registrar-me</a></li>
                                                            <li><?php echo CHtml::link(Yii::t('content', 'Adicionar Casa'), Yii::app()->createUrl('//site/loginOwner'), array('class' => '')); ?></li>
                                                        <?php endif; ?>
                                                        <?php if (Yii::app()->user->getState('isAdmin') == 'Back' || Yii::app()->user->isGuest): ?>
                                                            <?php if (!Yii::app()->user->isGuest): ?>
                                                                <li><?php echo CHtml::link(Yii::t('content', 'ola') . Yii::app()->user->name, Yii::app()->createUrl('//casa/admin'), array('class' => '', 'tag' => 'button')); ?></li>
                                                                <li><?php echo CHtml::link(Yii::t('content', 'A minha Conta '), Yii::app()->createUrl('//casa/admin'), array('class' => '', 'tag' => 'button')); ?></li>
                                                                <li><?php echo CHtml::link(Yii::t('content', 'Saír'), Yii::app()->createUrl('//site/logout'), array('class' => '', 'tag' => 'button')); ?></li>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php if (!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') == 'Front'): ?>
                                                            <li><?php echo CHtml::link(Yii::t('content', 'Sair'), Yii::app()->createUrl('//site/logout', array('id' => Yii::app()->user->id))); ?>
                                                                <li><?php echo Yii::t('content', 'Está logado como Cliente. Faça logout') ?>
                                                                <?php endif; ?>
                                                                </ul>

                                                            <?php endif; ?>

                                                        </li>
                                                        <li>
                                                            <?php //$this->widget('ext.LangPick.ELangPick', array('id' => 'langs')); ?>

                                                        </li>

                                                        <?php if (!Yii::app()->user->isGuest): ?>
                                                        <?php endif; ?>
                                                </ul>

                                                </div>

                                                </nav>

                                                <div class="well-sm headerContacts col-md-offset-4 col-lg-offset-4">
                                                    <span class="glyphicon glyphicon-earphone "></span><span><?php echo Yii::app()->params["phone"] ?>

                                                        <span class="glyphicon glyphicon-phone "></span><span><?php echo Yii::app()->params["mobile"] ?>
                                                            <span class="glyphicon glyphicon-envelope"></span><span><?php echo Yii::app()->params["siteEmail"] ?></span>

                                                            </div>
                                                            <?php if (isset($this->breadcrumbs)): ?>
                                                                <?php
                                                                $this->widget('zii.widgets.CBreadcrumbs', array(
                                                                    'links' => $this->breadcrumbs,
                                                                ));
                                                                ?><!-- breadcrumbs -->
                                                            <?php endif ?>
                                                            <?php $this->renderPartial('//site/flashMessage'); ?>
                                                            <?php echo $content; ?>


                                                            <div class="clearfix"></div>

                                                            <div id="footer">
                                                                <?php echo $this->renderPartial("//site/footer"); ?>


                                                                Copyright &copy; <?php echo date('Y') . " " . Yii::app()->name ?> <br/>
                                                                All Rights Reserved.<br/>
                                                                Design & Development by Led
                                                                <div class=" socicons">
                                                                    <a href="<?php echo Yii::app()->params['fbPath'] ?>"><img  src="/css/images/fb_1.png"  alt="https://www.facebook.com/casasda.praia"/> </a>
                                                                    <a href='<?php echo Yii::app()->params['gplusPath'] ?>'> <img src="/css/images/google_plus.png" alt="google plus"/></a>
                                                                    <a href="<?php echo Yii::app()->params['linkeinPath'] ?>"><img  src="/css/images/linkedin.png" alt="http://www.linkedin.com/pub/casasdapraia-imoexcel-media%C3%A7%C3%A3o-imobili%C3%A1ria/62/726/777"/></a>
                                                                    <a href="<?php echo Yii::app()->params['twitterPath'] ?>"><img  src="/css/images/twitter_1.png" alt="http://twitter.com/casasdapraia1"/></a>
                                                                </div>
                                                            </div><!-- footer -->
                                                            <div id="loading">
                                                                <img src="/images/712.GIF" alt="loading"/>
                                                            </div>


                                                            <?php
                                                            Yii::app()->clientScript->registerScript(
                                                                    'myHideEffect', '$(".flash-error,.flash-notice,.flash-success").animate({opacity: 1.0}, 6000).fadeOut("slow");', CClientScript::POS_READY
                                                            );

                                                            if (Yii::app()->user->isGuest):
                                                                ?>
                                                                <script>


                                                                    $('#dropdownMenu2').on('click', function(e) {
                                                                        $.get("<?php echo Yii::app()->createUrl('site/login') ?>", function(data) {
                                                                            $('.modal-body').html(data);
                                                                        });
                                                                        e.preventDefault();
                                                                        $('#fdkCreate').modal();
                                                                    });
                                                                    $('#dropdownMenu3').on('click', function(e) {
                                                                        $.get("<?php echo Yii::app()->createUrl('site/loginowner') ?>", function(data) {
                                                                            $('.modal-body').html(data);
                                                                        });
                                                                        e.preventDefault();
                                                                        $('#fdkCreate').modal();
                                                                    });





                                                                </script>
                                                            <?php endif; ?>
                                                            <script>

                                                                function showProp(id) {
                                                                    $('.modal-body').load("<?php echo Yii::app()->createUrl('proprietario/detailpartial') ?>/" + $(this).text());
                                                                    $('#fdkCreate').modal();
                                                                }
                                                                if ($(window).width() <= 768)
                                                                {
                                                                    $(".imgGridView").livequery(function() {
                                                                        $('.imgGridView').off('mouseenter');
                                                                    });
                                                                }

                                                                $(document).ready(function() {


                                                                    $('#loading')
                                                                            .hide()
                                                                            .ajaxStart(function(elem) {

                                                                                $(this).show().position({my: "bottom center", at: "bottom center", of: elem.target});
                                                                            })
                                                                            .ajaxStop(function() {
                                                                                $(this).fadeOut(1000)
                                                                            }).ajaxError(function() {
                                                                        $(this).fadeOut(1000)
                                                                    });
                                                                    $('input:submit, input:reset').each(function() {
                                                                        $(this).replaceWith('<button type="' + $(this).attr('type') + '"' + ' class="' + $(this).attr('class') + '" >' + $(this).val() + '</button>');
                                                                    });
                                                                    $('input:submit').addClass('but');
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
                                                                                                                label: "# " + item.cod_casa + " » " + item.tipoalojamento + " » " + item.tipo,
                                                                                                                value: item.cod_casa
                                                                                                            }
                                                                                                        }
                                                                                                        else
                                                                                                        {
                                                                                                            return {
                                                                                                                label: item.localidade + ' » ' + item.concelho + ' » ' + item.pais + '  (' + item.ncasas + ')',
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
                                                                    $('.searchBt').button({
                                                                        icons: {
                                                                            secondary: 'ui-icon-search'
                                                                        }
                                                                    });
                                                                    $('.datepick').change(function() {
                                                                        if ($('#inicio').val() != '' && $('#fim').val() != '') {
                                                                            $('#search-quick').attr('action', '<?php echo Yii::app()->createUrl('//casa/searchByDate') ?>');
                                                                        }
                                                                    });
                                                                    $("#datepickStart").datepicker({dateFormat: "yy-mm-dd", beforeShow: function() {
                                                                            return{minDate:
                                                                                        new Date()
                                                                                        //$('#Casa_inicio').datepicker('getDate')
                                                                            }
                                                                        }
                                                                    });
                                                                    $("#datepickEnd").datepicker({dateFormat: "yy-mm-dd", beforeShow: function() {
                                                                            return{minDate:
                                                                                        $('#datepickStart').datepicker('getDate')
                                                                            }
                                                                        }
                                                                    });
                                                                    $("#Casa_inicio").datepicker({dateFormat: "yy-mm-dd", beforeShow: function() {
                                                                            return{minDate:
                                                                                        new Date()
                                                                                        //$('#Casa_inicio').datepicker('getDate')
                                                                            }
                                                                        }
                                                                    });
                                                                    $("#Casa_fim").datepicker({dateFormat: "yy-mm-dd", beforeShow: function() {
                                                                            return{minDate:
                                                                                        $('#Casa_inicio').datepicker('getDate')
                                                                            }
                                                                        }
                                                                    });



                                                                    $.datepicker.setDefaults($.datepicker.regional['pt']);
                                                                    $(".datepick").datepicker($.datepicker.regional[ "<?php echo Yii::app()->language ?>" ]);
                                                                });
                                                            </script>
                                                            <div class="modal fade" id="fdkCreate" tabindex="-1" role="dialog"  aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            </div>


                                                            <script type='text/javascript'>
                                                                (function() {
                                                                    var done = false;
                                                                    var script = document.createElement('script');
                                                                    script.async = true;
                                                                    script.type = 'text/javascript';
                                                                    script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript';
                                                                    document.getElementsByTagName('HEAD').item(0).appendChild(script);
                                                                    script.onreadystatechange = script.onload = function(e) {
                                                                        if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
                                                                            var w = new PCWidget({c: '93e84db5-55e9-4c6e-81ae-c0533f3464c2', f: true});
                                                                            done = true;
                                                                        }
                                                                    };
                                                                })();
                                                            </script>
                                                            <div class="dlg"></div>
                                                            </body>
                                                            </html>
