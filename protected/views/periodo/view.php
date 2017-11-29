<?php
/* @var $this PeriodoController */
/* @var $model Periodo */

$this->breadcrumbs = array(
    'Periodos' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Periodo', 'url' => array('index')),
    array('label' => 'Create Periodo', 'url' => array('create')),
    array('label' => 'Update Periodo', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Periodo', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Gerir Periodo', 'url' => array('admin')),
);
?>
<?php $this->renderPartial('//site/flashMessage'); ?>

<h3>View Periodo #<?php echo $model->id; ?></h3>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'cod_casa',
        'inicio',
        'fim',
        'preco_semana',
        'preco_dia',
        'preco_fimsemana',
        'estadia_minima',
    ),
));
?>
