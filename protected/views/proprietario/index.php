<?php
$this->breadcrumbs = array(
    'Proprietarios',
);

$this->menu = array(
    array('label' => 'Create Proprietario', 'url' => array('create'), 'visible' => Yii::app()->user->name == 'admin'),
   array('label' => 'Gerir Proprietario', 'url' => array('admin'), 'visible' => Yii::app()->user->name == 'admin'),
        //array('label' => 'Gerir Casas', 'url' => array('casa/admin', 'id'=>$model->propid)),
);
?>



<h3>Proprietarios</h3>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
