<?php
$this->breadcrumbs = array(
    'Reservas' => array('index'),
    $model->id,
);
?>

<div class="container-fluid">
    <h4><?php echo Yii::t("content", "Reserva") . "  $model->id" ?></h4>



    <?php $this->renderPartial('//site/flashMessage'); ?>

    <?php
    echo $this->renderPartial('//reserva/_form', array('model' => $model, 'idreserva' => $model->id, 'idpreco' => $model->idpreco));
    ?>
</div>