<?php
$this->breadcrumbs = array(
    'Precos' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Preco', 'url' => array('index')),
    array('label' => 'Gerir Preco', 'url' => array('admin?cod_casa=' . Yii::app()->request->getQuery('cod_casa'))),
    array('label' => 'Gerir Casa', 'url' => array('casa/admin')),
);
?>

<h3>Create Preco <?php echo $_GET['cod_casa'] ?></h3>

<?php $this->renderPartial('//site/flashMessage'); ?>


<?php
echo PrecoController::actionValida();
//echo Yii::app()->params['abc'];
?>
<?php echo $this->renderPartial('_form', array('model' => $model)); //,'modelCasa'=>$modelCasa)); ?>
