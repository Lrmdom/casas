<?php
/* @var $this ClienteController */
/* @var $model Cliente */
$this->layout = "search";
$this->breadcrumbs = array(
    'Clientes' => array('index'),
    $model->clienteid => array('view', 'id' => $model->clienteid),
    'Update',
);
?>

<h4><?php echo Yii::t("content", "Atualizar cliente") ?> <?php echo $model->clienteid; ?></h4>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>