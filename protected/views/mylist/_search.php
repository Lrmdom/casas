<?php
/* @var $this MylistController */
/* @var $model Mylist */
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
		<?php echo $form->label($model,'mylistcol'); ?>
		<?php echo $form->textField($model,'mylistcol',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'sessid'); ?>
		<?php echo $form->textField($model,'sessid',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'cliente'); ?>
		<?php echo $form->textField($model,'cliente',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'data'); ?>
		<?php echo $form->textField($model,'data',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->