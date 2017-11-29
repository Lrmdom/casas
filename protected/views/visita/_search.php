<?php
/* @var $this VisitaController */
/* @var $model Visita */
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
		<?php echo $form->label($model,'cliente'); ?>
		<?php echo $form->textField($model,'cliente'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'cod_casa'); ?>
		<?php echo $form->textField($model,'cod_casa'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'data'); ?>
		<?php echo $form->textField($model,'data',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'hora'); ?>
		<?php echo $form->textField($model,'hora',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->