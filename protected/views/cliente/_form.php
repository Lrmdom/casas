<?php
if (Yii::app()->user->getState('isAdmin') == ("Back"))
    $this->layout = 'column2';
?>
<div class="col-md-3 hidden-xs"></div>
<div class="form col-md-6 col-xs-12">
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
        'id' => 'cliente-form',
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
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'cliente'); ?>
        <?php echo $form->textField($model, 'cliente', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'cliente'); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'senha'); ?>
        <?php echo $form->passwordField($model, 'senha', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50, 'value' => Cliente::model()->decrypt($model->senha))); ?>
        <?php echo $form->error($model, 'senha'); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'Repita a senha'); ?>
        <?php echo $form->passwordField($model, 'senha_repeat', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50, 'value' => '')); ?>
        <?php echo $form->error($model, 'senha_repeat'); ?>
    </div>

    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'telefone'); ?>
        <?php echo $form->textField($model, 'telefone', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'telefone'); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'morada'); ?>
        <?php echo $form->textField($model, 'morada', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'morada'); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'cod_postal'); ?>
        <?php echo $form->textField($model, 'cod_postal', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'cod_postal'); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'localidade'); ?>
        <?php echo $form->textField($model, 'localidade', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'localidade'); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'sessid', array('class' => 'sr-only', 'style' => $visible)); ?>
        <?php echo $form->hiddenField($model, 'sessid', array('class' => 'form-control sr-only', 'value' => Yii::app()->session->sessionID, 'size' => 50, 'maxlength' => 50, 'style' => $visible)); ?>
        <?php echo $form->error($model, 'sessid', array('style' => $visible)); ?>
    </div>
    <div class="row-fluid ">
        <?php echo $form->labelEx($model, 'activo', array('class' => 'sr-only', 'style' => $visible)); ?>
        <?php echo $form->checkBox($model, 'activo', array('class' => 'sr-only', 'style' => $visible)); ?>
        <?php echo $form->error($model, 'activo', array('style' => $visible)); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'pais'); ?>
        <?php echo $form->textField($model, 'pais', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'pais'); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'subscribe_newsletter'); ?>
        <?php echo $form->checkbox($model, 'subscribe_newsletter'); ?>
        <?php echo $form->error($model, 'subscribe_newsletter'); ?>
    </div>
    <?php if (extension_loaded('gd')): ?>
        <div class="row-fluid">
            <?php echo $form->labelEx($model, 'verifyCode'); ?>
            <div class="captcha">
                <?php $this->widget('CCaptcha'); ?>
                <?php echo $form->textField($model, 'verifyCode'); ?>
            </div>
            <div class="hint">Please enter the letters as they are shown in the image above.
                <br/>Letters are not case-sensitive.</div>
            <?php echo $form->error($model, 'verifyCode'); ?>
        </div>
    <?php endif; ?>
    <div class="row-fluid buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t("content", "Criar") . " <span class='glyphicon glyphicon-floppy-save'></span>" : Yii::t("content", "Salvar") . " <span class='glyphicon glyphicon-floppy-save'></span>", array('id' => 'btreserv', 'class' => 'btn btn-lg btn-primary')); ?>

    </div>
    <?php $this->endWidget(); ?>


</div><!-- form -->
