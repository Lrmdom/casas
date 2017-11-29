<?php
$this->breadcrumbs = array(
    'Reservas' => array('index'),
    $model->IdReserva => array('view', 'id' => $model->IdReserva),
    'Update',
);
?>

<h3>Update Reserva <?php echo $model->IdReserva;
?></h3>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>