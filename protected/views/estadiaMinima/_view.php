<?php
/* @var $this EstadiaMinimaController */
/* @var $data EstadiaMinima */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadia_min')); ?>:</b>
	<?php echo CHtml::encode($data->estadia_min); ?>
	<br />


</div>