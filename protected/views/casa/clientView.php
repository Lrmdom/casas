<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.rating.css" />
<script>
    $(function() {
        $(".getTransDes").click(function() {
            alert($('.titulo').html());
            elem = ".titulo";
            $.ajax(
                    {
                        // The link we are accessing.
                        url: "<?php echo $this->createUrl("casa/translate") ?>",
                        // The type of request.
                        type: "post",
                        dataType: "json",
                        data: {lang: "<?php echo Yii::app()->getLanguage() ?>", text: $('.titulo').html()},
                        // The type of data that is getting returned.
                        dataType: "html",
                                error: function() {

                                },
                        beforeSend: function() {

                        },
                        complete: function() {

                        },
                        success: function(data) {

                            $(elem).html(data);
                        }
                    }
            );
            return false
        });
        $('.fi,.inic').change(function() {
            if (!$('.inic').val() || !$('.fi').val())
            {
            }
            else {
                $.get("<?php echo Yii::app()->createUrl('reserva/calculate/id/' . $model->cod_casa) ?>" + "?in=" + $('.inic').val() + "&out=" + $('.fi').val()
                        , function(result) {
                            obj = JSON.parse(result);

                            if (obj.result.preco)
                            {

                                $('.precoReserva').val(obj.result.preco);
                                $('.precoReservaDiv').html('Eur ' + obj.result.html);
                                $('.btreserv1').removeAttr('disabled');
                            }
                            else
                            {

                                $('.precoReservaDiv').html(obj.result.html);
                            }
                        });
            }
        });
        $('.contactheader').click(function() {
            $('.contactcasaform').toggle('slow');
        });
        $('.reservaheader').click(function() {
            $('.reservacasaform').toggle('slow');
        });
        $('.btMylistCreate').button({
            icons: {
                primary: "ui-icon-heart"
            }
        }).attr('title', 'Adcionar favoritos');
        $('.btAgVisitaCasa').button({
            icons: {
                primary: "ui-icon-clock"
            }
        }).attr('title', 'Agendar Visita');
        $('.btClassificaCasa').button({
            icons: {
                primary: "ui-icon-star"
            }
        }).attr('title', 'Classificar Casa');
        $('.divbuttons').css('display', 'block');
        $('.clientview ul li').mouseover(function() {
            $(this).toggleClass('ui-state-active');
        });
        $('.clientview ul li').mouseout(function() {
            $(this).toggleClass('ui-state-active');
        });
        $('#collapse5').on('shown.bs.collapse', function() {
            var center = map.getCenter();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        })


    });

</script>
<?php
$this->metaKeywords = Yii::t('content', CHtml::encode($model->seo_title, Yii::app()->getLanguage()), array(), 'db_i18n') . " . " . Yii::app()->name;
$this->metaDescription = Yii::t('content', CHtml::encode($model->seo_title, Yii::app()->getLanguage()), array(), 'db_i18n') . ", " . $model->localidade . ", " . $model->concelho;

$this->pageTitle = Yii::t('content', CHtml::encode($model->seo_title, Yii::app()->getLanguage()), array(), 'db_i18n') . " . " . Yii::app()->name;

$cn = new CNumberFormatter(Yii::app()->getLanguage());

