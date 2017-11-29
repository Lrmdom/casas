<?php
$this->breadcrumbs=array(
	'Prereservas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Prereserva', 'url'=>array('index')),
	array('label'=>'Gerir Prereserva', 'url'=>array('admin')),
);
?>

<h3>Create Prereserva</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>