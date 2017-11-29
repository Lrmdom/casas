<?php
/* @var $this ReservaPaymentsController */
/* @var $model ReservaPayments */

$this->breadcrumbs = array(
    'Reserva Payments' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Gerir Casa', 'url' => array('//casa/admin')),
    array('label' => 'Delete ReservaPayment', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<h3>View ReservaPayments #<?php echo $model->id; ?></h3>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'id_pagamento',
        'id_tipo_pagamento',
        'valor',
        array('label' => 'Período', 'type' => 'raw', 'value' => CHtml::link($model->idpreco, array('preco/update', 'id' => $model->idpreco))),
        array('label' => 'Reserva', 'type' => 'raw', 'value' => CHtml::link($model->idreserva, array('reserva/view', 'id' => $model->idreserva))),
    ),
));
?>
