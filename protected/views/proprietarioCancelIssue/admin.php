<?php
$this->breadcrumbs = array(
    'Proprietario Cancel Issues' => array('index'),
    'Gerir',
);

$this->menu = array(
    array('label' => 'List ProprietarioCancelIssue', 'url' => array('index')),
    array('label' => 'Nova ProprietarioCancelIssue', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('proprietario-cancel-issue-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Gerir Proprietario Cancel Issues</h3>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

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
    'id' => 'proprietario-cancel-issue-grid',
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
