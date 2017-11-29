<?php
/* @var $this ReservaPaymentsController */
/* @var $model ReservaPayments */

$this->breadcrumbs = array(
    'Reserva Payments' => array('index'),
    'Create',
);
?>

<h4><?php echo Yii::t("content", "Novo pagamento reserva ") ?><?php echo $idreserva ?></h4>
<div class="container-fluid">
    <div class="row">

        <div class="col-xs-12 col-md-5 col-lg-4">

            <?php echo $this->renderPartial('_form', array('model' => $model)); ?>

        </div>
        <div class="col-xs-12 col-md-7 col-lg-8">
            <?php echo $this->renderPartial('//reserva/_form', array('model' => $reserva, 'idreserva' => $idreserva, 'idpreco' => $reserva->precos->id));
            ?>

        </div>
    </div>

</div>