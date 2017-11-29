<div class="container-fluid">
    <div class="row">
        <?php
        $cn = new CNumberFormatter(Yii::app()->getLanguage());

        if (!isset($helper)):
            ?>




            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <?php
                echo CHtml::link(CHtml::image('/uploads/' . $data->casas->img_1, '', array('class' => 'thumbnail img-polaroid img-responsive')), array('casa/client', 'id' => $data->cod_casa)
                );
                ?>

            </div>

            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div>
                    <span>
                        <b><?php echo CHtml::encode($data->getAttributeLabel('cod_casa')); ?>:</b>
                        <?php echo CHtml::link($data->cod_casa, array('casa/client', 'id' => $data->cod_casa))
                        ?>
                        <br/>

                        <b><?php echo CHtml::encode($data->getAttributeLabel('inicio')); ?>:</b>
                        <?php echo CHtml::encode($data->inicio); ?>
                        <br />

                        <b><?php echo CHtml::encode($data->getAttributeLabel('fim')); ?>:</b>
                        <?php echo CHtml::encode($data->fim); ?>
                    </span>
                </div>
                <div>

                    <h3 class="colored">
                        <?php echo CHtml::encode($cn->formatCurrency($data->preco, 'EUR')) ?>
                    </h3>
                    <a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('reserva/createSpecial', array('id' => $data->id)) ?>"><?php echo Yii::t("content", "Reservar") ?></a>

                </div>
            </div>
        <?php elseif (isset($helper)) : ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div>
                    <span>
                        <b><?php echo CHtml::encode($data->getAttributeLabel('cod_casa')); ?>:</b>
                        <?php echo CHtml::link($data->cod_casa, array('casa/client', 'id' => $data->cod_casa))
                        ?>
                        <br/>

                        <b><?php echo CHtml::encode($data->getAttributeLabel('inicio')); ?>:</b>
                        <?php echo CHtml::encode($data->inicio); ?>
                        <br />

                        <b><?php echo CHtml::encode($data->getAttributeLabel('fim')); ?>:</b>
                        <?php echo CHtml::encode($data->fim); ?>
                    </span>
                </div>
                <div>

                    <h3 class="colored">
                        <?php echo CHtml::encode($cn->formatCurrency($data->preco, 'EUR')) ?>
                    </h3>
                    <a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('reserva/createSpecial', array('id' => $data->id)) ?>"><?php echo Yii::t("content", "Reservar") ?></a>

                </div>
            </div>
        <?php endif; ?>





    </div>

</div>