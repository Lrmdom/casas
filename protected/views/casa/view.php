<?php
$this->layout = 'column2';
?>


<a id="mprint1222" href="<?php echo Yii::app()->createUrl('//casa/print', array('id' => $model->cod_casa)); ?>">
    <img alt="" src="/assets/76277e22/printer.png" title="testing the print">
    Print
</a>
<?php echo $this->renderPartial('clientView', array('model' => $model, 'js' => $js)); ?>

