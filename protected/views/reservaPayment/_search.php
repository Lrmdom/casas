<?php
/* @var $this ReservaPaymentsController */
/* @var $model ReservaPayments */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row-fluid">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'id_pagamento'); ?>
		<?php echo $form->textField($model,'id_pagamento',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'id_tipo_pagamento'); ?>
		<?php echo $form->textField($model,'id_tipo_pagamento',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'idpreco'); ?>
		<?php echo $form->textField($model,'idpreco'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'idreserva'); ?>
		<?php echo $form->textField($model,'idreserva'); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->