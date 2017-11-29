<?php
$this->breadcrumbs = array(
    'Proprietarios' => array('index'),
    'Gerir',
);
?>

<h4><?php echo Yii::t("content", "Gerir Proprietários") ?></h4>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'proprietario-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'ajaxUrl' => $this->createUrl('proprietario/admin'),
    "itemsCssClass" => 'table  table-bordered table-hover',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
        ),
        'propid',
        'proprietario',
        //'senha',
        'telefone',
        'email',
        array(
            'class' => 'JToggleColumn',
            "filter" => array(0 => "No", 1 => "Yes"),
            'name' => 'activo', // boolean model attribute (tinyint(1) with values 0 or 1)
            'action' => "proprietario/switch", // other action, default is 'toggle' action
            'checkedButtonLabel' => '/images/checked.png', // Image,text-label or Html
            'uncheckedButtonLabel' => '/images/unchecked.png', // Image,text-label or Html
            'checkedButtonTitle' => 'Yes.Click to No', // tooltip
            'uncheckedButtonTitle' => 'No. Click to Yes', // tooltip
            'labeltype' => 'image', // New Option - may be 'image','html' or 'text'
            'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
        ),
    //'morada',
    /*
      'cod_postal',
      'localidade',
      'conflito1',
      'conflito2',
      'conflito3',
      'sessid',
      'pais',
     */
    ),
));
?>
