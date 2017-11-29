<?php
/* @var $this ReservaStateController */
/* @var $model ReservaState */

$this->breadcrumbs=array(
	'Reserva States'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReservaState', 'url'=>array('index')),
	array('label'=>'Gerir ReservaState', 'url'=>array('admin')),
);
?>

<h3>Create ReservaState</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>