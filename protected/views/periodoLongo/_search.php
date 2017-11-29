<?php
/* @var $this PeriodoLongoController */
/* @var $model PeriodoLongo */
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
		<?php echo $form->textField($model,'inicio',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'fim'); ?>
		<?php echo $form->textField($model,'fim',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'preco_mes'); ?>
		<?php echo $form->textField($model,'preco_mes'); ?>
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