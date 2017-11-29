<?php
/* @var $this compareController */
/* @var $model compare */

$this->breadcrumbs = array(
    'compares' => array('index'),
    'Gerir',
);

$this->menu = array(
    array('label' => 'List compare', 'url' => array('index')),
    array('label' => 'Nova compare', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('compare-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Gerir compares</h3>





<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'compare-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    
    "itemsCssClass" => 'table  table-bordered table-hover',
    'columns' => array(
        'id',
        'cod_casa',
        'comparecol',
        'sessid',
        'cliente',
        'data',
        array(
            'class' => 'ButtonColumnExt',
        ),
    ),
));
?>
