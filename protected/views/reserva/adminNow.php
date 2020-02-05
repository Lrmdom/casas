
<?php
$this->breadcrumbs = array(
    'Reservas' => array('admin'),
    'Gerir',
);
?>

<h4><?php echo Yii::t("content", "Gestão de Reservas em curso") ?></h4>
<h5 class="alert alert-warning"><?php echo Yii::t("content", "Não apague reservas. São usadas para estatísticas") ?></h5>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'reserva-grid-now',
    'dataProvider' => $model->searchNow(),
    //'ajaxUrl' => $url,
    'filter' => $model,
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{reply}{view}{delete}{payment}',
            'buttons' => array(
                'reply' => array(
                    'label' => '<span class="glyphicon glyphicon-envelope reply"></span>',
                    'url' => 'Yii::app()->createUrl("reserva/remenberFeedback", array("id"=>$data->id))',
                    'options' => array('title' => 'Enviar email agradecimento e pedir feedback'),
                ),
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("reserva/delete", array("id"=>$data->id))',
                ),
                'view' => array(
                    'url' => 'Yii::app()->createUrl("reserva/view", array("id"=>$data->id))',
                ),
                'payment' => array(
                    'label' => '<span class="glyphicon glyphicon-usd payment"></span>',
                    'url' => 'Yii::app()->createUrl("reservaPayment/create", array("idreserva"=>$data->id,"idpreco"=>$data->precos->id))',
                    'options' => array('title' => 'Alterar estado e pagamento'),
                    'visible' => '$data->reserva_state != 4'
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
            default:
                return '';
        }
    }
        ),
        array('name' => 'casa', 'header' => 'Casa', 'type' => 'raw', 'value' => '$data->precos->cod_casa', 'htmlOptions' => array('class' => 'casaColumn viewMore', 'onClick' => 'showCasa($(this).text());')),
        array('name' => 'cliente', 'header' => 'Cliente', 'type' => 'raw', 'value' => '$data->idcliente', 'htmlOptions' => array('class' => 'clienteColumn viewMore', 'onClick' => 'showClient($(this).text());')),
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
    ),
));
?>
