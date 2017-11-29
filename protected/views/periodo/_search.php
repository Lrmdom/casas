<?php
/* @var $this PeriodoController */
/* @var $model Periodo */
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
		<?php echo $form->label($model,'cod_casa'); ?>
		<?php echo $form->textField($model,'cod_casa'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'inicio'); ?>
		<?php echo $form->textField($model,'inicio',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'fim'); ?>
		<?php echo $form->textField($model,'fim',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'preco_semana'); ?>
		<?php echo $form->textField($model,'preco_semana',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'preco_dia'); ?>
		<?php echo $form->textField($model,'preco_dia',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'preco_fimsemana'); ?>
		<?php echo $form->textField($model,'preco_fimsemana',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'estadia_minima'); ?>
		<?php echo $form->textField($model,'estadia_minima'); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->