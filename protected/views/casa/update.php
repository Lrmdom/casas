<?php
$casa = $model->cod_casa;

$this->breadcrumbs = array(
    'Casas' => array('index'),
    $model->cod_casa => array('update', 'id' => $model->cod_casa),
    'Update',
);
$fromP = Yii::app()->request->getQuery('fromP');
?>

<div>
    <h4><?php echo Yii::t("content", "Atualizar casa ") . $model->cod_casa; ?> </h4>


    <?php if ($model->certif != 1): ?>
        <div class="alert alert-warning"><p>
                <span class="glyphicon glyphicon-info-sign"></span>
                <?php echo Yii::t("content", "Casa nao certificada. Algumas funcionalidades não estão ativas. Iniciaremos o processo de certificação o mais rápido possível.") ?>
            </p></div>
    <?php endif; ?>
</div>


<?php $this->renderPartial('//site/flashMessage'); ?>
<div role="tabpanel">


    <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
        <li role="presentation"><a  class="triggerTbs" role="tab" data-toggle="tab" href="#tabs-2"><span class="glyphicon glyphicon-globe icon-warning "></span> <?php echo Yii::t("content", "Localização e Características") ?> </a></li>

        <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-1"> <span class="glyphicon glyphicon-calendar icon-warning"> </span> <?php echo Yii::t("content", "Disponibilidade") ?>  </span></a></li>
        <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-4"><span class="glyphicon glyphicon-camera icon-warning"></span> <?php echo Yii::t("content", "Imagens") ?></a></li>

        <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-5"> <span class="glyphicon glyphicon-list icon-warning"></span> <?php echo Yii::t("content", "Reservas") ?></span></a></li>
        <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-8"> <span class="glyphicon glyphicon-tag icon-warning"></span> <?php echo Yii::t("content", "Promoções") ?></a></li>

        <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-6"> <span class="glyphicon glyphicon-comment icon-warning"></span> <?php echo Yii::t("content", "Feedback") ?></a></li>
        <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-7"> <span class="glyphicon glyphicon-euro icon-warning"></span> <?php echo Yii::t("content", "Preços") ?></a></li>
        <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-3"> <span class="glyphicon glyphicon-link icon-warning"></span> <?php echo Yii::t("content", "Longa duração") ?> </a></li>

    </ul>
    <div class="tab-content">
        <div id="tabs-2" role="tabpanel" class="tab-pane">
            <?php echo $this->renderPartial('/casa/_form', array('model' => $model, 'cod_casa' => $model->cod_casa, 'trans' => $trans, 'referer' => 'preco')); ?>
        </div>
        <div id="tabs-1" role="tabpanel" class="tab-pane">
            <?php if ($model->certif == 1): ?>
                <?php echo $this->renderPartial('//preco/_form', array('model' => new Preco(), 'cod_casa' => $model->cod_casa, 'modelCasa' => $model, 'referer' => 'casa', 'preco' => $preco)); ?>
            <?php endif ?>
        </div>
        <div id="tabs-8" role="tabpanel" class="tab-pane">
            <?php if ($model->certif == 1): ?>
                <?php echo $this->renderPartial('//preco/promo', array('model' => new Preco(), 'cod_casa' => $model->cod_casa, 'modelCasa' => $model, 'referer' => 'casa', 'preco' => $preco)); ?>
            <?php endif ?>
        </div>
        <div id="tabs-7" role="tabpanel" class="tab-pane">
            <?php if ($model->certif == 1): ?>
                <?php echo $this->renderPartial('//periodo/_form', array('model' => new Periodo(), 'cod_casa' => $model->cod_casa), true); ?>
            <?php endif ?>
        </div>
        <div id="tabs-3" role="tabpanel" class="tab-pane">
            <div class="container-fluid">
                <div class="col-xs-12 col-md-5 col-l-6">
                    <?php echo $this->renderPartial('//periodoLongo/_form', array('model' => new PeriodoLongo(), 'cod_casa' => $model->cod_casa), true); ?>
                </div>
                <div class="col-xs-12 col-md-7 col-l-6">
                    <?php echo $this->renderPartial('//periodoLongo/admin', array('model' => new PeriodoLongo(), 'cod_casa' => $model->cod_casa), true); ?>
                </div>
            </div>
        </div>
        <div id="tabs-4" role="tabpanel" class="tab-pane">
            <?php echo CHtml::ajaxLink('Ver Imagens', array('casa/mostraImages/' . $model->cod_casa), array('update' => '#sff1', 'type' => 'POST'), array('id' => 'mostraimgs', 'class' => 'updateimagescasa')); ?>
            <?php echo $this->renderPartial('uploadCasaImages', array('model' => $model)); ?>
        </div>
        <div id="tabs-5" role="tabpanel" class="tab-pane">
            <?php if ($model->certif == 1): ?>
                <?php echo $this->renderPartial('//reserva/adminAll', array('model' => new Reserva(), 'cod_casa' => $casa, 'modelCasa' => $model, 'referer' => 'casa')); ?>
            <?php else : echo Yii::t("content", "Operações não autorizadas. Imóvel não está certificado"); ?>
            <?php endif ?>

        </div>
        <div id="tabs-6" role="tabpanel" class="tab-pane">
            <?php if ($model->certif == 1): ?>
                <?php echo $this->renderPartial('//feedback/admin', array('model' => new Feedback, 'cod_casa' => $casa, 'modelCasa' => $model, 'referer' => 'casa')); ?>
            <?php endif ?>
        </div>
    </div>
</div>
<script>
    $('.triggerTbs').trigger('click');
    $('a[href="#tabs-1"]').on('shown.bs.tab', function(e)
    {
        google.maps.event.trigger(map, 'resize');
    });

</script>
