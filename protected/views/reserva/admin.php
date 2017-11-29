
<?php
$this->breadcrumbs = array(
    'Reservas' => array('admin'),
    'Gerir',
);
?>

<h4><?php echo Yii::t("content", "Gestão de Reservas futuras") ?></h4>
<h5 class="alert alert-warning"><?php echo Yii::t("content", "Não apague reservas. São usadas para estatísticas") ?></h5>


<?php
if (isset($idpreco)) {
    $idpreco = $idpreco;
    $url = $this->createUrl('reserva/admin/' . $idpreco);
    $dtprov = $model->search($idpreco);
} else {
    $url = $this->createUrl('reserva/admin/');
    $dtprov = $model->search(NULL);
}
?>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'reserva-grid',
    'dataProvider' => $dtprov,
    'ajaxUrl' => $url,
    'filter' => $model,
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{reply}{view}{delete}{payment}{calendar}{remCalendar}',
            'buttons' => array(
                'calendar' => array(
                    'label' => '<span class="glyphicon glyphicon-calendar icon-warning calendar"></span>',
                    'url' => 'Yii::app()->createUrl("reserva/addToCalendar", array("id"=>$data->id))',
                    'options' => array('title' => Yii::t("content", "Adicionar ao calendário")),
                    'visible' => '$data->eventid == ""'
                ),
                'remCalendar' => array(
                    'label' => '<span class="glyphicon glyphicon-file icon-love remcalendar"></span>',
                    'url' => 'Yii::app()->createUrl("reserva/remFromCalendar", array("id"=>$data->id))',
                    'options' => array('title' => Yii::t("content", "Apagar no calendário")),
                    'visible' => '$data->eventid != ""'
                ),
                'reply' => array(
                    'label' => '<span class="glyphicon glyphicon-envelope reply"></span>',
                    'url' => 'Yii::app()->createUrl("reserva/thankAndDetail", array("id"=>$data->id))',
                    'options' => array('title' => Yii::t("content", 'Enviar email de agradecimento e situação')),
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
                    'options' => array('title' => Yii::t("content", 'Alterar estado e pagamento')),
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
    ),
));
?>
