<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row-fluid">
		<?php echo $form->label($model,'cod_casa'); ?>
		<?php echo $form->textField($model,'cod_casa'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'adicionado'); ?>
		<?php echo $form->textField($model,'adicionado'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'data_activo'); ?>
		<?php echo $form->textField($model,'data_activo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'destino'); ?>
		<?php echo $form->textField($model,'destino',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'proprietario'); ?>
		<?php echo $form->textField($model,'proprietario',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'designacao'); ?>
		<?php echo $form->textField($model,'designacao',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'tipoalojamento'); ?>
		<?php echo $form->textField($model,'tipoalojamento',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'pessoas'); ?>
		<?php echo $form->textField($model,'pessoas',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'pais'); ?>
		<?php echo $form->textField($model,'pais',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'distrito'); ?>
		<?php echo $form->textField($model,'distrito',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'concelho'); ?>
		<?php echo $form->textField($model,'concelho',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'endereco'); ?>
		<?php echo $form->textField($model,'endereco',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'codpostal'); ?>
		<?php echo $form->textField($model,'codpostal',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'lat'); ?>
		<?php echo $form->textField($model,'lat',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'lng'); ?>
		<?php echo $form->textField($model,'lng',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'altitude'); ?>
		<?php echo $form->textField($model,'altitude',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'localidade'); ?>
		<?php echo $form->textField($model,'localidade',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'dist_centro'); ?>
		<?php echo $form->textField($model,'dist_centro',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'dist_praia'); ?>
		<?php echo $form->textField($model,'dist_praia',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'piscina'); ?>
		<?php echo $form->checkBox($model,'piscina'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'televisao'); ?>
		<?php echo $form->checkBox($model,'televisao'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'ar_condicionado'); ?>
		<?php echo $form->checkBox($model,'ar_condicionado'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'img_1'); ?>
		<?php echo $form->textField($model,'img_1',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'alt_img_1'); ?>
		<?php echo $form->textField($model,'alt_img_1',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'img_2'); ?>
		<?php echo $form->textField($model,'img_2',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'img_3'); ?>
		<?php echo $form->textField($model,'img_3',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'img_4'); ?>
		<?php echo $form->textField($model,'img_4',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'img_5'); ?>
		<?php echo $form->textField($model,'img_5',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'img_6'); ?>
		<?php echo $form->textField($model,'img_6',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'img_7'); ?>
		<?php echo $form->textField($model,'img_7',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'img_8'); ?>
		<?php echo $form->textField($model,'img_8',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'quartos'); ?>
		<?php echo $form->textField($model,'quartos'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'camascasal'); ?>
		<?php echo $form->textField($model,'camascasal'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'camassingle'); ?>
		<?php echo $form->textField($model,'camassingle'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'casasbanho'); ?>
		<?php echo $form->textField($model,'casasbanho'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'golf'); ?>
		<?php echo $form->checkBox($model,'golf'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'tenis'); ?>
		<?php echo $form->checkBox($model,'tenis'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'pesca'); ?>
		<?php echo $form->checkBox($model,'pesca'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'natacao'); ?>
		<?php echo $form->checkBox($model,'natacao'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'bowling'); ?>
		<?php echo $form->checkBox($model,'bowling'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'casino'); ?>
		<?php echo $form->checkBox($model,'casino'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'cinema'); ?>
		<?php echo $form->checkBox($model,'cinema'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'discoteca'); ?>
		<?php echo $form->checkBox($model,'discoteca'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'outras_actividprox'); ?>
		<?php echo $form->textArea($model,'outras_actividprox',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'roupascama'); ?>
		<?php echo $form->checkBox($model,'roupascama'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'roupasbanho'); ?>
		<?php echo $form->checkBox($model,'roupasbanho'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'limpeza'); ?>
		<?php echo $form->checkBox($model,'limpeza'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'utilcozinha'); ?>
		<?php echo $form->checkBox($model,'utilcozinha'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'fogao'); ?>
		<?php echo $form->checkBox($model,'fogao'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'frigorif'); ?>
		<?php echo $form->checkBox($model,'frigorif'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'congel'); ?>
		<?php echo $form->checkBox($model,'congel'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'forno'); ?>
		<?php echo $form->checkBox($model,'forno'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'barbecue'); ?>
		<?php echo $form->checkBox($model,'barbecue'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'microndas'); ?>
		<?php echo $form->checkBox($model,'microndas'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'mlavaloica'); ?>
		<?php echo $form->checkBox($model,'mlavaloica'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'mlavaroupa'); ?>
		<?php echo $form->checkBox($model,'mlavaroupa'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'aqcentral'); ?>
		<?php echo $form->checkBox($model,'aqcentral'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'satcabo'); ?>
		<?php echo $form->checkBox($model,'satcabo'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'internet'); ?>
		<?php echo $form->checkBox($model,'internet'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'outros_servicos'); ?>
		<?php echo $form->checkBox($model,'outros_servicos'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'link_info'); ?>
		<?php echo $form->textField($model,'link_info',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'link_dispon'); ?>
		<?php echo $form->textField($model,'link_dispon',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'sessid'); ?>
		<?php echo $form->textField($model,'sessid',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'promo'); ?>
		<?php echo $form->checkBox($model,'promo'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'certif'); ?>
		<?php echo $form->checkBox($model,'certif'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'data_act'); ?>
		<?php echo $form->textField($model,'data_act',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'qtspecialoffer'); ?>
		<?php echo $form->textField($model,'qtspecialoffer'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'fengomar'); ?>
		<?php echo $form->checkBox($model,'fengomar'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'estacionamento'); ?>
		<?php echo $form->checkBox($model,'estacionamento'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'telefone'); ?>
		<?php echo $form->checkBox($model,'telefone'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'despertador'); ?>
		<?php echo $form->checkBox($model,'despertador'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'dvd'); ?>
		<?php echo $form->checkBox($model,'dvd'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'torradeira'); ?>
		<?php echo $form->checkBox($model,'torradeira'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'animais'); ?>
		<?php echo $form->checkBox($model,'animais'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'fumadores'); ?>
		<?php echo $form->checkBox($model,'fumadores'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'caucao'); ?>
		<?php echo $form->checkBox($model,'caucao'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'valorcaucao'); ?>
		<?php echo $form->textField($model,'valorcaucao',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->label($model,'deficientes'); ?>
		<?php echo $form->checkBox($model,'deficientes'); ?>
	</div>

	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->