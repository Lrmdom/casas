<?php
$this->breadcrumbs = array(
    'Casas' => array('index'),
    'Create',
);
?>

<h4><?php echo Yii::t("content", "Adicionar Casa") ?></h4>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>