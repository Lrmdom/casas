<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('propid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->propid), array('view', 'id'=>$data->propid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proprietario')); ?>:</b>
	<?php echo CHtml::encode($data->proprietario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('senha')); ?>:</b>
	<?php echo CHtml::encode($data->senha); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('localidade')); ?>:</b>
	<?php echo CHtml::encode($data->localidade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conflito1')); ?>:</b>
	<?php echo CHtml::encode($data->conflito1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conflito2')); ?>:</b>
	<?php echo CHtml::encode($data->conflito2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conflito3')); ?>:</b>
	<?php echo CHtml::encode($data->conflito3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sessid')); ?>:</b>
	<?php echo CHtml::encode($data->sessid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais')); ?>:</b>
	<?php echo CHtml::encode($data->pais); ?>
	<br />

	*/ ?>

</div>