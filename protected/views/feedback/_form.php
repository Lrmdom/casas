
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.rating.css" />
<?php
Yii::app()->clientScript
        ->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.jqEasyCharCounter.min.js')
?>
<?php
/* @var $this FeedbackController */
/* @var $model Feedback */
/* @var $form CActiveForm */

$cod_casa = $_GET['id'];
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.rating.js');
?>
Escolha Reserva:
<?php
echo $this->renderPartial("//feedback/adminReserva", array("model" => new Reserva, "cod_casa" => $model->cod_casa), false, true);

$reservas = Reserva::model()->searchClienteReservaFeedback($cod_casa)->getData();
?>


<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'feedback-form',
        'enableClientValidation' => true,
        'htmlOptions' => array(
            'onsubmit' => "return false;", /* Disable normal form submit */
            'onkeypress' => " if(event.keyCode == 13){ send(); } ")
    ));
    ?>
    <p class="note"> </p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid">
        <?php echo $form->textField($model, 'reserva', array('value' => $reservas[0]["id"])); ?>
        <?php echo $form->error($model, 'reserva'); ?>

        <?php echo $form->textField($model, 'cod_casa', array('value' => $cod_casa)); ?>
        <?php echo $form->error($model, 'cod_casa'); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'valor_voto'); ?>
        <input name="Feedback[valor_voto]" type="radio" class="star" value="1"/>
        <input name="Feedback[valor_voto]" type="radio" class="star" value="2"/>
        <input name="Feedback[valor_voto]" type="radio" class="star" value="3"/>
        <input name="Feedback[valor_voto]" type="radio" class="star" value="4"/>
        <input name="Feedback[valor_voto]" type="radio" class="star" value="5"/>
        <?php echo $form->error($model, 'valor_voto'); ?>
    </div>

    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'comment'); ?>
        <?php echo $form->textArea($model, 'comment', array('class' => 'comment form-control', 'size' => 60, 'maxlength' => 500)); ?>
        <?php echo $form->error($model, 'comment'); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->hiddenField($model, 'id_cliente', array('value' => Yii::app()->user->id)); ?>
    </div>
    <div class="row-fluid buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Classificar' : 'Guardar', array('class' => 'btn btn-primary', 'onclick' => 'send();')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->


<script>
    function send()
    {

        var data = $("#feedback-form").serialize();


        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("feedback/create"); ?>',
            data: data,
            success: function(data) {
                $('.modal-body,.xhrResults').html(data);
            },
            error: function(data) { // if error occured
                alert("Error occured.please try again");
                alert(data);
            },
            dataType: 'html'
        });

    }
    $('.comment').jqEasyCounter({
        'maxChars': 500,
        'maxCharsWarning': 400,
        'msgFontColor': '#000',
        'msgWarningColor': '#F00'
    });
    $(".star").rating();

</script>