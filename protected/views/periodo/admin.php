<?php $this->renderPartial('//site/flashMessage'); ?>

<?php

if (!isset($cod_casa)) {
    $cod_casa = $model->cod_casa;
}
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'periodo-grid',
    'dataProvider' => $model->search($cod_casa),
    'filter' => $model,
    'ajaxUrl' => $this->createUrl('periodo/admin/', array('id' => $cod_casa)),
    'summaryText' => '',
    'showTableOnEmpty' => FALSE,
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'columns' => array(
//'cod_casa',
//'descricao',
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{update}{delete}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("periodo/delete", array("id"=>$data->id))',
                    'visible' => 'Yii::app()->user->getState("isAdmin")=="Back"'
                ),
                'update' => array(
                    'url' => 'Yii::app()->createUrl("periodo/update", array("id"=>$data->id,"update"=>1,"cod_casa"=>$data->cod_casa))',
                    'visible' => 'Yii::app()->user->getState("isAdmin")=="Back"'
                ),
            ),
        ),
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
