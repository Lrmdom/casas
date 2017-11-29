<?php
$this->breadcrumbs=array(
	'Proprietario Cancel Issues'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProprietarioCancelIssue', 'url'=>array('index')),
	array('label'=>'Nova ProprietarioCancelIssue', 'url'=>array('create')),
	array('label'=>'Update ProprietarioCancelIssue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProprietarioCancelIssue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerir ProprietarioCancelIssue', 'url'=>array('admin')),
);
?>

<h3>View ProprietarioCancelIssue #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'propid',
		'descricao',
	),
)); ?>
