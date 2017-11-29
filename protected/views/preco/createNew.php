<div class="container-fluid">
    <div class="col-xs-12 col-sm-6 colmd-6 col-lg-6">
        <?php if (isset($cod_casa)): ?>
            <h4><?php echo Yii::t("content", "Criar promoção") . Yii::t("content", " casa ") . $cod_casa ?></h4>
            <?php
            Yii::import('application.controllers.CasaController');
            echo $this->renderPartial("//casa/_form_light", array("model" => CasaController::loadModel($cod_casa)));
        endif;
        ?>
    </div>
    <div class="col-xs-12 col-sm-6 colmd-6 col-lg-6">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'preco-form',
            'enableClientValidation' => true,
            'clientOptions' => array('validateOnSubmit' => true,),
            //'enableAjaxValidation' => true,
            'action' => Yii::app()->createUrl('preco/new'),
        ));
        ?>
        <?php echo $form->errorSummary($model); ?>

        <?php if (isset($cod_casa)): ?>
            <div class="form-group">
                <?php echo $form->hiddenField($model, 'cod_casa', array('value' => $cod_casa)); ?>
                <?php echo $form->error($model, 'cod_casa'); ?>
            </div>
            <?php
            Yii::import('application.controllers.PrecoController');

            PrecoController::actionCalendar($cod_casa, 0);
            ?>
            <script>
                $(document).ready(function() {
                    $('.dPicker').datepicker({minDate: 0, beforeShowDay: Days, numberOfMonths: [1, 3], stepMonths: 1, showOtherMonths: false, firstDay: 1, changeFirstDay: false, showButtonPanel: false, dateFormat: 'yy-mm-dd'
                    });
                    $('#Preco_inicio').datepicker({minDate: 0, beforeShowDay: Days, numberOfMonths: [1, 2], stepMonths: 2, showOtherMonths: false, firstDay: 1, changeFirstDay: false, showButtonPanel: true, dateFormat: 'yy-mm-dd'
                    });
                    $('#Preco_fim').datepicker({beforeShowDay: Days, numberOfMonths: [1, 2], stepMonths: 2, showOtherMonths: false, firstDay: 1, changeFirstDay: false, showButtonPanel: true, dateFormat: 'yy-mm-dd', beforeShow: function() {
                            return{minDate:
                                        $('#Preco_inicio').datepicker('getDate'),
                                maxDate:
                                        $('#Preco_inicio').datepicker('getDate') + '+30d'}
                        }
                    });
                });</script>
        <?php else : ?>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'cod_casa'); ?>
                <?php echo $form->dropDownList($model, 'cod_casa', CHtml::listData(Casa::model()->findAll("activo=1 and propid $uid"), 'cod_casa', "idTitle"), array('prompt' => Yii::t("content", "Escolha uma casa"), "class" => "form-control", "value" => $cod_casa)); ?>
                <?php echo $form->error($model, 'cod_casa'); ?>
            </div>

        <?php endif; ?>


        <div class="form-group">
            <?php echo $form->labelEx($model, 'inicio'); ?>
            <?php echo $form->textField($model, 'inicio', array('size' => 50, 'maxlength' => 50, 'class' => 'datepick required form-control inic')); ?>
            <?php echo $form->error($model, 'inicio'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'fim'); ?>
            <?php echo $form->textField($model, 'fim', array('size' => 50, 'maxlength' => 50, 'class' => 'datepick required form-control fim')); ?>
            <?php echo $form->error($model, 'fim'); ?>
        </div>
        <div class="precoReservaDiv"></div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'preco'); ?>
            <?php echo $form->textField($model, 'preco', array('size' => 50, 'maxlength' => 50, 'class' => 'required form-control precoReserva')); ?>
            <?php echo $form->error($model, 'preco'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->hiddenField($model, 'livre', array('type' => "text", 'value' => 1)); ?>
            <?php echo $form->hiddenField($model, 'promo', array('type' => "text", 'value' => 1)); ?>
        </div>

        <div class="form-group buttons buttonWrapper">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t("content", "Criar") . " <span class='glyphicon glyphicon-floppy-save'></span>" : Yii::t("content", "Salvar") . " <span class='glyphicon glyphicon-floppy-save'></span>", array('id' => 'btreserv', 'class' => 'btn btn-lg btn-primary')); ?>

        </div>
        <?php $this->endWidget(); ?>
    </div>
    <div class="mydiv"></div>
    <script>
        $(document).ready(function() {

            $('#Preco_cod_casa').change(function() {
                window.location = '<?php echo $this->createUrl("preco/newCasa") ?>' + '/' + $(this).val();

            });

            $('#Preco_inicio,#Preco_fim').change(function() {

                if (!$('.inic').val() || !$('.fim').val())
                {
                }
                else {
                    $.get("<?php echo Yii::app()->createUrl('reserva/calculate/id/' . $cod_casa) ?>" + "?in=" + $('.inic').val() + "&out=" + $('.fim').val()
                            , function(result) {
                                obj = JSON.parse(result);

                                if (obj.result.preco)
                                {

                                    $('.precoReserva').val(obj.result.preco);
                                    $('.precoReservaDiv').html('Eur ' + obj.result.html);
                                }
                                else
                                {

                                    $('.precoReservaDiv').html(obj.result.html);
                                }
                            });
                }

            });



        });

    </script>

</div>