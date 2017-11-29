<?php
/* @var $this ReservaPaymentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reserva Payments',
);

$this->menu=array(
	array('label'=>'Nova ReservaPayments', 'url'=>array('create')),
	array('label'=>'Gerir ReservaPayments', 'url'=>array('admin')),
);
?>

<h3>Reserva Payments</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
