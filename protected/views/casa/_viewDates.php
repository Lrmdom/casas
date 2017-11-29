<?php
$cn = new CNumberFormatter(Yii::app()->getLanguage());
if (isset($data->casa)) {
    $lists = $data;
    $data = $data->casa;
    $fav = 1;
}
?>

<div class="panel panel-info <?php echo $data->cod_casa ?> sh">
    <div class="panel-heading">
        <h3 class="panel-title panelSearch lead">#<strong><?php echo CHtml::encode($data->cod_casa); ?><a href="<?php echo Yii::app()->createUrl('casa/client', array('id' => $data->cod_casa, 'slug' => Casa::model()->createSlug(Yii::t('content', CHtml::encode($data->seo_title), array(), 'db_i18n')))) ?>"> <?php echo Yii::t('content', CHtml::encode($data->seo_title), array(), 'db_i18n') ?></a></strong></h3>

        <?php
        if (isset($data->priceByDate['result']['preco']) && NULL !== $data->priceByDate['result']['preco']) {
            echo "<span class='price alert-warning'> " . $cn->formatCurrency($data->priceByDate['result']['preco'], 'EUR') . " </span>";
        }
        ?>
    </div>
    <div class="panel-body container-fluid row-fluid">

        <div class="col-xs-6 col-md-3"> <a href="<?php echo Yii::app()->createUrl('casa/client', array('id' => $data->cod_casa, 'slug' => Casa::model()->createSlug(Yii::t('content', CHtml::encode($data->seo_title), array(), 'db_i18n')))) ?>">
                <?php
                echo CHtml::image('/uploads/' . $data->img_1, '', array(
                    'class' => 'lazy img-polaroid img-responsive imgGridViewF sh thumbnail' . $data->cod_casa));
                ?>
            </a>
        </div>
        <div class="hidden-xs col-md-3">
            <p>
                <b class="colored"><?php echo CHtml::encode($data->tipoalojamento); ?></b> » <b class="colored"><?php echo CHtml::encode($data->tipo); ?></b>

            </p>


        </div>
        <div class="hidden-xs col-md-3">
            <p>
                <?php echo CHtml::encode($data->getAttributeLabel('casasbanho')); ?>:
                <b class="colored"><?php echo CHtml::encode($data->casasbanho); ?></b>
            </p>
            <p>
                <?php echo CHtml::encode($data->getAttributeLabel('quartos')); ?>:
                <b class="colored"><?php echo CHtml::encode($data->quartos); ?></b>
            </p>
            <p>
                <?php echo CHtml::encode($data->getAttributeLabel('pessoas')); ?>:
                <b class="colored"><?php echo CHtml::encode($data->pessoas); ?></b>
            </p>
            <p>
                <?php echo CHtml::encode($data->getAttributeLabel('camascasal')); ?>:
                <b class="colored"><?php echo CHtml::encode($data->camascasal); ?></b>
            </p>
            <p>
                <?php echo CHtml::encode($data->getAttributeLabel('camassingle')); ?>:
                <b class="colored"> <?php echo CHtml::encode($data->camassingle); ?></b>
            </p>



        </div>
        <div class="col-xs-6 col-md-3">

            <div class="visible-xs">
                <p>
                    <b class="colored"><?php echo CHtml::encode($data->tipoalojamento); ?></b> » <b class="colored"><?php echo CHtml::encode($data->tipo); ?></b>

                </p>
                <p>
                    <?php echo CHtml::encode($data->getAttributeLabel('destino')); ?>:
                    <b class="colored"><?php echo CHtml::encode($data->destino); ?></b>
                </p>

            </div>


        </div>



        <div class="col-xs-12 col-md-12">
            <p><b class="colored"><?php echo CHtml::encode($data->localidade) ?></b> » <b class="colored"><?php echo CHtml::encode($data->concelho) ?></b> » <b class="colored"><?php echo CHtml::encode($data->pais); ?></b></p>
        </div>
    </div>
</div>
