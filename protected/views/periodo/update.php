<?php
/* @var $this PeriodoController */
/* @var $model Periodo */

$this->breadcrumbs = array(
    'Periodos' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);
?>

<h4><?php echo Yii::t("content", "Atualizar preço ") . $model->id . Yii::t("content", " casa ") . $model->cod_casa ?></h4>

<?php echo $this->renderPartial('//periodo/_form', array('model' => $model)); ?>