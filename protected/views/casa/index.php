<?php
$this->breadcrumbs = array(
    'Casas',
);
echo Yii::app()->user->name;
?>

<h3>Casas</h3>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
