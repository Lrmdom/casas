<h4><?php echo Yii::t('content', 'Entregas') ?></h4>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'reserva-payment-grid',
    'dataProvider' => $model->search($reserva->id, $reserva->precos->id),
    'showTableOnEmpty' => FALSE,
    'hideHeader' => TRUE,
    'emptyText' => '',
    'summaryText' => '',
    "itemsCssClass" => 'table  table-bordered table-hover',
    'columns' => array(
        'data',
        //'id_pagamento',
        array('name' => 'id_tipo_pagamento', 'value' => '$data->tipopayments->tipo_pagamento'),
        'valor',
        array(
            'name' => 'valor',
            'type' => 'text',
            'footer' => $model->getTotals($reserva->id),
        ),
    ),
));
?>
