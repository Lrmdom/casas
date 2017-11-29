<?php
/* @var $this ReservaPaymentsController */
/* @var $model ReservaPayments */

$this->breadcrumbs=array(
	'Reserva Payments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReservaPayments', 'url'=>array('index')),
	array('label'=>'Nova ReservaPayments', 'url'=>array('create')),
	array('label'=>'View ReservaPayments', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerir ReservaPayments', 'url'=>array('admin')),
);
?>

<h3>Update ReservaPayments <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>