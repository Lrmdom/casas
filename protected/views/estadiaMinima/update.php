<?php
/* @var $this EstadiaMinimaController */
/* @var $model EstadiaMinima */

$this->breadcrumbs=array(
	'Estadia Minimas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EstadiaMinima', 'url'=>array('index')),
	array('label'=>'Nova EstadiaMinima', 'url'=>array('create')),
	array('label'=>'View EstadiaMinima', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerir EstadiaMinima', 'url'=>array('admin')),
);
?>

<h3>Update EstadiaMinima <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>