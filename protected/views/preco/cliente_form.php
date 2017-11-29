<div class="dPicker" style=""></div>


<?php
Yii::import('application.controllers.PrecoController');
$pc = new PrecoController(1);



$pc->actionCalendar($cod_casa, $model->id);
?>

<?php
$pth = Yii::app()->createUrl('reserva/ajaxform');

$js2 = '';
$js2 = $js2 .
        "
       $(document).ready(function(){
       if ($(window).width() > 768){
      $('.dPicker').datepicker({minDate:0 , beforeShowDay: Days ,numberOfMonths: [3,4], stepMonths: 4,showOtherMonths: false, firstDay: 1,changeFirstDay: false,showButtonPanel: false, dateFormat: 'yy-mm-dd'

});
}else{
      $('.dPicker').datepicker({minDate:0 , beforeShowDay: Days ,numberOfMonths: [2,2], stepMonths: 4,showOtherMonths: false, firstDay: 1,changeFirstDay: false,showButtonPanel: false, dateFormat: 'yy-mm-dd'
});
}
});
";


Yii::app()->clientScript->registerScript('1', $js2, CClientScript::POS_END);
?>

