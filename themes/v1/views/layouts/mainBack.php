<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="mobile-web-app-capable" content="yes">

                <meta name="apple-mobile-web-app-capable" content="yes">
                    <meta property="og:image" content='http://casasdapraia.pt/css/images/casasdapraia2_small.png' />
                    <meta property="og:description" content='Casas da Praia. Imóveis, alertas sobre imóveis e muito mais á distância de um click' />
                    <?php
                    Yii::app()->controller->widget('ext.seo.widgets.SeoHead', array(
                        'httpEquivs' => array(
                            'Content-Type' => 'text/html; charset=utf-8',
                            'Content-Language' => 'pt-PT'
                        ),
                        'defaultDescription' => 'This is a sample page description.',
                        'defaultKeywords' => 'these, are, my, default, sample, page, meta, keywords',
                    ));
                    ?>

                    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
                        <link rel="icon" href="/favicon.ico" type="image/x-icon">
                            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
                            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
                            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-ui-1.9.1.custom.css" />
                            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/boffice.css" />
                            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.css">

                                <!--[if lt IE 8]>
                            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
                            <![endif]-->
                                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr-2.0.6.min.js"></script>
                                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script>
                                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.min.js"></script>
                                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.form.js"></script>
                                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validate.min.js"></script>
                                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.simpleImageCheck.js"></script>
                                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.livequery.min.js"></script>
                                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/i18n/jquery.ui.datepicker-<?php echo Yii::app()->language . '.js' ?>"></script>
                                <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jqEasyCharCounter.min.js"></script>
                                <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script>

                                <script src="https://maps.googleapis.com/maps/api/js?v=3&amp;key=<?php echo Yii::app()->params['mapsKey']; ?>" type="text/javascript"></script>
                                <script type="text/javascript">
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

                                    <div id="page" class="container-fluid">


                                        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                                            <div class="container-fluid">
                                                <div class="navbar-header">
                                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                                        <span class="sr-only">Toggle navigation</span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                    </button>
                                                    <a class="navbar-brand" href="#"><img class="logo" src="/<?php echo Yii::app()->params['watermarkImg'] ?>" alt="<?php echo Yii::app()->name ?>"/></a>
                                                </div>
                                                <div class="navbar-collapse collapse">
                                                    <ul class="nav navbar-nav navbar-right">
                                                        <li><a href="<?php echo Yii::app()->createUrl('dashboard/index') ?>"><span class="glyphicon glyphicon-cog"></span> <?php echo Yii::t("content", "Painel Controlo") ?><span class="glyphicon glyphicon-bell icon-love"></span><span class="badge"><?php echo Casa::model()->dashboardAlerts(); ?></span></a></li>
                                                        <li><a href="<?php echo Yii::app()->createUrl('proprietario/view', array("id" => Yii::app()->user->id)) ?>"><span class="glyphicon glyphicon-user"></span> <?php echo Yii::t("content", "Perfil") ?></a></li>
                                                        <?php if (!Yii::app()->user->isGuest): ?>
                                                            <li><a><img class='img-circle' src="https://graph.facebook.com/<?php echo Yii::app()->user->fbid; ?>/picture?type=small"/></a></li>
                                                        <?php endif; ?>
                                                        <li><a href="<?php echo Yii::app()->createUrl('site/help') ?>"><span class="glyphicon glyphicon-question-sign"></span> <?php echo Yii::t("content", "Ajuda") ?></a></li>
                                                        <li><a href="<?php echo Yii::app()->createUrl('site/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> <?php echo Yii::t("content", "Saír") ?></a></li>
                                                        <li>
                                                            <?php $this->widget('ext.LangPick.ELangPick', array('id' => 'langs')); ?>
                                                        </li>
                                                    </ul>
                                                    <form class="navbar-form navbar-right">
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>




                                        <?php
                                        if (isset($this->breadcrumbs)) {

                                            $this->widget('zii.widgets.CBreadcrumbs', array(
                                                'links' => $this->breadcrumbs,
                                            ));
                                        }
                                        ?>

                                        <?php $this->renderPartial('//site/flashMessage'); ?>
                                        <?php echo $content; ?>



                                        <div id="footer">


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



                                        <script>
                                            function forSalePrice() {
                                                $('.modal-body').html("<?php echo Yii::t("content", "Não esquecer de verificar preço!") ?>");
                                                $('#fdkCreate').modal();
                                            }
                                            function showProp(id) {
                                                $('.modal-body').load("<?php echo Yii::app()->createUrl('proprietario/detailpartial') ?>/" + id);
                                                $('#fdkCreate').modal();
                                            }
                                            function showCasa(id) {
                                                $('.modal-body').load("<?php echo Yii::app()->createUrl('casa/clientdialog') ?>/" + id);
                                                $('#fdkCreate').modal();
                                            }
                                            function showReserva(id) {
                                                $('.modal-body').load("<?php echo Yii::app()->createUrl('reserva/load') ?>/" + id);
                                                $('#fdkCreate').modal();
                                            }
                                            function showClient(id) {
                                                $('.modal-body').load("<?php echo Yii::app()->createUrl('cliente/detailpartial') ?>/" + id);
                                                $('#fdkCreate').modal();
                                            }
                                            $(document).ready(function() {
                                                $(window).bind("load resize", function() {
                                                    topOffset = 50;
                                                    width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
                                                    if (width < 768) {
                                                        $('div.navbar-collapse').addClass('collapse')
                                                        topOffset = 100; // 2-row-menu
                                                    } else {
                                                        $('div.navbar-collapse').removeClass('collapse')
                                                    }

                                                    height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
                                                    height = height - topOffset;
                                                    if (height < 1)
                                                        height = 1;
                                                    if (height > topOffset) {
                                                        $("#page-wrapper").css("min-height", (height) + "px");
                                                    }
                                                });



                                                $(".datepick").datepicker({dateFormat: "yy-mm-dd"});


                                                $('#side-menu').metisMenu();

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

                                    <div class="dlg"></div>
                                </body>
                                </html>