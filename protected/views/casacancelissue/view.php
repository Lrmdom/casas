<?php
$this->breadcrumbs=array(
	'Casacancelissues'=>array('index'),
	$model->id,
);

$this->menu=array(
	
	array('label'=>'Nova Casacancelissue', 'url'=>array('create')),
	array('label'=>'Update Casacancelissue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Casacancelissue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerir Casacancelissue', 'url'=>array('admin')),
);
?>

<h3>View Casacancelissue #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'propid',
		'descricao',
	),
)); ?>
