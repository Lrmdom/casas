<div class="col-xs-12 col-md-3 col-lg-3">
    <div class="panel panel-info <?php echo $model->cod_casa ?>">

        <div class="panel-heading">
            <a class="panel-title"><?php echo Yii::t("content", "Casa: ") . $model->cod_casa ?></a>
            <?php
            echo CHtml::ajaxLink(
                    '<span class="glyphicon glyphicon-remove-circle icon-love smallIcon"></span>', Yii::app()->createUrl('compare/delete'), array(
                'type' => 'POST',
                'success' => 'js:function(){$(".panel.panel-info.' . $data->cod_casa . '").fadeOut(500);var compares= $(".CompareCount").html();$(".CompareCount").html(compares-1);  }',
                'data' => array('id' => $data->id),
                "htmlOptions" => array("class" => "pull-right", 'data-toggle' => 'tooltip',
                    'data-placement' => 'top',
                    'title' => Yii::t("content", "Remover de comparação")
            )));

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
            ?>


        </div>
        <div class="panel-body">
            <div class="form-group">
                <img class="img-responsive" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_1); ?>"/>
            </div>
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'casa-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    "class" => "form-horizontal",
                    'validateOnSubmit' => true),
            ));
            ?>
            <div class="form-group">
                <?php echo $form->hiddenField($model, 'cod_casa', array('size' => 5, 'maxlength' => 50)); ?>
                <?php echo $form->label($model, 'destino'); ?>
                <?php echo $model->destino; ?>
                <?php echo $form->hiddenField($model, 'propid', array('size' => 5, 'maxlength' => 50, 'value' => Yii::app()->user->id)); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label($model, 'tipoalojamento'); ?>
                <?php echo $model->tipoalojamento; ?>
            </div>
            <div class="form-group">
                <?php echo $form->label($model, 'tipo'); ?>
                <?php echo $model->tipo; ?>
            </div>
            <div class="form-group">
                <?php echo $form->label($model, 'ano'); ?>
                <?php echo $model->ano; ?>
            </div>

            <?php if (($model->for_rent || $model->for_arrenda)): ?>
                <div class="form-group">
                    <?php echo $form->label($model, 'pessoas'); ?>
                    <?php echo $model->pessoas; ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'quartos'); ?>
                    <?php echo $model->quartos; ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'camascasal'); ?>
                    <?php echo $model->camascasal; ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'camassingle'); ?>
                    <?php echo $model->camassingle; ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'casasbanho'); ?>
                    <?php echo $model->casasbanho; ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label($model, 'altitude'); ?>
                    <?php echo $model->altitude; ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'dist_centro'); ?>
                    <?php echo $model->dist_centro; ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'dist_praia'); ?>
                    <?php echo $model->dist_praia; ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label($model, 'piscina'); ?>
                    <?php echo $form->checkBox($model, 'piscina'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'televisao'); ?>
                    <?php echo $form->checkBox($model, 'televisao'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'ar_condicionado'); ?>
                    <?php echo $form->checkBox($model, 'ar_condicionado'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'roupascama'); ?>
                    <?php echo $form->checkBox($model, 'roupascama'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'roupasbanho'); ?>
                    <?php echo $form->checkBox($model, 'roupasbanho'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'despertador'); ?>
                    <?php echo $form->checkBox($model, 'despertador'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'dvd'); ?>
                    <?php echo $form->checkBox($model, 'dvd'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'limpeza'); ?>
                    <?php echo $form->checkBox($model, 'limpeza'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'utilcozinha'); ?>
                    <?php echo $form->checkBox($model, 'utilcozinha'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'fogao'); ?>
                    <?php echo $form->checkBox($model, 'fogao'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'frigorif'); ?>
                    <?php echo $form->checkBox($model, 'frigorif'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'congel'); ?>
                    <?php echo $form->checkBox($model, 'congel'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'forno'); ?>
                    <?php echo $form->checkBox($model, 'forno'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'barbecue'); ?>
                    <?php echo $form->checkBox($model, 'barbecue'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'microndas'); ?>
                    <?php echo $form->checkBox($model, 'microndas'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'mlavaloica'); ?>
                    <?php echo $form->checkBox($model, 'mlavaloica'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label($model, 'mlavaroupa'); ?>
                    <?php echo $form->checkBox($model, 'mlavaroupa'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'aqcentral'); ?>
                    <?php echo $form->checkBox($model, 'aqcentral'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'satcabo'); ?>
                    <?php echo $form->checkBox($model, 'satcabo'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'internet'); ?>
                    <?php echo $form->checkBox($model, 'internet'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'deficientes'); ?>
                    <?php echo $form->checkBox($model, 'deficientes'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'outros_servicos'); ?>
                    <?php echo $form->checkBox($model, 'outros_servicos'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label($model, 'fengomar'); ?>
                    <?php echo $form->checkBox($model, 'fengomar'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'estacionamento'); ?>
                    <?php echo $form->checkBox($model, 'estacionamento'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'telefone'); ?>
                    <?php echo $form->checkBox($model, 'telefone'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'torradeira'); ?>
                    <?php echo $form->checkBox($model, 'torradeira'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'animais'); ?>
                    <?php echo $form->checkBox($model, 'animais'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'fumadores'); ?>
                    <?php echo $form->checkBox($model, 'fumadores'); ?>
                </div>

                <?php echo $form->label($model, 'golf'); ?>
                <?php echo $form->checkBox($model, 'golf'); ?>
                <?php echo $form->label($model, 'tenis'); ?>
                <?php echo $form->checkBox($model, 'tenis'); ?>
                <?php echo $form->label($model, 'pesca'); ?>
                <?php echo $form->checkBox($model, 'pesca'); ?>
                <?php echo $form->label($model, 'natacao'); ?>
                <?php echo $form->checkBox($model, 'natacao'); ?>
                <?php echo $form->label($model, 'bowling'); ?>
                <?php echo $form->checkBox($model, 'bowling'); ?>
                <?php echo $form->label($model, 'casino'); ?>
                <?php echo $form->checkBox($model, 'casino'); ?>
                <?php echo $form->label($model, 'cinema'); ?>
                <?php echo $form->checkBox($model, 'cinema'); ?>
                <?php echo $form->label($model, 'discoteca'); ?>
                <?php echo $form->checkBox($model, 'discoteca'); ?>


            <?php endif ?>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

