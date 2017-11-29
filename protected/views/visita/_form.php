<?php
/* @var $this VisitaController */
/* @var $model Visita */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $actio = Yii::app()->createUrl('visita/create');
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'visita-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate' => 'js:function(form,data,hasError){
                        if(!hasError){
                                $.ajax({
                                        "type":"POST",
                                        "url":"' . $actio . '",
                                        "data":form.serialize(),
                                        "success":function(data){$(".modal-body,.reservacasaform").html(data);obj = JSON.parse(data);if(obj.status=="700"){ location.reload()};}

                                        });
                                }
                        }'
        ),
    ));
    ?>

    <p class="note"> </p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row-fluid">

        <?php echo $form->hiddenField($model, 'cliente', array('value' => Yii::app()->user->id)); ?>
        <?php echo $form->error($model, 'cliente'); ?>
    </div>

    <div class="row-fluid">

        <?php echo $form->hiddenField($model, 'cod_casa', array('value' => $_GET['id'])); ?>
        <?php echo $form->error($model, 'cod_casa'); ?>
    </div>

    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'data'); ?>
        <?php echo $form->textField($model, 'data', array('size' => 12, 'maxlength' => 12, 'class' => 'datepick')); ?>
        <?php echo $form->error($model, 'data'); ?>
    </div>

    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'hora'); ?>
        <?php echo $form->textField($model, 'hora', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'hora'); ?>
    </div>

    <div class="row-fluid buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Agendar' : 'Guardar', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
