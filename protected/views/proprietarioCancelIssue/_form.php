<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proprietario-cancel-issue-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'propid'); ?>
		<?php echo $form->textField($model,'propid'); ?>
		<?php echo $form->error($model,'propid'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model,'descricao',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->