<?php
$model = new Proprietario('fb');
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'pwd-form',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'action' => 'PwdRecover',
        ));
?>
<?php $this->renderPartial('//site/flashMessage'); ?>

<div class="row-fluid ui-widget  pull-right">
    <div class="wide form">
        <?php echo $form->errorSummary($model); ?>
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email'); ?>




        <?php echo CHtml::submitButton('Recuperar Password', array('class' => 'btn btn-primary'));
        ?>
    </div>
</div>
<?php $this->endWidget(); ?>
