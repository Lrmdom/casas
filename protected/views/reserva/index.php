<?php
$this->breadcrumbs = array(
    'Reservas',
);
?>

<h3>Reservas</h3>
<div>class="container"
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '//reserva/_view',
));
?>
</div>