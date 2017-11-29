<?php

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/jquery.rating.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.rating.js');
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => Feedback::model()->searchCliente(),
    'itemView' => '//feedback/_view',
    "emptyText" => "Ainda não foi atribuido feedback.",
    "summaryText" => ""
));
?>
