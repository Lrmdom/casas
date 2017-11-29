<?php
$this->breadcrumbs = array(
    'Proprietarios' => array('index'),
    $model->propid => array('view', 'id' => $model->propid),
    'Update',
);
?>

<h4><?php echo Yii::t("content", "Atualizar Proprietario") ?> <?php echo $model->propid; ?></h4>

<?php
$model->senha = $model->senha_repeat;

echo $this->renderPartial('_form', array('model' => $model));
?>


