<?php
/* @var $this MylistController */
/* @var $model Mylist */

$this->breadcrumbs = array(
    'Mylists' => array('index'),
    'Gerir',
);

$this->menu = array(
    array('label' => 'List Mylist', 'url' => array('index')),
    array('label' => 'Nova Mylist', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mylist-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Gerir Mylists</h3>





<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'mylist-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    
    "itemsCssClass" => 'table  table-bordered table-hover',
    'columns' => array(
        'id',
        'cod_casa',
        'mylistcol',
        'sessid',
        'cliente',
        'data',
        array(
            'class' => 'ButtonColumnExt',
        ),
    ),
));
?>
