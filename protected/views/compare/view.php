<?php
/* @var $this compareController */
/* @var $model compare */

$this->breadcrumbs=array(
	'compares'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List compare', 'url'=>array('index')),
	array('label'=>'Nova compare', 'url'=>array('create')),
	array('label'=>'Update compare', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete compare', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerir compare', 'url'=>array('admin')),
);
?>

<h3>View compare #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cod_casa',
		'comparecol',
		'sessid',
		'cliente',
		'data',
	),
)); ?>
