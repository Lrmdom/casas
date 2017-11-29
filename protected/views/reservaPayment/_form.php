<?php
/* @var $this ReservaPaymentsController */
/* @var $model ReservaPayments */
/* @var $form CActiveForm */


$idreserva = Yii::app()->getRequest()->getQuery('idreserva');
$idpreco = Yii::app()->getRequest()->getQuery('idpreco');
$cod_casa = Yii::app()->getRequest()->getQuery('casa');
$this->menu = array(
    array('label' => 'Gerir Casa', 'url' => array('//casa/admin')),
);
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'reserva-payment-form',
    // 'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'action' => Yii::app()->createUrl('reservaPayment/create', array('idreserva' => $idreserva, 'idpreco' => $idpreco, 'casa' => $cod_casa)),
        ));
?>
<p class="note"> </p>
<?php echo $form->errorSummary($model); ?>
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
    <?php echo $form->textField($model, 'valor', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'valor'); ?>
</div>

<?php echo $form->hiddenField($model, 'idpreco', array('value' => $idpreco)); ?>


<?php echo $form->hiddenField($model, 'idreserva', array('value' => $idreserva)); ?>
<div class="form-group buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t("content", "Criar") . " <span class='glyphicon glyphicon-floppy-save'></span>" : Yii::t("content", "Salvar") . " <span class='glyphicon glyphicon-floppy-save'></span>", array('id' => 'btreserv', 'class' => 'btreserv btn btn-lg btn-primary')); ?>

</div>

<?php $this->endWidget(); ?>

