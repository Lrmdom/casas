<?php
$this->breadcrumbs = array(
    'Precos' => array('index'),
    'Gerir',
);
?>
<h3>Gerir Precos <?php echo $model->cod_casa; ?></h3>



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
    'id' => 'preco-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    "itemsCssClass" => 'table  table-bordered table-hover table-responsive table-condensed',
    'columns' => array(
        array(
            'class' => 'ButtonColumnExt',
        ),
        'id',
        'ano',
        'nm_mes',
        'n_semana',
        'cod_casa',
        'inicio',
    /*
      'fim',
      'preco',
      'livre',
      'reservar',
      'promo',
      'paga',
     */
    ),
));
?>
