<?php

if (isset($cod_casa)) {
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'periodo-longo-grid',
        'dataProvider' => $model->search($cod_casa),
        //'filter' => $model,
        'ajaxUrl' => $this->createUrl('periodoLongo/admin'),
        
        "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
        'columns' => array(
            //'id',
            //'cod_casa',
            array(
                'class' => 'ButtonColumnExt',
                'template' => '{update}{delete}',
                'buttons' => array(
                    'delete' => array(
                        'url' => 'Yii::app()->createUrl("periodoLongo/delete", array("id"=>$data->id))',
                        'visible' => 'Yii::app()->user->getState("isAdmin")=="Back"'
                    ),
                    'update' => array(
                        'url' => 'Yii::app()->createUrl("periodoLongo/update", array("id"=>$data->id,"update"=>1))',
                        'visible' => 'Yii::app()->user->getState("isAdmin")=="Back"'
                    ),
                ),
            ),
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
}
?>
