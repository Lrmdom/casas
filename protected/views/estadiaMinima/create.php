<?php
/* @var $this EstadiaMinimaController */
/* @var $model EstadiaMinima */

$this->breadcrumbs=array(
	'Estadia Minimas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EstadiaMinima', 'url'=>array('index')),
	array('label'=>'Gerir EstadiaMinima', 'url'=>array('admin')),
);
?>

<h3>Create EstadiaMinima</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>