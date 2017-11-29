<?php
/* @var $this ReservaStateController */
/* @var $model ReservaState */

$this->breadcrumbs=array(
	'Reserva States'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReservaState', 'url'=>array('index')),
	array('label'=>'Nova ReservaState', 'url'=>array('create')),
	array('label'=>'Update ReservaState', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReservaState', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerir ReservaState', 'url'=>array('admin')),
);
?>

<h3>View ReservaState #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'state',
	),
)); ?>
