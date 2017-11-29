<?php
/* @var $this EstadiaMinimaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estadia Minimas',
);

$this->menu=array(
	array('label'=>'Nova EstadiaMinima', 'url'=>array('create')),
	array('label'=>'Gerir EstadiaMinima', 'url'=>array('admin')),
);
?>

<h3>Estadia Minimas</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
