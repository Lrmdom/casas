<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prereserva-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textField($model,'data',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'expira'); ?>
		<?php echo $form->textField($model,'expira',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'expira'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'cod_casa'); ?>
		<?php echo $form->textField($model,'cod_casa',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'cod_casa'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'nm_mes'); ?>
		<?php echo $form->textField($model,'nm_mes',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nm_mes'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'n_semana'); ?>
		<?php echo $form->textField($model,'n_semana',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'n_semana'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'inicio'); ?>
		<?php echo $form->textField($model,'inicio',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'inicio'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'fim'); ?>
		<?php echo $form->textField($model,'fim',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'fim'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'preco'); ?>
		<?php echo $form->textField($model,'preco',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'preco'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'quinzena'); ?>
		<?php echo $form->textField($model,'quinzena',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'quinzena'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'Nome'); ?>
		<?php echo $form->textField($model,'Nome',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Nome'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'morada'); ?>
		<?php echo $form->textField($model,'morada',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'morada'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'telefone'); ?>
		<?php echo $form->textField($model,'telefone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'telefone'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'perguntas'); ?>
		<?php echo $form->textField($model,'perguntas',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'perguntas'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'sugestoes'); ?>
		<?php echo $form->textField($model,'sugestoes',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'sugestoes'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'Comentarios'); ?>
		<?php echo $form->textField($model,'Comentarios',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Comentarios'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'situacao'); ?>
		<?php echo $form->textField($model,'situacao',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'situacao'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'forma_pagamento'); ?>
		<?php echo $form->textField($model,'forma_pagamento'); ?>
		<?php echo $form->error($model,'forma_pagamento'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'sessionid'); ?>
		<?php echo $form->textField($model,'sessionid',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'sessionid'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'voto'); ?>
		<?php echo $form->textField($model,'voto'); ?>
		<?php echo $form->error($model,'voto'); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->