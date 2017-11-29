
<h4><?php echo Yii::t("content", "Gerir Pre-reservas") ?></h4>

<?php
if (isset($cod_casa)) {
    $id = $cod_casa;
} else {
    $id = $_GET['id'];
}


$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'reserva-grid',
    'dataProvider' => $model->searchprereservas(),
    'ajaxUpdate' => true,
    'showTableOnEmpty' => FALSE,
    'ajaxUrl' => $this->createUrl('reserva/prereservas/'),
    'filter' => $model,
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{view}{delete}{reply}{payment}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("reserva/delete", array("id"=>$data->id))',
                ),
                'view' => array(
                    'url' => 'Yii::app()->createUrl("reserva/view", array("id"=>$data->id))',
                ),
                'reply' => array(
                    'label' => '<span class="glyphicon glyphicon-envelope reply"></span>',
                    'url' => 'Yii::app()->createUrl("reserva/remenberpay", array("id"=>$data->id))',
                    'options' => array('title' => 'Enviar email lembrete pagamento'),
                ),
                'payment' => array(
                    'label' => '<span class="glyphicon glyphicon-usd payment"></span>',
                    'url' => 'Yii::app()->createUrl("payment/create", array("idreserva"=>$data->id,"idpreco"=>$data->precos->id))',
                    'options' => array('title' => 'Alterar estado e pagamento'),
                ),
            ),
        ),
        array('name' => 'id', 'type' => 'raw', 'value' => 'CHtml::link($data->id, array("reserva/view", "id"=>$data->id))', 'header' => 'Nº', 'htmlOptions' => array('class' => 'reservaColumn viewMore', 'onClick' => 'showReserva($(this).text());')),
        'data',
        array('name' => 'valor', 'value' => 'Yii::app()->numberFormatter->formatCurrency($data->precos->preco, "EUR")'),
        array('name' => 'inicio', 'value' => '$data->precos->inicio'),
        array('name' => 'fim', 'value' => '$data->precos->fim'),
        array('name' => 'state', 'value' => '$data->states->state'),
        array('name' => 'casa', 'value' => '$data->precos->cod_casa', 'htmlOptions' => array('class' => 'casaColumn viewMore', 'onClick' => 'showCasa($(this).text());')),
        array('name' => 'cliente', 'type' => 'raw', 'header' => 'Cliente', 'value' => '$data->cliente->clienteid', 'htmlOptions' => array('class' => 'clienteColumn viewMore', 'onClick' => 'showClient($(this).text());')),
    ),
));
?>

