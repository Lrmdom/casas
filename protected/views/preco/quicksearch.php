<?php
$this->layout='column1';

$this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$model->isearch(),
        'itemView'=>'_view',
    //'id'=>'#casas',
    'ajaxUrl'=>array($this->getRoute()),
   // 'sortableAttributes'=>array('cod_casa','tipo','pessoas','destino'),
   
));

?>
