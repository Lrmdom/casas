<?php 
$this->layout='column2';
$this->menu = array(
    array('label' => 'Gerir Casa', 'url' => array('casa/admin')),
    array('label' => 'Gerir Proprietario', 'url' => array('proprietario/admin', 'id' => Yii::app()->user->id)),
        array('label' => 'Gerir Cliente', 'url' => array('cliente/admin')),
   array('label' => 'Gerir Reserva', 'url' => array('reserva/admin')),
       );
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'clienteid',
		'cliente',
		'telefone',
		'email',
		'morada',
		'cod_postal',
		'localidade',
		'pais',
		'subscribe_newsletter',
	),
)); ?>
