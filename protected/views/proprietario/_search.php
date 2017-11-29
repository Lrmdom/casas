<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row-fluid">
		<?php echo $form->label($model,'propid'); ?>
		<?php echo $form->textField($model,'propid'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'proprietario'); ?>
		<?php echo $form->textField($model,'proprietario',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'senha'); ?>
		<?php echo $form->textField($model,'senha',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'telefone'); ?>
		<?php echo $form->textField($model,'telefone',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'morada'); ?>
		<?php echo $form->textField($model,'morada',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'cod_postal'); ?>
		<?php echo $form->textField($model,'cod_postal',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'localidade'); ?>
		<?php echo $form->textField($model,'localidade',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'conflito1'); ?>
		<?php echo $form->textField($model,'conflito1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'conflito2'); ?>
		<?php echo $form->textField($model,'conflito2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'conflito3'); ?>
		<?php echo $form->textField($model,'conflito3',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'sessid'); ?>
		<?php echo $form->textField($model,'sessid',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'pais'); ?>
		<?php echo $form->textField($model,'pais',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->