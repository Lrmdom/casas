
<?php
$this->breadcrumbs = array(
    'Reservas' => array('admin'),
    'Gerir',
);
?>

<h4><?php echo Yii::t("content", "Gestão de Reservas arquivadas") ?></h4>
<h5 class="alert alert-warning"><?php echo Yii::t("content", "Não apague reservas. São usadas para estatísticas") ?></h5>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'reserva-grid-archive',
    'dataProvider' => $model->searchArchive(),
    'ajaxUrl' => $url,
    'filter' => $model,
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{view}{delete}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("reserva/delete", array("id"=>$data->id))',
                ),
                'view' => array(
                    'url' => 'Yii::app()->createUrl("reserva/view", array("id"=>$data->id))',
                ),
            ),
        ),
        array('name' => 'id', 'type' => 'raw', 'value' => 'CHtml::link($data->id, array("reserva/view", "id"=>$data->id))', 'header' => 'Nº'),
        'data',
        array('name' => 'valor', 'value' => 'Yii::app()->numberFormatter->formatCurrency($data->precos->preco, "EUR")'),
        array('name' => 'inicio', 'value' => '$data->precos->inicio'),
        array('name' => 'fim', 'value' => '$data->precos->fim'),
        array('name' => 'reserva_state',
            'type' => 'raw',
            'value' => '$data->states->state',
            'cssClassExpression' => function($row, $data) {
        switch ($data->states->state) {
            case 'reserva':
                return 'icon-warning';
            case 'paga':
                return 'icon-success';
            case 'anulada':
                return 'icon-love';
            default:
                return '';
        }
    }
        ),
        array('name' => 'casa', 'header' => 'Casa', 'type' => 'raw', 'value' => '$data->precos->cod_casa', 'htmlOptions' => array('class' => 'casaColumn viewMore', 'onClick' => 'showCasa($(this).text());')),
        array('name' => 'cliente', 'header' => 'Cliente', 'type' => 'raw', 'value' => '$data->idcliente ', 'htmlOptions' => array('class' => 'clienteColumn viewMore', 'onClick' => 'showClient($(this).text());')),
        array(
            'type' => 'text',
            'header' => Yii::t("content", "Saldo"),
            'value' => 'ReservaPayment::model()->getTotals($data->id)',
            'cssClassExpression' => function($row, $data) {

        if (ReservaPayment::model()->getTotals($data->id) >= 0)
            return 'alert alert-success';
        if (ReservaPayment::model()->getTotals($data->id) < 0)
            return 'alert alert-danger';
    }
        ),
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{view}{delete}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("reserva/delete", array("id"=>$data->id))',
                ),
                'view' => array(
                    'url' => 'Yii::app()->createUrl("reserva/view", array("id"=>$data->id))',
                ),
            ),
        ),
    ),
));
?>
