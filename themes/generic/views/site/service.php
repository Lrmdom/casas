<div class="container-fluid">

    <div class="row">
        <div class="<?php echo $class ?>">

            <div>
                <span class="glyphicon glyphicon-briefcase icon-love <?php echo $icon ?>"></span>
                <div class="caption">
                    <h3 class="text-center"><small><a href="<?php echo $this->createUrl('casa/search', array('sType' => 'for_sale')) ?>">Venda de imoveis</a></small></h3>
                </div>
            </div>
        </div>
        <div class="<?php echo $class ?>">

            <div>
                <span class="glyphicon glyphicon-ok-sign icon-trust <?php echo $icon ?>"></span>
                <div class="caption">
                    <h3 class="text-center"><small><a href="#">Certificaçao de imoveis</a></small></h3>

                </div>
            </div>

        </div>
        <div class="<?php echo $class ?>">
            <div>
                <span class="glyphicon glyphicon-time icon-success <?php echo $icon ?>"></span>
                <div class="caption">
                    <h3 class="text-center"><small><a href="#">Alertas</a></small></h3>
                </div>
            </div>
        </div>
        <div class="<?php echo $class ?>">
            <div>
                <span class="glyphicon glyphicon-tags icon-warning <?php echo $icon ?>"></span>
                <div class="caption">
                    <h3 class="text-center"><small><a href="<?php echo Yii::app()->createUrl('//preco/deals'); ?>">Ofertas Especiais</a></small></h3>
                </div>
            </div>
        </div>
    </div>
</div>

