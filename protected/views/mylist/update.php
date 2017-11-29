<?php
/* @var $this MylistController */
/* @var $model Mylist */

$this->breadcrumbs=array(
	'Mylists'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mylist', 'url'=>array('index')),
	array('label'=>'Nova Mylist', 'url'=>array('create')),
	array('label'=>'View Mylist', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerir Mylist', 'url'=>array('admin')),
);
?>

<h3>Update Mylist <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>