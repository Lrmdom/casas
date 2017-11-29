<?php
/* @var $this ClienteController */
/* @var $data Cliente */
?>

<div class="view">
 
	<b><?php echo CHtml::encode($data->getAttributeLabel('clienteid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->clienteid), array('view', 'id'=>Yii::app()->user->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cliente')); ?>:</b>
	<?php echo CHtml::encode($data->cliente); ?>
	<br />

	

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefone')); ?>:</b>
	<?php echo CHtml::encode($data->telefone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('morada')); ?>:</b>
	<?php echo CHtml::encode($data->morada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_postal')); ?>:</b>
	<?php echo CHtml::encode($data->cod_postal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('localidade')); ?>:</b>
	<?php echo CHtml::encode($data->localidade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais')); ?>:</b>
	<?php echo CHtml::encode($data->pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subscribe_newsletter')); ?>:</b>
	<?php echo CHtml::encode($data->subscribe_newsletter); ?>
	<br />

	

</div>
