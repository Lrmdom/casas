<?php
$this->pageTitle = Yii::app()->name;
?>

<div class="row-fluid">
    <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel" data-interval="10000">
        Indicators
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        Wrapper for slides
        <div class="carousel-inner">
            <div class="item"><img  src="/images/7.jpg"/>

            </div>
            <div class="item active"><img  src="/images/8.jpg"/>

            </div>
            <div class="item "><img  src="/images/5.jpg"/>

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
</div>
<div class="barr"></div>
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

<div class="container-fluid">
    <div class='col-xs-12 col-md-4 col-lg-4'>
        <div class="alert alert-success text-center" role="alert">
            <h5><b>Promoções e Ofertas especiais</b></h5>
        </div>
        <?php echo $this->renderPartial('//preco/index'); ?>
    </div>


    <div class="col-xs-12 col-md-4 col-lg-4">
        <div class="alert alert-info text-center" role="alert">
            <h5><b>Imoveis adicionados recentemente</b></h5>
        </div>
        <div class="container-fluid">
            <?php
            $data = Casa::model()->findAllBySql('select * from casa where activo=1 order by cod_casa desc LIMIT 8');
            $i = 0;
            foreach ($data as $key => $casa) {
                $i++;
                ?>
                <?php
                if ($i == 4) {
                    echo "<div class='row'>";
                }
                ?>
                <div class="col-xs-6 col-md-3 col-lg-3">
                    <a href="<?php echo Yii::app()->createUrl('//casa/client', array('id' => $casa->cod_casa, 'slug' => $this->createSlug($casa->seo_title))); ?>">
                        <img src="/uploads/<?php echo $casa->img_1 ?>" class="lazy img-responsive thumbnail"  alt="...">
                    </a>
                </div>
                <?php
                if ($i == 4) {
                    echo "</div>";
                }
                ?>
            <?php } ?>
        </div>
    </div>



    <div class="col-xs-12 col-md-4 col-lg-4">
        <div class="alert alert-warning text-center" role="alert">
            <h5><b>Serviços</b></h5>
        </div>
        <?php
        $this->renderPartial('//site/service', array(
            'class' => 'col-lg-12 col-md-12 col-xs-12  ',
            'icon' => 'bigIcon'
        ));
        ?>

    </div>
</div>