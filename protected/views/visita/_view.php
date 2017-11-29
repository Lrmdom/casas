<?php
/* @var $this VisitaController */
/* @var $data Visita */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_casa')); ?>:</b>
	<?php echo CHtml::encode($data->cod_casa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora')); ?>:</b>
	<?php echo CHtml::encode($data->hora); ?>
	<br />


</div>