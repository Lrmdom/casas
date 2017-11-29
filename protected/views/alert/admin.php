<?php
/* @var $this AlertController */
/* @var $model Alert */

$this->breadcrumbs = array(
    'Alerts' => array('index'),
    'Gerir',
);

$this->menu = array(
    array('label' => 'List Alert', 'url' => array('index')),
    array('label' => 'Nova Alert', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('alert-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Gerir Alerts</h3>


<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'alert-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    
    "itemsCssClass" => 'table  table-bordered table-hover',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
        ),
        'id',
        'id_cliente',
        'id_tipo_alojamento',
        'id_tipo',
        'valor',
        'pessoas',
        /*
          'destino',
          'for_rent',
          'for_sale',
          'for_arrenda',
         */
        array(
            'class' => 'ButtonColumnExt',
        ),
    ),
));
?>
