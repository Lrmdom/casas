
<div class="form-group">
    <?php echo $form->labelEx($reserva, 'valorSinal'); ?>
    <?php echo $form->textField($reserva, 'valorSinal', array('size' => 50, 'maxlength' => 50, 'class' => 'required form-control')); ?>
    <?php echo $form->error($reserva, 'valorSinal'); ?>
</div>

<div class="form-group">
    <?php echo $form->hiddenField($reserva, 'id'); ?>
    <?php echo $form->hiddenField($reserva, 'user', array('type' => "text", 'value' => Yii::app()->user->name)); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($reserva, 'reserva_state'); ?>
    <?php echo $form->dropDownList($reserva, 'reserva_state', CHtml::listData(ReservaState::model()->findAll(), 'id', 'state'), array('prompt' => 'Select Estado da Reserva', 'class' => 'form-control')); ?>
    <?php echo $form->error($reserva, 'reserva_state'); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($reserva, 'idcliente'); ?>
    <?php echo $form->dropDownList($reserva, 'idcliente', CHtml::listData(Cliente::model()->findAll(), 'clienteid', 'NameSurname'), array('prompt' => 'Select Cliente', 'class' => 'form-control')); ?>
    <?php echo $form->error($reserva, 'idcliente'); ?>
</div>

<?php echo $form->hiddenField($reserva, 'idpreco'); ?>
