<?php $this->renderPartial('//site/flashMessage'); ?>

<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'periodo-grid',
    'dataProvider' => $model->search($_GET['id']),
    //'filter' => $model,
    'summaryText' => '',
    'showTableOnEmpty' => FALSE,
    
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'columns' => array(
        //'cod_casa',
        //'descricao',

        'inicio',
        'fim',
        array(
            'name' => 'preco_semana',
            'value' => 'Yii::app()->numberFormatter->formatCurrency($data->preco_semana, "EUR")',
        ),
        array(
            'name' => 'preco_fimsemana',
            'value' => 'Yii::app()->numberFormatter->formatCurrency($data->preco_fimsemana, "EUR")',
        ),
        array(
            'name' => 'preco_dia',
            'value' => 'Yii::app()->numberFormatter->formatCurrency($data->preco_dia, "EUR")',
        )
        ,
        'estadia_minima',
        array(
            'type' => 'raw',
            'name' => 'observacoes',
            'value' => 'CHtml::label($data->observacoes,"#",array("class"=>"hidden-xs"))',
        ),
    ),
));
?>
