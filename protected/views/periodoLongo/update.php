<h4><?php echo Yii::t("content", "Atualizar preço longa duração ") . Yii::t("content", "casa ") . $model->cod_casa; ?></h4>
<div class="container-fluid">
    <div class="col-xs-12 col-md-5 col-lg-6">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
    <div class="col-xs-12 col-md-7 col-lg-6">
        <?php echo $this->renderPartial('admin', array('model' => new PeriodoLongo(), 'cod_casa' => $model->cod_casa)); ?>
    </div>
</div>