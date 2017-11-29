<?php
/* @var $this VisitaController */
/* @var $model Visita */

$this->breadcrumbs = array(
    'Visitas' => array('index'),
    'Gerir',
);

$this->menu = array(
    array('label' => 'List Visita', 'url' => array('index')),
    array('label' => 'Nova Visita', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('visita-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Gerir Visitas</h3>



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
    'id' => 'visita-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    
    "itemsCssClass" => 'table  table-bordered table-hover',
    'columns' => array(
        'id',
        'cliente',
        'cod_casa',
        'data',
        'hora',
        array(
            'class' => 'ButtonColumnExt',
        ),
    ),
));
?>
