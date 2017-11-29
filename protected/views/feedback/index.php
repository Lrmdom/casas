<?php

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => Feedback::model()->search($model->cod_casa),
    'itemView' => '//feedback/_view',
    "emptyText" => "Ainda não foi atribuido feedback.",
    "summaryText" => ""
));
?>
