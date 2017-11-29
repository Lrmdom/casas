<?php header("Content-type: text/xml"); ?>

<?php

echo "<markers>" . "\n";
$results = $model->isearchMapMap()->getData();
foreach ($results as $marker) {
    $url = Yii::app()->createUrl('casa/client/' . $marker->cod_casa);
    echo "<marker casa='" . $marker->cod_casa . "' lat='", $marker->lat, "' lng='", $marker->lng, "' label='&lt;a href=$url&gt; $marker->tipo $marker->tipoalojamento '", "  html='&lt;img src=/uploads/", $marker->img_1, " width=100 height=70&gt;'   ", "/>" . "\n";
}
echo "</markers>";
?>

