<h4><?php echo Yii::t("content", "Gerir Reservas") ?></h4>
<h5 class="alert alert-warning"><?php echo Yii::t("content", "Não apague reservas. São usadas para estatísticas") ?></h5>

<?php
if (isset($cod_casa)) {
    $id = $cod_casa;
} else {
    $id = $_GET['id'];
}



$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'reserva-grid',
    'dataProvider' => $model->searchAll($id),
    'ajaxUpdate' => true,
    'ajaxUrl' => $this->createUrl('reserva/adminAll/' . $id),
    'filter' => $model,
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{view}{delete}{payment}',
            'buttons' => array(
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
        // array('name' => 'preco.cod_casa', 'value' => $id),
        array('name' => 'cliente', 'header' => 'Cliente', 'value' => '$data->idcliente', 'htmlOptions' => array('class' => 'clienteColumn viewMore', 'onClick' => 'showclient($(this).text());')),
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

