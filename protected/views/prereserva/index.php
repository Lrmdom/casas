<?php
$this->breadcrumbs=array(
	'Prereservas',
);

$this->menu=array(
	array('label'=>'Nova Prereserva', 'url'=>array('create')),
	array('label'=>'Gerir Prereserva', 'url'=>array('admin')),
);
?>

<h3>Prereservas</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
