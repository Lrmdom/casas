<?php
$cn = new CNumberFormatter(Yii::app()->getLanguage());
if (isset($data->casa)) {
    $lists = $data;
    $data = $data->casa;
    $fav = 1;
}
?>

<div class="panel panel-info <?php echo $data->cod_casa ?> sh">
    <div class="panel-heading">

        <?php if ($data->certif == 1): ?>
            <a href="#" data-toggle="tooltip" data-placement="top" title="Imovel certificado"><span class="glyphicon glyphicon-certificate icon-warning smallIcon"></span></a>
        <?php endif ?>
        <span>
            <?php if ($data->for_rent == 1): ?>

                <a class='tip' href='#' data-toggle="tooltip" data-placement="top" title="Imovel aluguer de ferias">  <span  class="glyphicon glyphicon-map-marker smallIcon icon-trust"></span></a>
            <?php endif; ?>
        </span>
        <h3 class="panel-title panelSearch lead">#<strong><?php echo CHtml::encode($data->cod_casa); ?><a href="<?php echo Yii::app()->createUrl('casa/client', array('id' => $data->cod_casa, 'slug' => Casa::model()->createSlug(Yii::t('content', CHtml::encode($data->seo_title), array(), 'db_i18n')))) ?>"> <?php echo Yii::t('content', CHtml::encode($data->seo_title), array(), 'db_i18n') ?></a></strong></h3>

        <?php
        if (isset($data->priceByDate['result']['preco']) && NULL !== $data->priceByDate['result']['preco']) {
            echo "<span class='price alert-warning'> " . $cn->formatCurrency($data->priceByDate['result']['preco'], 'EUR') . " </span>";
        }
        ?>

        <span class="pull-right">
            <?php
            echo CHtml::ajaxLink(
                    '<span class="glyphicon glyphicon-eye-open icon-warning smallIcon"></span>', Yii::app()->createUrl('compare/create'), array('data' => array(
                    'Compare[cod_casa]' => $data->cod_casa,
                    'Compare[sessid]' => Yii::app()->session->getSessionID(),
                    'Compare[cliente]' => Yii::app()->user->id,
                ), 'type' => 'post',
                'dataType' => "json",
                'success' => 'js: function(data) {
                $(".CompareCount").html(data.count);
                 $(".btCompareCreate").on("click", function() {
            var cart = $(".compareList");
            var imgtodrag = $(this).parent().parent().parent().find("img").eq(0);
            if (imgtodrag) {
                var imgclone = imgtodrag.clone()
                        .offset({
                            top: imgtodrag.offset().top,
                            left: imgtodrag.offset().left
                        })
                        .css({
                            "opacity": "0.5",
                            "position": "absolute",
                            "height": "150px",
                            "width": "150px",
                            "z-index": "100"
                        })
                        .appendTo($("body"))
                        .animate({
                            "top": cart.offset().top + 10,
                            "left": cart.offset().left + 10,
                            "width": 75,
                            "height": 75
                        }, 2000, "easeInOutExpo");

                setTimeout(function() {
                    cart.effect("shake", {
                        times: 1
                    }, 200);
                }, 1000);

                imgclone.animate({
                    "width": 0,
                    "height": 0
                }, function() {
                    $(this).detach()
                });
            }
        });
                redirect = data.redirect
                if(data.status == "500")
                  alert("Já foi adicionada");
               if(data.status == "700")
                $(".CompareCount").html(data.count);
                  }'
                    ), array('class' => 'btCompareCreate',
                'data-toggle' => 'tooltip',
                'data-placement' => 'top',
                'title' => Yii::t("content", "Adicionar lista comparação")
                    )
            );
            if (isset($fav)) {

                echo CHtml::ajaxLink(
                        '<span class="glyphicon glyphicon-remove-circle icon-love smallIcon"></span>', Yii::app()->createUrl('mylist/delete'), array(
                    'type' => 'POST',
                    'success' => 'js:function(){$(".panel.panel-info.' . $data->cod_casa . '").fadeOut(500);var favs= $(".favcount").html();$(".favcount").html(favs-1);  }',
                    'data' => array('id' => $lists->id)
                ));
            } else {

                echo CHtml::ajaxLink(
                        '<span class="glyphicon glyphicon-heart-empty icon-love smallIcon"></span>', Yii::app()->createUrl('mylist/create'), array('data' => array(
                        'Mylist[cod_casa]' => $data->cod_casa,
                        'Mylist[sessid]' => Yii::app()->session->getSessionID(),
                        'Mylist[cliente]' => Yii::app()->user->id,
                    ), 'type' => 'post',
                    'dataType' => "json",
                    'success' => 'js: function(data) {
                $(".favcount").html(data.count);
                 $(".btMylistCreate").on("click", function() {
            var cart = $(".wishlist");
            var imgtodrag = $(this).parent().parent().parent().find("img").eq(0);
            if (imgtodrag) {
                var imgclone = imgtodrag.clone()
                        .offset({
                            top: imgtodrag.offset().top,
                            left: imgtodrag.offset().left
                        })
                        .css({
                            "opacity": "0.5",
                            "position": "absolute",
                            "height": "150px",
                            "width": "150px",
                            "z-index": "100"
                        })
                        .appendTo($("body"))
                        .animate({
                            "top": cart.offset().top + 10,
                            "left": cart.offset().left + 10,
                            "width": 75,
                            "height": 75
                        }, 2000, "easeInOutExpo");

                setTimeout(function() {
                    cart.effect("shake", {
                        times: 1
                    }, 200);
                }, 1000);

                imgclone.animate({
                    "width": 0,
                    "height": 0
                }, function() {
                    $(this).detach()
                });
            }
        });
                redirect = data.redirect
                if(data.status == "500")
                  alert("Já existe nos favoritos");
               if(data.status == "700")
                $(".favcount").html(data.count);
                  }'
                        ), array('class' => 'btMylistCreate',
                    'data-toggle' => 'tooltip',
                    'data-placement' => 'top',
                    'title' => 'Adicionar aos favoritos'
                        )
                );
            }
            ?>
            <?php if ($data->for_rent == 1): ?>
                <a data-toggle="tooltip"  data-placement="top"  title="Classificar" class="btClassificaCasa" href="<?php echo Yii::app()->createUrl('feedback/create', array('id' => $data->cod_casa)) ?>#"><span class="glyphicon glyphicon-star-empty icon-success smallIcon"></span></a>
            <?php endif; ?>
            <?php if ($data->for_sale == 1): ?>

                <a data-toggle="tooltip" data-placement="top" title="Agendar visita" class="btAgVisitaCasa" href="<?php echo Yii::app()->createUrl('visita/create', array('id' => $data->cod_casa)) ?>"><span class="glyphicon glyphicon-time icon-trust smallIcon"></span></a>
            <?php endif; ?>

        </span>
        <div class="clearfix"></div>

    </div>
    <div class="panel-body container-fluid row-fluid">

        <div class="col-xs-6 col-md-3"> <a href="<?php echo Yii::app()->createUrl('casa/client', array('id' => $data->cod_casa, 'slug' => Casa::model()->createSlug(Yii::t('content', CHtml::encode($data->seo_title), array(), 'db_i18n')))) ?>">
                <?php
                echo CHtml::image('/uploads/' . $data->img_1, '', array(
                    'class' => 'lazy img-polaroid img-responsive imgGridViewF sh thumbnail' . $data->cod_casa));
                ?>
            </a>
        </div>
        <div class="hidden-xs col-md-3">
            <p>
                <b class="colored"><?php echo CHtml::encode($data->tipoalojamento); ?></b> » <b class="colored"><?php echo CHtml::encode($data->tipo); ?></b>

            </p>
            <p>
                <?php echo CHtml::encode($data->getAttributeLabel('ano')); ?>:
                <b class="colored"><?php echo CHtml::encode($data->ano); ?></b>  <b class="colored"><?php echo CHtml::encode($data->ano); ?></b>

            </p>
            <p>
                <?php echo CHtml::encode($data->getAttributeLabel('destino')); ?>:
                <b class="colored"><?php echo CHtml::encode($data->destino); ?></b>
            </p>

        </div>
        <div class="hidden-xs col-md-3">
            <p>
                <?php echo CHtml::encode($data->getAttributeLabel('casasbanho')); ?>:
                <b class="colored"><?php echo CHtml::encode($data->casasbanho); ?></b>
            </p>
            <p>
                <?php echo CHtml::encode($data->getAttributeLabel('quartos')); ?>:
                <b class="colored"><?php echo CHtml::encode($data->quartos); ?></b>
            </p>
            <p>
                <?php echo CHtml::encode($data->getAttributeLabel('pessoas')); ?>:
                <b class="colored"><?php echo CHtml::encode($data->pessoas); ?></b>
            </p>
            <p>
                <?php echo CHtml::encode($data->getAttributeLabel('camascasal')); ?>:
                <b class="colored"><?php echo CHtml::encode($data->camascasal); ?></b>
            </p>
            <p>
                <?php echo CHtml::encode($data->getAttributeLabel('camassingle')); ?>:
                <b class="colored"> <?php echo CHtml::encode($data->camassingle); ?></b>
            </p>



        </div>
        <div class="col-xs-6 col-md-3">
            <div>
                <?php
                if ($data->for_sale == 1):
                    ?>
                    <h5 class="amt text-right">
                        <a class='tip' data-toggle="tooltip" data-placement="top" title="Imovel para venda" href="#"><span  class="glyphicon glyphicon-tag icon-love"></span></a>

                        <?php echo CHtml::encode($cn->formatCurrency($data->valor_venda, 'EUR')); ?>
                    </h5>
                <?php endif; ?>
                <?php if ($data->for_arrenda == 1): ?>
                    <h5 class="amt text-right">
                        <a class='tip' href='#' data-toggle="tooltip" data-placement="top" title="Imovel para arrendamento">   <span  class="glyphicon glyphicon-lock icon-love"></span></a>

                        <?php echo CHtml::encode($cn->formatCurrency($data->valor_arrendamento, 'EUR')); ?>
                    </h5>

                <?php endif; ?>
            </div>
            <div class="visible-xs">
                <p>
                    <b class="colored"><?php echo CHtml::encode($data->tipoalojamento); ?></b> » <b class="colored"><?php echo CHtml::encode($data->tipo); ?></b>

                </p>
                <p>
                    <?php echo CHtml::encode($data->getAttributeLabel('destino')); ?>:
                    <b class="colored"><?php echo CHtml::encode($data->destino); ?></b>
                </p>

            </div>


        </div>

        <div class="col-xs-offset-4 col-md-offset-10">

            <?php
            echo "(" . count($data->feedbacks) . ")";
            ?>
            <input  name="star<?php echo CHtml::encode($data->cod_casa); ?>" type="radio" class="star" value="1"/>
            <input  name="star<?php echo CHtml::encode($data->cod_casa); ?>" type="radio" class="star" value="2"/>
            <input  name="star<?php echo CHtml::encode($data->cod_casa); ?>" type="radio" class="star" value="3"/>
            <input  name="star<?php echo CHtml::encode($data->cod_casa); ?>" type="radio" class="star" value="4"/>
            <input  name="star<?php echo CHtml::encode($data->cod_casa); ?>" type="radio" class="star" value="5"/>

        </div>

        <div class="col-xs-12 col-md-12">
            <p><b class="colored"><?php echo CHtml::encode($data->localidade) ?></b> » <b class="colored"><?php echo CHtml::encode($data->concelho) ?></b> » <b class="colored"><?php echo CHtml::encode($data->pais); ?></b></p>
        </div>
    </div>
