<?php
/* @var $this ReservaStateController */
/* @var $model ReservaState */

$this->breadcrumbs = array(
    'Reserva States' => array('index'),
    'Gerir',
);

$this->menu = array(
    array('label' => 'List ReservaState', 'url' => array('index')),
    array('label' => 'Nova ReservaState', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reserva-state-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Gerir Reserva States</h3>



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
    'id' => 'reserva-state-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    
    "itemsCssClass" => 'table  table-bordered table-hover',
    'columns' => array(
        'id',
        'state',
        array(
            'class' => 'ButtonColumnExt',
        ),
    ),
));
?>
