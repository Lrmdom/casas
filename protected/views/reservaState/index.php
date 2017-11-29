<?php
/* @var $this ReservaStateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reserva States',
);

$this->menu=array(
	array('label'=>'Nova ReservaState', 'url'=>array('create')),
	array('label'=>'Gerir ReservaState', 'url'=>array('admin')),
);
?>

<h3>Reserva States</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
