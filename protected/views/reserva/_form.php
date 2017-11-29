<?php
$this->renderPartial('//site/flashMessage');
?>


<div class="form container-fluid">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'reserva-form',
        'action' => Yii::app()->createUrl('reserva/update/' . $model->id),
        //  'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'clientOptions' => array('validateOnSubmit' => true,),
        'htmlOptions' => array(
            'role' => 'form',
            'class' => 'form-horizontal'
        )
    ));
    ?>
    <?php echo $form->errorSummary($model); ?>


    <div class="col-xs-12 col-md-4 col-lg-4">


        <?php echo $form->hiddenField($model, 'id'); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'reserva_state'); ?>
            <?php echo $form->dropDownList($model, 'reserva_state', CHtml::listData(ReservaState::model()->findAll(), 'id', 'state'), array('prompt' => 'Select Estado da Reserva', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'reserva_state'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'idcliente'); ?>
            <?php echo $form->dropDownList($model, 'idcliente', CHtml::listData(Cliente::model()->findAll(), 'clienteid', 'cliente'), array('prompt' => 'Select Cliente', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'idcliente'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->hiddenField($model, 'idpreco'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'valorSinal'); ?>
            <?php echo $form->textField($model, 'valorSinal', array('size' => 10, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'valorSinal'); ?>
        </div>


        <div id="divdadospagamento" class="row">

            <div class="form-group">
                <?php echo $form->labelEx($model, 'id_tipo_pagamento'); ?>
                <?php echo $form->dropDownList($model, 'id_tipo_pagamento', CHtml::listData(TipoPagamento::model()->findAll(), 'id', 'tipo_pagamento'), array('prompt' => 'Select Meio Pagamento', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'id_tipo_pagamento'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'id_pagamento'); ?>
                <?php echo $form->textField($model, 'id_pagamento', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'id_pagamento'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'valor'); ?>
                <?php echo $form->textField($model, 'valor', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'valor'); ?>
            </div>

        </div>
        <?php
        if ($model->reserva_state == Reserva::RESERVA):
            ?>
            <div class="alert alert-warning fMsg"></div>
            <script>

                $(function() {

                    $("#reserva-form :input").attr("disabled", true);
                    $(".buttonWrapper").hide();
                    $(".fMsg").html('Reserva não pode ser alterada. Estado PAGA!');
                });

            </script>

        <?php endif; ?>
        <div class="form-group">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t("content", "Criar") . " <span class='glyphicon glyphicon-floppy-save'></span>" : Yii::t("content", "Salvar") . " <span class='glyphicon glyphicon-floppy-save'></span>", array('id' => 'btreserv', 'class' => 'btreserv btn btn-lg btn-primary')); ?>

        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
    <div class="col-xs-12 col-md-4 col-lg-4">
        <div>
            <?php echo $this->renderPartial('//casa/_form_light', array('model' => $model->precos->casas,)); ?>
        </div>


    </div>
    <div class="col-xs-12 col-md-4 col-lg-4">

        <div>
            <?php echo $this->renderPartial('//preco/view', array('model' => $model->precos,)); ?>
            <?php echo $this->renderPartial('//reservaPayment/adminReserva', array('model' => new ReservaPayment(), 'reserva' => $model)); ?>
        </div>

    </div>

    <script>
        $(document).ready(function() {



            $('#divdadospagamento').hide();
            $('#divdadosreserva').hide();

            $('.but').button();

            $('#Preco_defaccao').change(function() {

                var accao = $(this).val();

                $('#accao').val(accao);
                if (accao == 'reserva')

                {
                    $('#divdadosreserva').show();
                    $('#Preco_livre').val(0).removeAttr('checked');
                }
                else
                {
                    $('#divdadosreserva').hide();
                    $('#Preco_livre').val(1).attr('checked', 'checked');
                }

            });
            $('#Reserva_reserva_state').change(function() {
                if ($('#Reserva_reserva_state').val() == 2 || $('#Reserva_reserva_state').val() == 4)

                {
                    $('#divdadospagamento').show();

                }
                else {
                    $('#divdadospagamento').hide();
                }
            });

            $('.but').button();
        });
    </script>