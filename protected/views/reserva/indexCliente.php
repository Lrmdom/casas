<?php

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $model->searchCliente(),
    'itemView' => '//reserva/_view',
    'sortableAttributes' => array(
        'states.state',
        'inicio',
        'fim',
    ),
));
?>