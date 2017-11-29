
<?php
/* @var $this ReservaController */
/* @var $model Reserva */
/* @var $form CActiveForm */
$this->layout = "search";
$pagamento = ReservaPayment::model();
?>

<?php $this->renderPartial('//site/flashMessage'); ?>


<div class="form container-fluid">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'reserva-form',
        'action' => Yii::app()->createUrl('reserva/update/' . $model->id),
        //  'enableAjaxValidation' => false,
        // 'enableClientValidation' => true,
        //  'clientOptions' => array('validateOnSubmit' => true,),
        'htmlOptions' => array(
            'role' => 'form',
            'class' => 'form-inline'
        )
    ));
    ?>
    <?php echo $form->errorSummary($model); ?>


    <div class="col-xs-12 col-md-6 col-lg-6">



        <?php
        if ($model->reserva_state == Reserva::RESERVA):
            ?>
            <div class="alert alert-warning fMsg"></div>
            <script>

                $(function() {

                    $("#reserva-form :input").attr("disabled", true);
                    $(".buttonWrapper").hide();
                    $(".fMsg").html('Reserva não pode ser alterada. Estado PAGA!');
                });

            </script>

        <?php endif; ?>


        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->


