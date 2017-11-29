<!--<div class="row-fluid">
    <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel" data-interval="10000">
         Indicators
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
         Wrapper for slides
        <div class="carousel-inner">
            <div class="item"><img  src="/images/7.jpg" alt="<?php echo Yii::app()->name ?>"/>

            </div>
            <div class="item active"><img  src="/images/8.jpg" alt="<?php echo Yii::app()->name ?>"/>

            </div>
            <div class="item "><img  src="/images/5.jpg" alt="<?php echo Yii::app()->name ?>"/>

            </div>
        </div>
         Controls
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>-->
<!--<div class="row-fluid">
    <div class="col-xs-4 col-md-4">
        <a href="http://papamistas.com">
            <img src="/images/color.png" alt="Papa Mistas bar e restaurante" class="img-responsive">
        </a>
    </div>
    <div class="col-xs-4 col-md-4">
        <a href="http://papamistas.com">
            <img src="/images/color.png" alt="Papa Mistas bar e restaurante" class="img-responsive">
        </a>
    </div>
    <div class="col-xs-4 col-md-4">
        <a href="http://papamistas.com">
            <img src="/images/color.png" alt="Papa Mistas bar e restaurante" class="img-responsive">
        </a>
    </div>
</div>-->
</div>
<div class="container-fluid headBar">

    <div class="barr"></div>
    <div id="tabs" class="container row-fluid well well-small">


        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#search" data-toggle="tab"><?php echo Yii::t('content', 'Pesquisa Rapida') ?></a>
            </li>
            <li><a href="#advsearch" data-toggle="tab"><?php echo Yii::t('content', 'pesquisa Avançada') ?></a></li>
        </ul>
        <div class="tab-content">
            <div id="search" class="tab-pane active">

                <?php echo $this->renderPartial('//site/quickSearch') ?>


            </div>
            <div id="advsearch" class="tab-pane">
                <div class="form-inline">

                    <?php echo $this->renderPartial('//site/search', array('model' => $model, 'inicio' => $this->inic, 'fim' => $this->fim)) ?>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="well-sm"></div>

<div class="container">

    <div class='col-xs-12 col-md-4 col-lg-4 '>
        <?php echo $this->renderPartial('//preco/index'); ?>
    </div>


    <div class="col-xs-12 col-md-8 col-lg-8 ">
        <div class="panel panel-default sh">
            <div class="panel-heading ">
                <h4 class="panel-title text-center"><?php echo Yii::t("content", "Imoveis adicionados recentemente") ?></h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php
                    $data = Casa::model()->findAllBySql('select * from casa where activo=1 order by cod_casa desc LIMIT 12');
                    $i = 0;
                    foreach ($data as $key => $casa) {
                        $i++;
                        ?>
                        <?php
                        if ($i == 4 || $i == 8) {
                            echo "<div class='row'>";
                        }
                        ?>
                        <div class="col-xs-6 col-md-3 col-lg-3">
                            <a href="<?php echo Yii::app()->createUrl('//casa/client', array('id' => $casa->cod_casa, 'slug' => $this->createSlug($casa->seo_title))); ?>">
                                <img src="/uploads/<?php echo CHtml::decode($casa->img_1) ?>" class="lazy img-responsive thumbnail"  alt="...">
                            </a>
                        </div>
                        <?php
                        if ($i == 4 || $i == 8) {
                            echo "</div>";
                        }
                        ?>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>

</div>
<div class="container">
    <div class="col-xs-12 col-md-12 col-lg-12">

        <?php
        $this->renderPartial('//site/service', array(
            //'class' => 'col-lg-12 col-md-12 hidden-xs',
            'icon' => 'bigIcon'
        ));
        ?>

    </div>
</div>
