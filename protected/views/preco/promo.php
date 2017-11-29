
<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'preco-grid',
    'dataProvider' => $model->isearch($cod_casa),
    'filter' => $model,
    'showTableOnEmpty' => FALSE,
    'ajaxUpdate' => TRUE,
    'ajaxUrl' => $this->createUrl("preco/adminPromo"),
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'columns' => array(
        'id',
        'inicio',
        'fim',
        'preco',
        /*
          'fim',
          'preco',
          'livre',
          'reservar',
          'promo',
          'paga',
         */
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{delete}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("preco/deletePromo", array("id"=>$data->id))',
                ),
            ),
        ),
    ),
));
?>