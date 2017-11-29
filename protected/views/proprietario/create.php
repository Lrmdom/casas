<?php
$this->breadcrumbs = array(
    'Proprietarios' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'Gerir Proprietario', 'url' => array('admin')),
);
?>

<h3>Create Proprietario</h3>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>