<?php
$this->breadcrumbs=array(
	'Prereservas'=>array('index'),
	$model->n_prereserva,
);

$this->menu=array(
	array('label'=>'List Prereserva', 'url'=>array('index')),
	array('label'=>'Nova Prereserva', 'url'=>array('create')),
	array('label'=>'Update Prereserva', 'url'=>array('update', 'id'=>$model->n_prereserva)),
	array('label'=>'Delete Prereserva', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->n_prereserva),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerir Prereserva', 'url'=>array('admin')),
);
?>

<h3>View Prereserva #<?php echo $model->n_prereserva; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'n_prereserva',
		'data',
		'expira',
		'id',
		'cod_casa',
		'nm_mes',
		'n_semana',
		'inicio',
		'fim',
		'preco',
		'quinzena',
		'Nome',
		'morada',
		'email',
		'telefone',
		'perguntas',
		'sugestoes',
		'Comentarios',
		'situacao',
		'forma_pagamento',
		'valor',
		'sessionid',
		'voto',
	),
)); ?>
