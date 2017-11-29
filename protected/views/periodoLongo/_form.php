<?php
/* @var $this PeriodoLongoController */
/* @var $model PeriodoLongo */
/* @var $form2 CActiveForm */
?>
<?php $this->renderPartial('//site/flashMessage'); ?>


<?php
$form2 = $this->beginWidget('CActiveForm', array(
    'id' => 'periodo-longo-form2',
    'action' => $this->createUrl('periodoLongo/create'),
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
        ));
?>
<?php echo $form2->errorSummary($model); ?>

<?php echo $form2->hiddenField($model, 'cod_casa', array('value' => $cod_casa)); ?>

<div class="form-group">
    <?php echo $form2->labelEx($model, 'inicio'); ?>
    <?php echo $form2->textField($model, 'inicio', array('size' => 12, 'maxlength' => 12, 'id' => 'PeriodoLongo_inicio', 'class' => 'datepick required form-control')); ?>
    <?php echo $form2->error($model, 'inicio'); ?>
    <i class=" icon-calendar"></i>
</div>
<div class="form-group">
    <?php echo $form2->labelEx($model, 'fim'); ?>
    <?php echo $form2->textField($model, 'fim', array('size' => 12, 'maxlength' => 12, 'id' => 'PeriodoLongo_fim', 'class' => 'datepick  required form-control')); ?>
    <?php echo $form2->error($model, 'fim'); ?>
    <i class=" icon-calendar"></i>
</div>
<div class="form-group">
    <?php echo $form2->labelEx($model, 'preco_mes'); ?>
    <?php echo $form2->textField($model, 'preco_mes', array('size' => 15, 'maxlength' => 45, 'class' => 'form-control')); ?>
    <?php echo $form2->error($model, 'preco_mes'); ?>
</div>
<div class="form-group">
    <?php echo $form2->labelEx($model, 'estadia_minima'); ?>
    <?php echo $form2->textField($model, 'estadia_minima', array('size' => 15, 'maxlength' => 45, 'class' => 'form-control')); ?>
    <?php echo $form2->error($model, 'estadia_minima'); ?>
</div>
<div class="form-group buttons buttonWrapper">
    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t("content", "Criar") . " <span class='glyphicon glyphicon-floppy-save'></span>" : Yii::t("content", "Salvar") . " <span class='glyphicon glyphicon-floppy-save'></span>", array('class' => 'btn btn-lg btn-primary')); ?>
</div>
<?php $this->endWidget(); ?>

<script>

    $('#PeriodoLongo_inicio').datepicker({minDate: 0, numberOfMonths: [1, 2], stepMonths: 2, showOtherMonths: false, firstDay: 1, changeFirstDay: false, showButtonPanel: true, dateFormat: 'yy-mm-dd'
    });
    $('#PeriodoLongo_fim').datepicker({numberOfMonths: [1, 2], stepMonths: 2, showOtherMonths: false, firstDay: 1, changeFirstDay: false, showButtonPanel: true, dateFormat: 'yy-mm-dd', beforeShow: function() {
            return{minDate:
                        $('#PeriodoLongo_inicio').datepicker('getDate'),
                maxDate:
                        $('#PeriodoLongo_inicio').datepicker('getDate') + '+30d'}
        }
    });


</script>
