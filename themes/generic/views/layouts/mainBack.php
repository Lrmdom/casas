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
                            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
                            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
                            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.9.1.custom.css" />
                            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foffice.css" />

                            <!--[if lt IE 8]>
                        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
                        <![endif]-->
                            <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr-2.0.6.min.js"></script>
                            <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
                            <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.min.js"></script>
                            <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.js"></script>
                            <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validate.min.js"></script>
                            <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.simpleImageCheck.js"></script>
                            <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.livequery.min.js"></script>
                            <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/i18n/jquery.ui.datepicker-<?php echo Yii::app()->language . '.js' ?>"></script>
                            <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jqEasyCharCounter.min.js"></script>
                            <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/metisMenu.min.js"></script>
                            <script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sb-admin-2.js"></script>

                            <script src="https://maps.googleapis.com/maps/api/js?v=3&amp;key=<?php echo Yii::app()->params['mapsKey']; ?>&sensor=true" type="text/javascript"></script>
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
                                                <a class="navbar-brand" href="#">Project name</a>
                                            </div>
                                            <div class="navbar-collapse collapse">
                                                <ul class="nav navbar-nav navbar-right">
                                                    <li><a href="#">Dashboard</a></li>
                                                    <li><a href="#">Settings</a></li>
                                                    <li><a href="#">Profile</a></li>
                                                    <li><a href="#">Help</a></li>
                                                </ul>
                                                <form class="navbar-form navbar-right">
                                                    <input type="text" class="form-control" placeholder="Search...">
                                                </form>
                                            </div>
                                        </div>
                                    </div>



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
                                    <?php echo $content; ?>
                                </div>
                                <div class="clearfix"></div>
                                <div id="footer">
                                    Copyright &copy; <?php echo date('Y'); ?> Casas Da Praia.<br/>
                                    All Rights Reserved.<br/>
                                    Design & Development by Led
                                    <div class=" socicons">
                                        <div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="lucida grande"></div>
                                        <a href="https://www.facebook.com/casasda.praia"><img  src="/css/images/fb_1.png"/> </a>
                                        <a href='#'> <img src="/css/images/google_plus.png"/></a>
                                        <a href="http://www.linkedin.com/pub/casasdapraia-imoexcel-media%C3%A7%C3%A3o-imobili%C3%A1ria/62/726/777"><img  src="/css/images/linkedin.png"/></a>
                                        <a href="http://twitter.com/casasdapraia1"><img  src="/css/images/twitter_1.png"/></a>
                                    </div>
                                </div><!-- footer -->
                                <div id="loading">
                                    <img src="/images/712.GIF"/>
                                </div>

                                <?php
                                Yii::app()->clientScript->registerScript(
                                        'myHideEffect', '$(".flash-error,.flash-notice,.flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
                                );
                                ?>
                                <script>


                                    if ($(window).width() <= 768)
                                    {
                                        $('.mainNav').removeClass('nav-tabs');
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
                                        $("#Casa_fim").datepicker({dateFormat: "yy-mm- dd", beforeShow: function() {
                                                return{minDate:
                                                            $('#Casa_inicio').datepicker('getDate')
                                                }
                                            }
                                        });



                                        $.datepicker.setDefaults($.datepicker.regional['pt']);
                                        $(".datepick").datepicker($.datepicker.regional[ "<?php echo Yii::app()->language ?>" ]);
                                    });
                                </script>
                            </body>
                            </html>


