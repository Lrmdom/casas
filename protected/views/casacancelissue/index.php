<?php
$this->breadcrumbs=array(
	'Casacancelissues',
);

$this->menu=array(
	array('label'=>'Nova Casacancelissue', 'url'=>array('create')),
	array('label'=>'Gerir Casacancelissue', 'url'=>array('admin')),
);
?>

<h3>Casacancelissues</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
