<?php
/* @var $this AlertController */
/* @var $model Alert */

$this->breadcrumbs=array(
	'Alerts'=>array('index'),
	'Create',
);


?>

<h3>Novo Alerta</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>