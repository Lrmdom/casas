<?php
$this->layout = "search";
$model = new Cliente();
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'pwd-form',
    'action' => 'PwdRecover',
    'enableClientValidation' => true,
        ));
?>
<?php $this->renderPartial('//site/flashMessage'); ?>

<div class="wide form">
    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid ui-widget  pull-right">

        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email'); ?>
        <?php echo CHtml::submitButton('Recuperar Password', array('class' => 'btn btn-primary'));
        ?>
    </div>
</div>
<?php $this->endWidget(); ?>