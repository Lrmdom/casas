<?php
$this->breadcrumbs=array(
	'Casacancelissues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Casacancelissue', 'url'=>array('index')),
	array('label'=>'Gerir Casacancelissue', 'url'=>array('admin')),
);
?>

<h3>Create Casacancelissue</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>