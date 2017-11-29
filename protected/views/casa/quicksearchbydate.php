<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.rating.css" />
<div role="tabpanel">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#lists" aria-controls="lists" role="tab" data-toggle="tab"> <span class="glyphicon glyphicon-list smallIcon icon-success"> </span><?php echo Yii::t("content", "Mostrar como Lista") ?></a>
        </li>
        <li role="presentation"> <a href="#maps" aria-controls="maps" role="tab" data-toggle="tab"> <span class="glyphicon glyphicon-globe smallIcon icon-success"></span><?php echo Yii::t("content", "Mostrar no Mapa") ?></a></li>

    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="lists">
            <?php
            $this->model = $model;
            $this->inic = $inicio;
            $this->fim = $fim;

            if (isset($_POST['Casa']['for_rent'])) {
                $js = '$("#tabs").tabs({ active: 1 });';
                Yii::app()->clientScript->registerScript('111', $js, CClientScript::POS_END);
            }
            if (isset($_POST['Casa']['for_sale'])) {
                $js = '$("#tabs").tabs({ active: 0 });';
                Yii::app()->clientScript->registerScript('111', $js, CClientScript::POS_END);
            }
            if (isset($_POST['Casa']['for_arrenda'])) {
                $js = '$("#tabs").tabs({ active: 2 });';
                Yii::app()->clientScript->registerScript('111', $js, CClientScript::POS_END);
            }

            $dataProvider = new CArrayDataProvider($results, array(
                'keyField' => 'cod_casa',
                'sort' => array(
                    'attributes' => array(
                        'cod_casa', 'tipo', 'pessoas', 'destino'
                    )),
                'pagination' => array(
                    'pageSize' => 10,
                ),
            ));

            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '_view',
                'id' => 'Casas',
                'viewData' => array("inicio" => $inicio, "fim" => $fim),
                'ajaxUpdate' => TRUE,
                'enablePagination' => True,
                'sortableAttributes' => array('cod_casa', 'tipo', 'pessoas', 'destino'),
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
    $(document).ready(function() {
        $('.view').livequery('mouseover', function(event) {
            event.stopImmediatePropagation();
            $(this).children('.divbuttons').show();
        });
        $('.view').live('mouseout', function() {
            $(this).children('.divbuttons').hide();
        });

    });
</script>