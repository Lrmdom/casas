<?php
/* @var $this VisitaController */
/* @var $model Visita */

$this->breadcrumbs=array(
	'Visitas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Visita', 'url'=>array('index')),
	array('label'=>'Nova Visita', 'url'=>array('create')),
	array('label'=>'View Visita', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerir Visita', 'url'=>array('admin')),
);
?>

<h3>Update Visita <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>