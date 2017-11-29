<?php $this->renderPartial('//site/flashMessage'); ?>

<div class="form container-fluid">
    <div class="col-xs-12 col-md-5 col-lg-4">
        <?php
        if (isset($_GET['update'])) {
            $actio = Yii::app()->createUrl('periodo/update/' . $model->id . '/' . '?cod_casa=' . $model->cod_casa);
        } else {
            $actio = Yii::app()->createUrl('periodo/create');
        }
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'periodo-form',
            'action' => $actio,
            'enableClientValidation' => true,
            'clientOptions' => array('validateOnSubmit' => true),
            'enableAjaxValidation' => false,
            'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form')
        ));
        echo $form->errorSummary($model);

        if (isset($cod_casa)) {
            echo $form->hiddenField($model, 'cod_casa', array('value' => $cod_casa));
        } else {
            echo $form->hiddenField($model, 'cod_casa', array('value' => $model->cod_casa));
        }
        ?>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'inicio'); ?>
            <?php echo $form->textField($model, 'inicio', array('size' => 15, 'maxlength' => 45, 'class' => 'datepick Casa_inicio  form-control', 'id' => 'datepickStart')); ?>
            <?php echo $form->error($model, 'inicio'); ?>
        </div>
        <div class="form-group">        <?php echo $form->labelEx($model, 'fim'); ?>
            <?php echo $form->textField($model, 'fim', array('size' => 15, 'maxlength' => 45, 'class' => 'datepick Casa_fim  form-control', 'id' => 'datepickEnd')); ?>
            <?php echo $form->error($model, 'fim'); ?>
        </div>
        <div class="form-group">        <?php echo $form->labelEx($model, 'preco_semana'); ?>
            <?php echo $form->textField($model, 'preco_semana', array('size' => 15, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'preco_semana'); ?>
        </div>
        <div class="form-group">        <?php echo $form->labelEx($model, 'preco_dia'); ?>
            <?php echo $form->textField($model, 'preco_dia', array('size' => 15, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'preco_dia'); ?>
        </div>
        <div class="form-group">        <?php echo $form->labelEx($model, 'preco_fimsemana'); ?>
            <?php echo $form->textField($model, 'preco_fimsemana', array('size' => 15, 'maxlength' => 45, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'preco_fimsemana'); ?>
        </div>
        <div class="form-group">        <?php echo $form->labelEx($model, 'estadia_minima'); ?>
            <?php echo $form->dropDownList($model, 'estadia_minima', CHtml::listData(EstadiaMinima::model()->findAll(), 'estadia_min', 'estadia_min'), array('prompt' => 'Select Estadia Mínima', 'class' => 'form-control')); ?>

            <?php echo $form->error($model, 'estadia_minima'); ?>
        </div>
        <div class="form-group">        <?php echo $form->labelEx($model, 'observacoes'); ?>
            <?php echo $form->textArea($model, 'observacoes', array('size' => 25, 'maxlength' => 300, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'observacoes'); ?>
        </div>
        <div class="form-group buttons buttonWrapper">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t("content", "Criar") . " <span class='glyphicon glyphicon-floppy-save'></span>" : Yii::t("content", "Salvar") . " <span class='glyphicon glyphicon-floppy-save'></span>", array('class' => 'btn btn-lg btn-primary')); ?>

        </div>

        <?php
        $this->endWidget();
        ?>
    </div>
    <div class="col-xs-12 col-md-7 col-lg-8">
        <?php
        if (isset($cod_casa)) {
            echo $this->renderPartial('//periodo/admin', array('model' => $model, 'cod_casa' => $cod_casa));
        } else {
            echo $this->renderPartial('//periodo/admin', array('model' => $model, 'cod_casa' => $model->cod_casa));
        }
        ?>

    </div>
</div>
<script>
    $("#datepickStart").datepicker({dateFormat: "yy-mm-dd", beforeShow: function() {
            return{minDate:
                        new Date()
                        //$('#Casa_inicio').datepicker('getDate')
            }
        }
    });
    $("#datepickEnd").datepicker({dateFormat: "yy-mm-dd", beforeShow: function() {
            return{minDate:
                        $('#datepickStart').datepicker('getDate')
            }
        }
    });
</script>