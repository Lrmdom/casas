<?php
/* @var $this PeriodoController */
/* @var $model Periodo */

$this->breadcrumbs=array(
	'Periodos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Periodo', 'url'=>array('index')),
	array('label'=>'Gerir Periodo', 'url'=>array('admin')),
);
?>

<h3>Create Periodo</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>