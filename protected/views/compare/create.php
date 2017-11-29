<?php
/* @var $this compareController */
/* @var $model compare */

$this->breadcrumbs=array(
	'compares'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List compare', 'url'=>array('index')),
	array('label'=>'Gerir compare', 'url'=>array('admin')),
);
?>

<h3>Create compare</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>