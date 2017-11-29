<?php
/* @var $this AlertController */
/* @var $model Alert */

$this->breadcrumbs=array(
	'Alerts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Alert', 'url'=>array('index')),
	array('label'=>'Nova Alert', 'url'=>array('create')),
	array('label'=>'View Alert', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerir Alert', 'url'=>array('admin')),
);
?>

<h3>Alterar Alerta <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>