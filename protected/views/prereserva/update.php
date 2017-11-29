<?php
$this->breadcrumbs=array(
	'Prereservas'=>array('index'),
	$model->n_prereserva=>array('view','id'=>$model->n_prereserva),
	'Update',
);

$this->menu=array(
	array('label'=>'List Prereserva', 'url'=>array('index')),
	array('label'=>'Nova Prereserva', 'url'=>array('create')),
	array('label'=>'View Prereserva', 'url'=>array('view', 'id'=>$model->n_prereserva)),
	array('label'=>'Gerir Prereserva', 'url'=>array('admin')),
);
?>

<h3>Update Prereserva <?php echo $model->n_prereserva; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>