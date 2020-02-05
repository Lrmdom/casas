<h4><?php echo Yii::t("content", "Gestão de Pagamentos") ?></h4>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'reserva-payment-grid',
   // 'dataProvider'=>$model->search($data->idreserva,$data->idpreco),
    //'dataProvider' => $model->search($idreserva, $idpreco),
    'dataProvider' => $model->search(),
    'filter' => $model,
    //
    "itemsCssClass" => 'table  table-bordered table-hover',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{view}{delete}{add}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("reservaPayment/delete", array("id"=>$data->id))',
                ),
                'view' => array(
                    'url' => 'Yii::app()->createUrl("reservaPayment/view", array("id"=>$data->id))',
                ),
                'add' => array(
                    'url' => 'Yii::app()->createUrl("reservaPayment/create", array("idreserva"=>$data->idreserva,"idpreco"=>$data->idpreco))',
                ),
            ),
        ),
        'id',
        'data',
        'id_pagamento',
        array('name' => 'id_tipo_pagamento', 'value' => '$data->tipopayments->tipo_pagamento',
            'filter' => CHtml::listData(TipoPagamento::model()->findAll(array('order' => 'tipo_pagamento')), 'id', 'tipo_pagamento')
        ),
        'valor',
        array('name' => 'idreserva', 'type' => 'raw', 'value' => 'CHtml::link($data->idreserva, array("reserva/view", "id"=>$data->idreserva))', 'header' => 'Reserva', 'htmlOptions' => array('class' => 'reservaColumn viewMore', 'onClick' => 'showReserva($(this).text());')),
    ),
));
?>
