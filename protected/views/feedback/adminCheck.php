
<h4><?php echo Yii::t("content", "Gerir Feedback") ?></h4>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'feedback-grid',
    'dataProvider' => $model->searchCheck(),
    'filter' => $model,
    'showTableOnEmpty' => FALSE,
    'ajaxUrl' => $this->createUrl('feedback/admin'),
    "itemsCssClass" => 'table  table-bordered table-hover',
    //'emptyText' => '',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{update}{delete}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("feedback/delete", array("id"=>$data->id))',
                ),
                'update' => array(
                    'url' => 'Yii::app()->createUrl("feedback/update", array("id"=>$data->id))',
                ),
            ),
        ),
        //'id',
        //'cod_casa',
        'valor_voto',
        'comment',
        array('name' => 'id_cliente', 'header' => 'Cliente', 'type' => 'raw', 'value' => '$data->id_cliente ', 'htmlOptions' => array('class' => 'clienteColumn viewMore', 'onClick' => 'showClient($(this).text());')),
        array('name' => 'reserva', 'header' => 'Reserva', 'type' => 'raw', 'value' => '$data->reserva ', 'htmlOptions' => array('class' => 'reservaColumn viewMore', 'onClick' => 'showReserva($(this).text());')),
        array(
            'class' => 'JToggleColumn',
            "filter" => array(0 => "No", 1 => "Yes"),
            'name' => 'revisto', // boolean model attribute (tinyint(1) with values 0 or 1)
            'action' => "feedback/switch", // other action, default is 'toggle' action
            'checkedButtonLabel' => '/images/checked.png', // Image,text-label or Html
            'uncheckedButtonLabel' => '/images/unchecked.png', // Image,text-label or Html
            'checkedButtonTitle' => 'Yes.Click to No', // tooltip
            'uncheckedButtonTitle' => 'No. Click to Yes', // tooltip
            'labeltype' => 'image', // New Option - may be 'image','html' or 'text'
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        array(
            'class' => 'JToggleColumn',
            "filter" => array(0 => "No", 1 => "Yes"),
            'name' => 'aproved', // boolean model attribute (tinyint(1) with values 0 or 1)
            'action' => "feedback/switch", // other action, default is 'toggle' action
            'checkedButtonLabel' => '/images/checked.png', // Image,text-label or Html
            'uncheckedButtonLabel' => '/images/unchecked.png', // Image,text-label or Html
            'checkedButtonTitle' => 'Yes.Click to No', // tooltip
            'uncheckedButtonTitle' => 'No. Click to Yes', // tooltip
            'labeltype' => 'image', // New Option - may be 'image','html' or 'text'
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{update}{delete}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("feedback/delete", array("id"=>$data->id))',
                ),
                'update' => array(
                    'url' => 'Yii::app()->createUrl("feedback/update", array("id"=>$data->id))',
                ),
            ),
        ),
    ),
));
?>
