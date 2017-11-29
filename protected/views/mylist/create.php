<?php
/* @var $this MylistController */
/* @var $model Mylist */

$this->breadcrumbs=array(
	'Mylists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mylist', 'url'=>array('index')),
	array('label'=>'Gerir Mylist', 'url'=>array('admin')),
);
?>

<h3>Create Mylist</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>