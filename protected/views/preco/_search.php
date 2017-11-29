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
		<?php echo $form->label($model,'ano'); ?>
		<?php echo $form->textField($model,'ano'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'nm_mes'); ?>
		<?php echo $form->textField($model,'nm_mes',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'n_semana'); ?>
		<?php echo $form->textField($model,'n_semana'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'cod_casa'); ?>
		<?php echo $form->textField($model,'cod_casa'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'inicio'); ?>
		<?php echo $form->textField($model,'inicio',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'fim'); ?>
		<?php echo $form->textField($model,'fim',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'preco'); ?>
		<?php echo $form->textField($model,'preco'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'livre'); ?>
		<?php echo $form->checkBox($model,'livre'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'reservar'); ?>
		<?php echo $form->textField($model,'reservar',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'promo'); ?>
		<?php echo $form->checkBox($model,'promo'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'paga'); ?>
		<?php echo $form->checkBox($model,'paga'); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->