$this->breadcrumbs = array(
    Yii::app()->name,
    Yii::t('content', CHtml::encode($model->seo_title, Yii::app()->getLanguage()), array(), 'db_i18n')
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.rating.js');

$this->renderPartial('//site/flashMessage');
?>
<div class="container-fluid sh scrollSpy">

    <?php if ($m != ""): ?>
        <div class="row">
            <div class="row text-center">

                <h3 class="dInline"><small><?php echo Yii::t('content', CHtml::encode($model->seo_title, Yii::app()->getLanguage()), array(), 'db_i18n'); ?></small></h3>
                <h2 class="dInline">
                    <small> # <?php echo $model->cod_casa; ?>
                    </small>
                </h2>
                <?php if ($model->certif == 1): ?>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Imovel certificado"><span class="glyphicon glyphicon-certificate icon-warning smallIcon"></span></a>
                <?php endif ?>
                <?php if ($model->certif_energ == 1): ?>
                    <a href="#" class="AcertifImg"><img class="certifImg" src="<?php echo Yii::app()->baseUrl . '/images/certificado_energ.jpg' ?>"/></a>
                    <strong class="certiflevel"><?php echo $model->certif_energ_level ?></strong>
                <?php endif ?>

            </div>
            <div class="col-xs-12 col-md-9 col-lg-9 panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title panel-title-blk">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Fotos
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">

                            <?php echo $this->renderPartial('clientUploadCasaImages', array('model' => $model)); ?>
                            <div class="titulo thumbnail">
                                <?php echo $model->titulo; ?>
                                <button class="btn btn-primary getTransDes" lang="<?php echo Yii::app()->getLanguage() ?>">Traduzir</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title panel-title-blk">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                Localizacao
                            </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div id="map" style="width: 100%; height: 300px; ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title panel-title-blk">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                Caracteristicas
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php echo $this->renderPartial('cliente_form', array('model' => $model, 'cod_casa' => $model->cod_casa, 'referer' => 'preco')); ?>


                        </div>
                    </div>
                </div>

                <?php if ($model->for_rent == 1): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title panel-title-blk">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    Precos
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php echo $this->renderPartial('//periodo/cliente_form', array('model' => new Periodo(), 'cod_casa' => $model->cod_casa, 'id' => $model->cod_casa)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title panel-title-blk">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseDispo">
                                    Disponibilidade
                                </a>
                            </h4>
                        </div>
                        <div id="collapseDispo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php echo $this->renderPartial('//preco/cliente_form', array('model' => new Preco(), 'cod_casa' => $model->cod_casa, 'modelCasa' => $model, 'referer' => 'casa')); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title panel-title-blk">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                Opinioes
                            </a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php echo $this->renderPartial('//feedback/index', array('model' => $model, 'cod_casa' => $model->cod_casa)); ?>
                        </div>
                    </div>
                </div>


            </div>



            <div class="col-xs-12 col-md-3 col-lg-3 panel-success">
                <div>
                    <?php if ($model->for_sale == 1): ?>
                        <div class=" alert alert-info"><i class="icon-info-sign"></i>Preço venda : <?php echo CHtml::encode($cn->formatCurrency($model->valor_venda, 'EUR')); ?>
                        </div>
                    <?php endif ?>
                    <?php if ($model->for_arrenda == 1): ?>
                        <div class="alert alert-info "><i class="icon-info-sign"></i>Preço arrendamento :<?php echo CHtml::encode($cn->formatCurrency($model->valor_arrendamento, 'EUR')); ?>
                        </div>
                    <?php endif ?>
                    <?php if ($model->caucao == 1): ?>
                        <div class=" alert alert-info "><i class="icon-info-sign"></i>Caução : <?php echo CHtml::encode($cn->formatCurrency($model->valorcaucao, 'EUR')); ?></div>
                    <?php endif ?>
                </div>
                <div class="panel-heading">
                    <h4 class="panel-title panel-title-blk">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                            Reservas e Contactos
                        </a>
                    </h4>
                </div>
                <div id="collapse6" class="panel-collapse collapse">

                    <?php
                    echo $this->renderPartial("clientHelper", array("model" => $model, "js" => $js, 'client' => $client))
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>



    <?php if ($m == ''): ?>

        <div data-spy="scroll" data-target=".navbar-example" class="row well-lg">
            <div class="navbar-example navbar-static affix">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#images"><?php echo Yii::t("content", "Imagens") ?></a></li>
                    <li role="presentation"><a href="#mp"><?php echo Yii::t("content", "Mapa") ?></a></li>
                    <li role="presentation"><a href="#amenities"><?php echo Yii::t("content", "Caraterísticas") ?></a></li>
                    <li role="presentation"><a href="#prc"><?php echo Yii::t("content", "Preços") ?></a></li>
                    <li role="presentation"><a href="#availab"><?php echo Yii::t("content", "Disponibilidades") ?></a></li>
                    <li role="presentation"><a href="#fdbks"><?php echo Yii::t("content", "Opiniões") ?></a></li>

                </ul>
            </div>

        </div>
        <?php if ($model->certif == 0): ?>
            <div class="alert alert-warning">
                <h4><span class="glyphicon glyphicon-info-sign"></span><?php echo Yii::t("content", "Casa não certificada. Não nos responsabilizamos pelas reservas. Todos os contatos e operaçãoes são feitas diretamente com anunciante.") ?></h4>

            </div>
        <?php endif; ?>
        <div class="hidden-xs col-md-9 col-lg-9 ">
            <div class="row well-sm" id="images">
                <?php echo $this->renderPartial('//casa/clientUploadCasaImages', array('model' => $model)); ?>

            </div>
            <div class=" well-lg">
            </div>

            <div class="text-center well well-sm">

                <h3 class="dInline"><small><?php echo Yii::t('content', CHtml::encode($model->seo_title, Yii::app()->getLanguage()), array(), 'db_i18n'); ?></small></h3>
                <h2 class="dInline">
                    <small> # <?php echo $model->cod_casa; ?>
                    </small>
                </h2>
                <?php if ($model->certif == 1): ?>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo Yii::t("content", "Imovel certificado") ?>"><span class="glyphicon glyphicon-certificate icon-warning smallIcon"></span></a>
                <?php endif ?>
                <?php if ($model->certif_energ == 1): ?>
                    <a href="#" class="AcertifImg"><img class="certifImg" src="<?php echo Yii::app()->baseUrl . '/images/certificado_energ.jpg' ?>"/></a>
                    <strong class="certiflevel"><?php echo $model->certif_energ_level ?></strong>
                <?php endif ?>

            </div>


        </div>

        <div class="hidden-xs col-md-3 col-lg-3 well-sm ">
            <div>
                <div class="thumbnail sh">
                    <?php if ($model->for_sale == 1): ?>
                        <div class=" alert alert-info"><?php echo Yii::t("content", "Preço venda:") ?><b><?php echo CHtml::encode($cn->formatCurrency($model->valor_venda, 'EUR')); ?></b>
                        </div>
                    <?php endif ?>
                    <?php if ($model->for_arrenda == 1): ?>
                        <div class="alert alert-info "><?php echo Yii::t("content", "Preço arrendamento:") ?><b><?php echo CHtml::encode($cn->formatCurrency($model->valor_arrendamento, 'EUR')); ?></b>
                        </div>
                    <?php endif ?>
                    <?php if ($model->caucao == 1): ?>
                        <div class=" alert alert-info "><?php echo Yii::t("content", "Caução:") ?> <b><?php echo CHtml::encode($cn->formatCurrency($model->valorcaucao, 'EUR')); ?></b></div>
                    <?php endif ?>
                </div>
                <?php
                echo $this->renderPartial("//casa/clientHelper", array("model" => $model, "js" => $js, 'client' => $client))
                ?>

                <div class="">
                    <?php echo $this->renderPartial('//preco/index', array('cod_casa' => $model->cod_casa, "helper" => 1)); ?>
                </div>
            </div>
        </div>

        <div class="hidden-xs col-md-12 col-lg-12 well-sm ">
            <div class="titulo thumbnail well well-lg">
                <?php echo $model->titulo; ?>

            </div>
            <div class="text-center well-sm">
                <button class="btn btn-primary getTransDes" lang="<?php echo Yii::app()->getLanguage() ?>"><?php echo Yii::t("content", "Traduzir") ?></button>
            </div>

            <div class="row well-sm" id="mp">
                <div id="map" style="width: 100%; height: 300px; " class="sh">
                </div>
            </div>
            <div class="row well-sm " id="amenities">
                <?php echo $this->renderPartial('//casa/cliente_form', array('model' => $model, 'cod_casa' => $model->cod_casa, 'referer' => 'preco')); ?>

            </div>
            <?php if ($model->for_rent == 1): ?>

                <div class="row well-sm" id="prc">
                    <div class="well well-sm">
                        <h4><?php echo Yii::t("content", "Preços aluguer longa duração") ?></h4>
                    </div>
                    <?php echo $this->renderPartial('//periodoLongo/adminClient', array('model' => new PeriodoLongo(), 'cod_casa' => $model->cod_casa, 'modelCasa' => $model, 'referer' => 'casa')); ?>

                </div>
                <div class="row well-sm">
                    <div class="well well-sm">
                        <h4><?php echo Yii::t("content", "Preços") ?></h4>
                    </div>
                    <?php echo $this->renderPartial('//periodo/adminClient', array('model' => new Periodo(), 'cod_casa' => $model->cod_casa, 'modelCasa' => $model, 'referer' => 'casa')); ?>

                </div>
                <div class="row well-sm" id="availab">
                    <div class="well well-sm">
                        <h4><?php echo Yii::t("content", "Disponibilidade") ?></h4>
                    </div>
                    <?php echo $this->renderPartial('//preco/cliente_form', array('model' => new Preco(), 'cod_casa' => $model->cod_casa, 'modelCasa' => $model, 'referer' => 'casa')); ?>

                </div>
            <?php endif ?>
            <div class="row well-sm" id="fdbks">
                <div class="well well-sm">
                    <h4><?php echo Yii::t("content", "Opiniões") ?></h4>
                </div>
                <?php echo $this->renderPartial('//feedback/index', array('model' => $model, 'cod_casa' => $model->cod_casa)); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
<script>
    var sOffset = $(".navbar-example").offset().top;
    var shareheight = $(".navbar-example").height() + 43;
    $(window).scroll(function() {
        var scrollYpos = $(document).scrollTop();
        if (scrollYpos > sOffset - shareheight) {
            $(".navbar-example").css({
                'top': '10px',
                'position': 'fixed'
            });
        } else {
            $(".navbar-example").css({
                'top': 'auto',
                'position': 'relative'
            });
        }
    });
    $(document).ready(function() {
        $("body").css("position", "relative");
        $("body").scrollspy({target: ".navbar-example", offset: 50});
    });
</script>