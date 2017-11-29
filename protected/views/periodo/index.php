<?php
/* @var $this PeriodoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Periodos',
);

$this->menu=array(
	array('label'=>'Nova Periodo', 'url'=>array('create')),
	array('label'=>'Gerir Periodo', 'url'=>array('admin')),
);
?>

<h3>Periodos</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
