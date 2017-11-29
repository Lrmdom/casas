<?php
$this->breadcrumbs=array(
	'Proprietario Cancel Issues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProprietarioCancelIssue', 'url'=>array('index')),
	array('label'=>'Gerir ProprietarioCancelIssue', 'url'=>array('admin')),
);
?>

<h3>Create ProprietarioCancelIssue</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>