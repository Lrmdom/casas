<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'preco-form',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true,),
    //'enableAjaxValidation' => true,
    'action' => Yii::app()->createUrl('preco/new'),
        ));
?>
<div class="dPicker"></div>

<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">

    <?php echo $form->hiddenField($model, 'cod_casa', array('type' => "text", 'value' => $model->cod_casa)); ?>
</div>
<div class="row-fluid">

    <?php echo $form->hiddenField($model, 'id', array('type' => "text", 'value' => $model->id)); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'inicio'); ?>
    <?php echo $form->textField($model, 'inicio', array('size' => 50, 'maxlength' => 50, 'class' => 'datepick required form-control')); ?>
    <?php echo $form->error($model, 'inicio'); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'fim'); ?>
    <?php echo $form->textField($model, 'fim', array('size' => 50, 'maxlength' => 50, 'class' => 'datepick required form-control')); ?>
    <?php echo $form->error($model, 'fim'); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'preco'); ?>
    <?php echo $form->textField($model, 'preco', array('size' => 50, 'maxlength' => 50, 'class' => 'required form-control')); ?>
    <?php echo $form->error($model, 'preco'); ?>
</div>

<div class="form-group">
    <?php echo $form->hiddenField($model, 'livre'); ?>
    <?php echo $form->hiddenField($model, 'promo', array('type' => "text", 'value' => $model->promo)); ?>
</div>

<div class="form-group buttons buttonWrapper">
    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t("content", "Criar") . " <span class='glyphicon glyphicon-floppy-save'></span>" : Yii::t("content", "Salvar") . " <span class='glyphicon glyphicon-floppy-save'></span>", array('id' => 'btreserv', 'class' => 'btn btn-lg btn-primary')); ?>

</div>




<?php
$this->endWidget();

Yii::import('application.controllers.PrecoController');

PrecoController::actionCalendar($model->cod_casa, $model->id);
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
    });

</script>