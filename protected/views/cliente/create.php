<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs = array(
    'Clientes' => array('index'),
    'Create',
);
?>
<h4><?php echo Yii::t("content", "Novo cliente") ?></h4>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>