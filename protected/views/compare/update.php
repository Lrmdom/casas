<?php
/* @var $this compareController */
/* @var $model compare */

$this->breadcrumbs=array(
	'compares'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List compare', 'url'=>array('index')),
	array('label'=>'Nova compare', 'url'=>array('create')),
	array('label'=>'View compare', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerir compare', 'url'=>array('admin')),
);
?>

<h3>Update compare <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>