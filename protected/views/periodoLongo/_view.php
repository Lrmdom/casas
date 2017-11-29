<?php
/* @var $this PeriodoLongoController */
/* @var $data PeriodoLongo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_casa')); ?>:</b>
	<?php echo CHtml::encode($data->cod_casa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inicio')); ?>:</b>
	<?php echo CHtml::encode($data->inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fim')); ?>:</b>
	<?php echo CHtml::encode($data->fim); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preco_mes')); ?>:</b>
	<?php echo CHtml::encode($data->preco_mes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadia_minima')); ?>:</b>
	<?php echo CHtml::encode($data->estadia_minima); ?>
	<br />


</div>