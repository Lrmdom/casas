<?php
/* @var $this ClienteController */
/* @var $model Cliente */
$this->layout = 'column2';
$this->breadcrumbs = array(
    'Clientes' => array('index'),
    'Gerir',
);
?>

<h4><?php echo Yii::t("content", "Gestão de Clientes") ?></h4>




<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'cliente-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    "itemsCssClass" => 'table  table-bordered table-hover',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("cliente/delete", array("id"=>$data->clienteid))',
                ),
                'update' => array(
                    'url' => 'Yii::app()->createUrl("cliente/update", array("id"=>$data->clienteid))',
                ),
                'view' => array(
                    'url' => 'Yii::app()->createUrl("cliente/detail", array("id"=>$data->clienteid))',
                ),
            ),
        ),
        'clienteid',
        'cliente',
        //  'senha',
        //  'senha_repeat',
        //  'salt',
        'telefone',
        'email',
        array(
            'class' => 'JToggleColumn',
            "filter" => array(0 => "No", 1 => "Yes"),
            'name' => 'activo', // boolean model attribute (tinyint(1) with values 0 or 1)
            'action' => "cliente/switch", // other action, default is 'toggle' action
            'checkedButtonLabel' => '/images/checked.png', // Image,text-label or Html
            'uncheckedButtonLabel' => '/images/unchecked.png', // Image,text-label or Html
            'checkedButtonTitle' => 'Yes.Click to No', // tooltip
            'uncheckedButtonTitle' => 'No. Click to Yes', // tooltip
            'labeltype' => 'image', // New Option - may be 'image','html' or 'text'
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
    ),
));
?>
