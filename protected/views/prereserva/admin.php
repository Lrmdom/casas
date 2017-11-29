<?php
$this->breadcrumbs = array(
    'Prereservas' => array('index'),
    'Gerir',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('prereserva-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Gerir Prereservas</h3>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('../prereserva/_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'prereserva-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    
    "itemsCssClass" => 'table  table-bordered table-hover',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
        ),
        'n_prereserva',
        'data',
        'expira',
        'id',
        'cod_casa',
        'nm_mes',
    /*
      'n_semana',
      'inicio',
      'fim',
      'preco',
      'quinzena',
      'Nome',
      'morada',
      'email',
      'telefone',
      'perguntas',
      'sugestoes',
      'Comentarios',
      'situacao',
      'forma_pagamento',
      'valor',
      'sessionid',
      'voto',
     */
    ),
));
?>
