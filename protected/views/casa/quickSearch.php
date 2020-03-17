<?php
$this->pageTitle = "Resultados de pesquisa";
?>
<?php $this->model = $model; ?>


<div role="tabpanel">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#lists" aria-controls="lists" role="tab" data-toggle="tab"> <span class="glyphicon glyphicon-list smallIcon icon-success"> </span><?php echo Yii::t("content", "Mostrar como Lista") ?></a>
        </li>
        <li role="presentation"> <a href="#maps" aria-controls="maps" role="tab" data-toggle="tab"> <span class="glyphicon glyphicon-globe smallIcon icon-success"></span><?php echo Yii::t("content", "Mostrar no Mapa") ?></a></li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="lists">
            <?php
            //‌‌json_encode(CJSON::encode($model->isearchMap()->getData()));
           // ‌‌CJSON::encode($model->isearchMap()->getData());
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $model->isearchMap(),
                'itemView' => '_view',
                'id' => 'Casas',
                'ajaxUpdate' => FALSE,
                'enablePagination' => True,
                //'ajaxType' > 'POST',
                //'ajaxUrl'=>array($this->getRoute()),
                'sortableAttributes' => array('cod_casa', 'tipo', 'pessoas', 'destino'),
                    //'pager' => array('cssFile' => Yii::app()->theme->baseUrl . "/css/bootstrap.css")
            ));
            ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="maps">
            <?php
            $this->renderPartial("//site/mapa", array("model" => $model));
            ?>
        </div>

    </div>

</div>




<script>
    $('.btClassificaCasa').on('click', function(e) {
        $.get($(this).attr('href'), function(data) {
            $('.modal-body').html(data);
        });
        e.preventDefault();
        $('#fdkCreate').modal();
    });

    $('.btAgVisitaCasa').on('click', function(e) {
        $.get($(this).attr('href'), function(data) {
            $('.modal-body').html(data);
        });
        e.preventDefault();
        $('#fdkCreate').modal();
    });
</script>
