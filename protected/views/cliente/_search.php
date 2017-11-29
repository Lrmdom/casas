<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row-fluid">
		<?php echo $form->label($model,'clienteid'); ?>
		<?php echo $form->textField($model,'clienteid'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'cliente'); ?>
		<?php echo $form->textField($model,'cliente',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'senha'); ?>
		<?php echo $form->textField($model,'senha',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'senha_repeat'); ?>
		<?php echo $form->textField($model,'senha_repeat',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'telefone'); ?>
		<?php echo $form->textField($model,'telefone',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'morada'); ?>
		<?php echo $form->textField($model,'morada',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'cod_postal'); ?>
		<?php echo $form->textField($model,'cod_postal',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'localidade'); ?>
		<?php echo $form->textField($model,'localidade',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'conflito1'); ?>
		<?php echo $form->textField($model,'conflito1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'conflito2'); ?>
		<?php echo $form->textField($model,'conflito2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'conflito3'); ?>
		<?php echo $form->textField($model,'conflito3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'sessid'); ?>
		<?php echo $form->textField($model,'sessid',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'pais'); ?>
		<?php echo $form->textField($model,'pais',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'subscribe_newsletter'); ?>
		<?php echo $form->textField($model,'subscribe_newsletter'); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->