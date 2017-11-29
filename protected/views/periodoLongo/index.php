<?php
/* @var $this PeriodoLongoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Periodo Longos',
);

$this->menu=array(
	array('label'=>'Create PeriodoLongo', 'url'=>array('create')),
	array('label'=>'Manage PeriodoLongo', 'url'=>array('admin')),
);
?>

<h1>Periodo Longos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
