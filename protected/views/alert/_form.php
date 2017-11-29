<?php
/* @var $this AlertController */
/* @var $model Alert */
/* @var $form CActiveForm */
?>
<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-1">
        </div>
        <div class="col-lg-8 col-md-8 col-sm-10">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'alert-form',
                'htmlOptions' => array(
                    'class' => 'form-horizontal',
                    'role' => 'form',
                ),
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                )
            ));
            ?>

            <p class="note"> </p>

            <?php echo $form->errorSummary($model); ?>


            <?php echo $form->hiddenField($model, 'id_cliente', array('value' => Yii::app()->user->id)); ?>


            <div class="form-group form-inline">
                <?php echo $form->labelEx($model, 'id_tipo_alojamento'); ?>
                <?php echo $form->dropDownList($model, 'id_tipo_alojamento', CHtml::listData(TipoAlojamento::model()->findAll(), 'tipo_alojamento', 'tipo_alojamento'), array('prompt' => 'Select Tipo Alojamento', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'id_tipo_alojamento'); ?>
            </div>

            <div class="form-group form-inline">
                <?php echo $form->labelEx($model, 'id_tipo'); ?>
                <?php echo $form->dropDownList($model, 'id_tipo', CHtml::listData(Tipo::model()->findAll(), 'tipo', 'tipo'), array('prompt' => 'Select Tipo ', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'id_tipo'); ?>
            </div>
            <div class="form-group form-inline">
                <?php echo $form->labelEx($model, 'destino'); ?>
                <?php echo $form->dropDownList($model, 'destino', CHtml::listData(Destino::model()->findAll(), 'destino', 'destino'), array('prompt' => 'Select Destino', 'class' => 'form-control')); ?>

                <?php echo $form->error($model, 'destino'); ?>
            </div>
            <div class="form-group form-inline">
                <?php echo $form->labelEx($model, 'pessoas'); ?>
                <?php echo $form->textField($model, 'pessoas', array('placeholder' => 'nº maximo de pessoas', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'pessoas'); ?>
            </div>
            <div class="form-group form-inline">
                <?php echo $form->labelEx($model, 'for_rent'); ?>
                <?php echo $form->checkBox($model, 'for_rent', array('uncheckValue' => '', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'for_rent'); ?>
            </div>
            <div class="form-group form-inline vrent">
                <?php echo $form->labelEx($model, 'inicio'); ?>
                <?php echo $form->textField($model, 'inicio', array('class' => 'datepick', 'id' => 'datepickStart', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'inicio'); ?>
            </div>
            <div class="form-group form-inline vrent">

                <?php echo $form->labelEx($model, 'fim'); ?>
                <?php echo $form->textField($model, 'fim', array('class' => 'datepick', 'id' => 'datepickEnd', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'fim'); ?>
            </div>
            <div class="form-group form-inline vrent">

                <?php echo $form->labelEx($model, 'valor_rent'); ?>
                <?php echo $form->textField($model, 'valor_rent', array('placeholder' => 'Valor máximo', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'valor_rent'); ?>
            </div>


            <div class="form-group form-inline">
                <?php echo $form->labelEx($model, 'for_sale'); ?>
                <?php echo $form->checkBox($model, 'for_sale', array('uncheckValue' => '', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'for_sale'); ?>
            </div>
            <div class="form-group form-inline vvenda">
                <?php echo $form->labelEx($model, 'valor_venda'); ?>
                <?php echo $form->textField($model, 'valor_venda', array('placeholder' => 'Valor máximo', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'valor_venda'); ?>
            </div>

            <div class="form-group form-inline">
                <?php echo $form->labelEx($model, 'for_arrenda'); ?>
                <?php echo $form->checkBox($model, 'for_arrenda', array('uncheckValue' => '', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'for_arrenda'); ?>
            </div>
            <div class="form-group form-inline varrenda">

                <?php echo $form->labelEx($model, 'valor_arrenda'); ?>
                <?php echo $form->textField($model, 'valor_arrenda', array('placeholder' => 'Valor máximo', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'valor_arrenda'); ?>
            </div>

            <div class="form-group form-inline">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-lg btn-primary')); ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-1">
        </div>
    </div>
</div>
<script>


    if ($('#Alert_for_arrenda').attr('checked') == 'checked')
    {
        $('.varrenda').css('display', 'inline');
    }
    if ($('#Alert_for_sale').attr('checked') == 'checked')
    {
        $('.vvenda').css('display', 'inline');
    }
    if ($('#Alert_for_rent').attr('checked') == 'checked')
    {
        $('.vrent').css('display', 'inline');
    }
    $('#Alert_for_arrenda').click(function() {
        $('.varrenda').toggle('slow');
    });
    $('#Alert_for_sale').click(function() {
        $('.vvenda').toggle('slow');
    });
    $('#Alert_for_rent').click(function() {
        $('.vrent').toggle('slow');
    });
</script>