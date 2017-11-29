<?php
/* @var $this EstadiaMinimaController */
/* @var $model EstadiaMinima */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estadia-minima-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'estadia_min'); ?>
		<?php echo $form->textField($model,'estadia_min',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'estadia_min'); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->