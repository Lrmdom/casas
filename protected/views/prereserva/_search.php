<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row-fluid">
		<?php echo $form->label($model,'n_prereserva'); ?>
		<?php echo $form->textField($model,'n_prereserva'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'data'); ?>
		<?php echo $form->textField($model,'data',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'expira'); ?>
		<?php echo $form->textField($model,'expira',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'cod_casa'); ?>
		<?php echo $form->textField($model,'cod_casa',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'nm_mes'); ?>
		<?php echo $form->textField($model,'nm_mes',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'n_semana'); ?>
		<?php echo $form->textField($model,'n_semana',array('size'=>45,'maxlength'=>45)); ?>
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
		<?php echo $form->label($model,'preco'); ?>
		<?php echo $form->textField($model,'preco',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'quinzena'); ?>
		<?php echo $form->textField($model,'quinzena',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'Nome'); ?>
		<?php echo $form->textField($model,'Nome',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'morada'); ?>
		<?php echo $form->textField($model,'morada',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'telefone'); ?>
		<?php echo $form->textField($model,'telefone',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'perguntas'); ?>
		<?php echo $form->textField($model,'perguntas',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'sugestoes'); ?>
		<?php echo $form->textField($model,'sugestoes',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'Comentarios'); ?>
		<?php echo $form->textField($model,'Comentarios',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'situacao'); ?>
		<?php echo $form->textField($model,'situacao',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'forma_pagamento'); ?>
		<?php echo $form->textField($model,'forma_pagamento'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'sessionid'); ?>
		<?php echo $form->textField($model,'sessionid',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'voto'); ?>
		<?php echo $form->textField($model,'voto'); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->