<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Yii::app()->clientScript->scriptMap['jquery.yiigridview.js'] = false;
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'reserva-grid-feedback',
    // 'hideHeader' => TRUE,
    'summaryText' => '',
    'showTableOnEmpty' => FALSE,
    'emptyText' => 'Não tem reservas atribuidas a esta casa',
    'dataProvider' => $model->searchClienteReservaFeedback($cod_casa),
    
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'selectableRows' => 1,
    'selectionChanged' => 'selectReserva ',
    'columns' => array(
        array('name' => 'Reserva', 'value' => '$data->id'),
        array('name' => 'casa', 'value' => '$data->precos->cod_casa'),
        array('name' => 'valor', 'value' => 'Yii::app()->numberFormatter->formatCurrency($data->precos->preco, "EUR")'),
        array('name' => 'inicio', 'value' => '$data->precos->inicio'),
        array('name' => 'fim', 'value' => '$data->precos->fim'),
    ),
));
?>

<script>
    function selectReserva() {


        var id = $.fn.yiiGridView.getSelection("reserva-grid-feedback");
        $('.nReservaAppend').html(' Reserva ' + id);
        $('#Feedback_reserva').val(id);

    }
</script>
