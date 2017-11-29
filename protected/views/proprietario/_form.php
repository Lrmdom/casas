<?php
$this->breadcrumbs = array(
    'Proprietario registo',
);
?>
<div class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="form">
            <?php $visible = Yii::app()->params["adminEmail"] ? "" : "display:none;";
            ?>
            <?php
            $updateCaptcha = <<<EOD
function(form,attribute,data,hasError) {
    var i=form.find('.captcha img').first();
             h=i.attr('src');
     i.attr('src',h+Math.floor(100000*Math.random()));
    return true;
}
EOD;
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'proprietario-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'afterValidateAttribute' => 'js:' . $updateCaptcha,
                    'afterValidate' => 'js:' . $updateCaptcha,
                ),
            ));
            ?>


            <?php echo $form->errorSummary($model); ?>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'proprietario'); ?>
                <?php echo $form->textField($model, 'proprietario', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'proprietario'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'senha'); ?>
                <?php echo $form->passwordField($model, 'senha', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'senha'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Repita a senha'); ?>
                <?php echo $form->passwordField($model, 'senha_repeat', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'senha_repeat'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'telefone'); ?>
                <?php echo $form->textField($model, 'telefone', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'telefone'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'morada'); ?>
                <?php echo $form->textField($model, 'morada', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'morada'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'cod_postal'); ?>
                <?php echo $form->textField($model, 'cod_postal', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'cod_postal'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'localidade'); ?>
                <?php echo $form->textField($model, 'localidade', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'localidade'); ?>
            </div>
            <div class="row-fluid">
                <?php echo $form->hiddenField($model, 'sessid', array('value' => Yii::app()->session->sessionID, 'size' => 50, 'maxlength' => 50, 'style' => $visible)); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'activo', array('style' => $visible)); ?>
                <?php echo $form->checkBox($model, 'activo', array('style' => $visible)); ?>
                <?php echo $form->error($model, 'activo', array('style' => $visible)); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'pais'); ?>
                <?php echo $form->textField($model, 'pais', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'pais'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'subscribe_newsletter'); ?>
                <?php echo $form->checkbox($model, 'subscribe_newsletter'); ?>
                <?php echo $form->error($model, 'subscribe_newsletter'); ?>
            </div>
            <?php if (extension_loaded('gd')): ?>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'verifyCode'); ?>
                    <div class="captcha">
                        <?php $this->widget('CCaptcha'); ?>
                        <?php echo $form->textField($model, 'verifyCode', array('class' => 'form-control')); ?>
                    </div>

                    <?php echo $form->error($model, 'verifyCode'); ?>
                </div>
            <?php endif; ?>
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t("content", "Criar") . " <span class='glyphicon glyphicon-floppy-save'></span>" : Yii::t("content", "Salvar") . " <span class='glyphicon glyphicon-floppy-save'></span>", array('id' => 'btreserv', 'class' => 'btn btn-lg btn-primary')); ?>
            </div>
            <?php $this->endWidget(); ?>


        </div><!-- form -->
    </div>

    <div class="clearfix"></div>