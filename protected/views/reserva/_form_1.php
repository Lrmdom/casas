

	<div class="row-fluid">
		
		<?php echo $form->hiddenField($reserva,'id'); ?>
		
	</div>
        <div class="row-fluid">
		<?php echo $form->labelEx($reserva,'Estado'); ?>
		<?php echo $form->dropDownList($reserva,'reserva_state', CHtml::listData(ReservaState::model()->findAll(), 'id', 'state'), array('prompt'=>'Select Estado da Reserva')); ?>
		<?php echo $form->error($reserva,'Estado'); ?>
	</div>
        <div class="row-fluid">
		<?php echo $form->labelEx($reserva,'idcliente'); ?>
		<?php echo $form->dropDownList($reserva,'idcliente', CHtml::listData(Cliente::model()->findAll(), 'cliente', 'cliente'), array('prompt'=>'Select Cliente')); ?>
		<?php echo $form->error($reserva,'idcliente'); ?>
	</div>
        <div class="row-fluid">
		
		<?php echo $form->hiddenField($reserva,'idpreco'); ?>
		
	</div>