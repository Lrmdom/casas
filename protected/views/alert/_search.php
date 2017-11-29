<?php
/* @var $this AlertController */
/* @var $model Alert */
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
		<?php echo $form->label($model,'id_cliente'); ?>
		<?php echo $form->textField($model,'id_cliente'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'id_tipo_alojamento'); ?>
		<?php echo $form->textField($model,'id_tipo_alojamento'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'id_tipo'); ?>
		<?php echo $form->textField($model,'id_tipo'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'pessoas'); ?>
		<?php echo $form->textField($model,'pessoas'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'destino'); ?>
		<?php echo $form->textField($model,'destino'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'for_rent'); ?>
		<?php echo $form->textField($model,'for_rent'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'for_sale'); ?>
		<?php echo $form->textField($model,'for_sale'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'for_arrenda'); ?>
		<?php echo $form->textField($model,'for_arrenda'); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->