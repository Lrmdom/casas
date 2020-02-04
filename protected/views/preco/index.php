<div class="container-fluid">
    <div class="panel panel-default sh">
        <div class="panel-heading">
            <h4 class="panel-title text-center"><?php echo Yii::t("content", "Promoções") ?></h4>
        </div>
        <div class="panel-body">
            <?php
            $now = new CDbExpression("CURDATE()");

            if (!isset($dataProvider)) {
                $dataProvider = new CActiveDataProvider('Preco', array(
                    'criteria' => array(
                        'with' => 'casas',
                        'condition' => 't.promo=1 AND inicio > ' . $now . ' AND activo=1 ',
                    ),
                    'pagination' => array(
                        'pageSize' => 3,
                    ),
                ));
            }
            if (isset($cod_casa)) {
                $dataProvider = new CActiveDataProvider('Preco', array(
                    'criteria' => array(
                        'with' => 'casas',
                        'condition' => 't.promo = 1 AND inicio > ' . $now . ' AND activo=1 AND t.cod_casa=' . $cod_casa,
                    ),
                    'pagination' => array(
                        'pageSize' => 3,
                    ),
                ));
            }

            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '//preco/_view',
                'summaryText' => '',
                'emptyText' => 'Não existem promoções ou last minute deals',
                //"viewData" => array("helper" => $helper)
            ));
            ?>
        </div>
    </div>

</div>
