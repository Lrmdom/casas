

<?php

$this->layout = "search";
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $model->search(),
    'itemView' => '//casa/_view',
));
?>

