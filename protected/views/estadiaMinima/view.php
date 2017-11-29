<?php
/* @var $this EstadiaMinimaController */
/* @var $model EstadiaMinima */

$this->breadcrumbs=array(
	'Estadia Minimas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EstadiaMinima', 'url'=>array('index')),
	array('label'=>'Nova EstadiaMinima', 'url'=>array('create')),
	array('label'=>'Update EstadiaMinima', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EstadiaMinima', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerir EstadiaMinima', 'url'=>array('admin')),
);
?>

<h3>View EstadiaMinima #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'estadia_min',
	),
)); ?>
