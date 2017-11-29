<?php
/* @var $this VisitaController */
/* @var $dataProvider CActiveDataProvider */

?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->search(),
	'itemView'=>'//visita/_view',
)); ?>
