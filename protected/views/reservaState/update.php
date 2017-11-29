<?php
/* @var $this ReservaStateController */
/* @var $model ReservaState */

$this->breadcrumbs=array(
	'Reserva States'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReservaState', 'url'=>array('index')),
	array('label'=>'Nova ReservaState', 'url'=>array('create')),
	array('label'=>'View ReservaState', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerir ReservaState', 'url'=>array('admin')),
);
?>

<h3>Update ReservaState <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>