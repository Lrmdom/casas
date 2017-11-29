<?php
$this->breadcrumbs=array(
	'Reservas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reserva', 'url'=>array('index')),
	array('label'=>'Gerir Reserva', 'url'=>array('admin')),
);
?>

<h3>Create Reserva</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>