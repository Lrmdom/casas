<?php
/* @var $this AlertController */
/* @var $model Alert */

$this->breadcrumbs=array(
	'Alerts'=>array('index'),
	$model->id,
);


?>

<h3>View Alert #<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_cliente',
		'id_tipo_alojamento',
		'id_tipo',
		'valor',
		'pessoas',
		'destino',
		'for_rent',
		'for_sale',
		'for_arrenda',
	),
)); ?>
