<?php
$this->breadcrumbs = array(
    'Casacancelissues' => array('index'),
    'Gerir',
);

$this->menu = array(
    array('label' => 'List Casacancelissue', 'url' => array('index')),
    array('label' => 'Nova Casacancelissue', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('casacancelissue-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Gerir Casacancelissues</h3>



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
    'id' => 'casacancelissue-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    
    "itemsCssClass" => 'table  table-bordered table-hover',
    'columns' => array(
        'id',
        'propid',
        'descricao',
        array(
            'class' => 'ButtonColumnExt',
        ),
    ),
));
?>
