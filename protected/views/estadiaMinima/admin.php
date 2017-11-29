<?php
/* @var $this EstadiaMinimaController */
/* @var $model EstadiaMinima */

$this->breadcrumbs = array(
    'Estadia Minimas' => array('index'),
    'Gerir',
);

$this->menu = array(
    array('label' => 'List EstadiaMinima', 'url' => array('index')),
    array('label' => 'Nova EstadiaMinima', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('estadia-minima-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Gerir Estadia Minimas</h3>



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
    'id' => 'estadia-minima-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    
    "itemsCssClass" => 'table  table-bordered table-hover',
    'columns' => array(
        'id',
        'estadia_min',
        array(
            'class' => 'ButtonColumnExt',
        ),
    ),
));
?>
