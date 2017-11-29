<?php
/* @var $this ReservaPaymentsController */
/* @var $data ReservaPayments */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pagamento')); ?>:</b>
	<?php echo CHtml::encode($data->id_pagamento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_pagamento')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_pagamento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpreco')); ?>:</b>
	<?php echo CHtml::encode($data->idpreco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idreserva')); ?>:</b>
	<?php echo CHtml::encode($data->idreserva); ?>
	<br />


</div>