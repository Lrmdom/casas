<?php
$this->breadcrumbs = array(
    'Precos' => array('index'),
    'Gerir',
);
?>
<h4><?php Yii::t("content", "Gestão de promoções") ?> </h4>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'preco-grid',
    'dataProvider' => $model->searchPromo(),
    'filter' => $model,
    'showTableOnEmpty' => FALSE,
    'ajaxUrl' => $this->createUrl('preco/adminPromo'),
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{update}{delete}{add}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("preco/deletePromo", array("id"=>$data->id))',
                ),
                'update' => array(
                    'url' => 'Yii::app()->createUrl("preco/updatePromo", array("id"=>$data->id))',
                ),
                'add' => array(
                    'url' => 'Yii::app()->createUrl("preco/newCasa",array("id"=>$data->cod_casa))',
                ),
            ),
        ),
        //'id',
//        'ano',
//        'nm_mes',
//        'n_semana',
        array('name' => 'cod_casa', 'header' => 'Casa', 'type' => 'raw', 'value' => '$data->cod_casa', 'htmlOptions' => array('class' => 'casaColumn viewMore', 'onClick' => 'showCasa($(this).text());')),
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
    ),
));
?>

