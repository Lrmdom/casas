<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'periodo-longo-grid',
    'dataProvider' => $model->search($_GET['id']),
    //'filter' => $model,
    'showTableOnEmpty' => FALSE,
    
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'columns' => array(
        //'id',
        //'cod_casa',
        'inicio',
        'fim',
        array(
            'name' => 'preco_mes',
            'value' => 'Yii::app()->numberFormatter->formatCurrency($data->preco_mes, "EUR")',
        ),
        //'preco_mes',
        'estadia_minima',
    ),
));
?>
