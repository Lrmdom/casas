<?php
$this->breadcrumbs=array(
	'Proprietario Cancel Issues'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProprietarioCancelIssue', 'url'=>array('index')),
	array('label'=>'Nova ProprietarioCancelIssue', 'url'=>array('create')),
	array('label'=>'View ProprietarioCancelIssue', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerir ProprietarioCancelIssue', 'url'=>array('admin')),
);
?>

<h3>Update ProprietarioCancelIssue <?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>