</div>



<script>

//    $('.panel-body').on('hover', [name = 'star<?php echo CHtml::encode($data->cod_casa); ?>'], function(event) {
//        $(this).rating('select',<?php echo Feedback::model()->GetFeedbackAvg($data->cod_casa) == 0 ? 4 : Feedback::model()->GetFeedbackAvg($data->cod_casa) - 1; ?>);
//    });
//    var timeoutId;
//    $('.panel-body').on('hover', ".imgGridViewF<?php echo $data->cod_casa ?>", function(event) {
//
//        if (!timeoutId) {
//            timeoutId = window.setTimeout(function() {
//                $(".dlg").dialog({autoOpen: false, position: {my: "center", at: "center", of: this},
//                    show: {
//                        effect: 'fade',
//                        duration: 200
//                    }}).siblings('.ui-dialog-titlebar').remove();
//                $(".dlg").dialog('open');
//                $(".dlg").load("<?php echo Yii::app()->createUrl('casa/clientdialog', array('id' => $data->cod_casa)) ?>");
//            }, 1000);
//        }
//    },
//            function() {
//                if (timeoutId) {
//                    window.clearTimeout(timeoutId);
//                    timeoutId = null;
//                }
//
//            });
//    $(".imgGridViewF<?php echo $data->cod_casa ?>,.dlg").mouseleave(function() {
//
//        // $(".dlg").empty();
//        $(".dlg").dialog("close");
//    });
//    if ($(window).width() <= 768)
//    {
//
//        $(".imgGridViewF<?php echo $data->cod_casa ?>").livequery(function() {
//            $('.imgGridViewF<?php echo $data->cod_casa ?>').off('mouseenter');
//        });
//    }

</script>