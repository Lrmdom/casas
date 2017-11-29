<div class="panel panel-default sh">
    <div class="panel-heading">
        <h4 class="panel-title text-center"><?php echo Yii::t("content", "Serviços") ?></h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3 col-lg-3">

                <div>
                    <span class="glyphicon glyphicon-briefcase icon-love <?php echo $icon ?>"></span>
                    <div class="caption">
                        <h3 class=""><small><a href="<?php echo $this->createUrl('casa/search', array('sType' => 'for_sale')) ?>">Venda de imoveis</a></small></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">

                <div>
                    <span class="glyphicon glyphicon-ok-sign icon-trust <?php echo $icon ?>"></span>
                    <div class="caption">
                        <h3 class=""><small><a href="#">Certificaçao de imoveis</a></small></h3>

                    </div>
                </div>

            </div>
            <div class="col-md-3 col-lg-3">
                <div>
                    <span class="glyphicon glyphicon-time icon-success <?php echo $icon ?>"></span>
                    <div class="caption">
                        <h3 class=""><small><a href="#">Alertas</a></small></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div>
                    <span class="glyphicon glyphicon-tags icon-warning <?php echo $icon ?>"></span>
                    <div class="caption">
                        <h3 class=""><small><a href="<?php echo Yii::app()->createUrl('//preco/deals'); ?>">Ofertas Especiais</a></small></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
