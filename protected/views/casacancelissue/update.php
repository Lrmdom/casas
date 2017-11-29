<?php
$this->breadcrumbs=array(
	'Casacancelissues'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Casacancelissue', 'url'=>array('index')),
	array('label'=>'Nova Casacancelissue', 'url'=>array('create')),
	array('label'=>'View Casacancelissue', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerir Casacancelissue', 'url'=>array('admin')),
);
?>

<h3>Update Casacancelissue <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>