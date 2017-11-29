<?php
$this->breadcrumbs=array(
	'Proprietario Cancel Issues',
);

$this->menu=array(
	array('label'=>'Nova ProprietarioCancelIssue', 'url'=>array('create')),
	array('label'=>'Gerir ProprietarioCancelIssue', 'url'=>array('admin')),
);
?>

<h3>Proprietario Cancel Issues</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
