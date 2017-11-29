<?php
/* @var $this PeriodoLongoController */
/* @var $model PeriodoLongo */

$this->breadcrumbs=array(
	'Periodo Longos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PeriodoLongo', 'url'=>array('index')),
	array('label'=>'Create PeriodoLongo', 'url'=>array('create')),
	array('label'=>'Update PeriodoLongo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PeriodoLongo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PeriodoLongo', 'url'=>array('admin')),
);
?>

<h1>View PeriodoLongo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cod_casa',
		'inicio',
		'fim',
		'preco_mes',
		'estadia_minima',
	),
)); ?>
