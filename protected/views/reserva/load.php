<?php
$this->breadcrumbs = array(
    'Reservas' => array('index'),
    $model->id,
);
?>

<div class="container-fluid">
    <h4><?php echo Yii::t("content", "Reserva") . "  $model->id" ?></h4>



    <?php $this->renderPartial('//site/flashMessage'); ?>

    <div class="col-xs-12 col-md-4 col-lg-4">
        <div>
            <?php echo $this->renderPartial('//casa/_form_light', array('model' => $model->precos->casas,)); ?>
        </div>


    </div>
    <div class="col-xs-12 col-md-4 col-lg-4">

        <div>
            <?php echo $this->renderPartial('//preco/view', array('model' => $model->precos,)); ?>
            <?php echo $this->renderPartial('//reservaPayment/adminReserva', array('model' => new ReservaPayment(), 'reserva' => $model)); ?>
            <?php //echo $this->renderPartial('//reserva/addToCalendar', array('model' => $model)); ?>

        </div>

    </div>
</div>