<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

<div class="container-fluid">

    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">

        <?php
        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">= 1" : "=" . Yii::app()->user->id;

        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'preco-form-stats',
            'enableClientValidation' => true,
            'clientOptions' => array('validateOnSubmit' => true,),
            //'enableAjaxValidation' => true,
            'action' => Yii::app()->createUrl('casa/showStats'), 'htmlOptions' => array(
                'onsubmit' => "return false;", /* Disable normal form submit */
                'onkeypress' => " if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
            ),
        ));
        ?>
        <?php echo $form->errorSummary($model); ?>


        <div class="form-group">
            <?php echo $form->labelEx($model, 'cod_casa'); ?>
            <?php echo $form->dropDownList($model, 'cod_casa', CHtml::listData(Casa::model()->findAll("activo=1 and for_rent=1 and propid $uid"), 'cod_casa', "idTitle"), array('prompt' => Yii::t("content", "Escolha uma casa"), "class" => "form-control")); ?>
            <?php echo $form->error($model, 'cod_casa'); ?>
        </div>


        <?php $this->endWidget(); ?>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ajx">

        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('#Casa_cod_casa').change(function() {
                $(".ajx").load('<?php echo $this->createUrl("casa/showStats") ?>' + '/' + $(this).val());

            });

        });



    </script>

</div>