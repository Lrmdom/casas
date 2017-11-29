<?php
/* @var $this MylistController */
/* @var $model Mylist */

$this->breadcrumbs=array(
	'Mylists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Mylist', 'url'=>array('index')),
	array('label'=>'Nova Mylist', 'url'=>array('create')),
	array('label'=>'Update Mylist', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mylist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerir Mylist', 'url'=>array('admin')),
);
?>

<h3>View Mylist #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cod_casa',
		'mylistcol',
		'sessid',
		'cliente',
		'data',
	),
)); ?>
