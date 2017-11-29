<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'reserva-grid-feedback',
    'dataProvider' => $model->searchFeedback(),
    'ajaxUpdate' => true,
    'ajaxUrl' => $this->createUrl('reserva/adminFeedback'),
    'filter' => $model,
    'showTableOnEmpty' => FALSE,
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{reply}',
            'buttons' => array(
                'reply' => array(
                    'label' => '<span class="glyphicon glyphicon-envelope reply"></span>',
                    'url' => 'Yii::app()->createUrl("reserva/remenberFeedback", array("id"=>$data->id))',
                    'options' => array('title' => 'Enviar email lembrete de feedback'),
                ),
            ),
        ),
        array('name' => 'id', 'type' => 'raw', 'value' => 'CHtml::link($data->id, array("reserva/view", "id"=>$data->id))', 'header' => 'Nº', 'htmlOptions' => array('class' => 'reservaColumn viewMore', 'onClick' => 'showReserva($(this).text());')),
        'data',
        array('name' => 'valor', 'value' => 'Yii::app()->numberFormatter->formatCurrency($data->precos->preco, "EUR")'),
        array('name' => 'inicio', 'value' => '$data->precos->inicio'),
        array('name' => 'fim', 'value' => '$data->precos->fim'),
        array('name' => 'state', 'value' => '$data->states->state'),
        // array('name' => 'preco.cod_casa', 'value' => $id),
        array('name' => 'cliente', 'header' => 'Cliente', 'value' => '$data->idcliente', 'htmlOptions' => array('class' => 'clienteColumn viewMore', 'onClick' => 'showClient($(this).text());')),
    ),
));
?>