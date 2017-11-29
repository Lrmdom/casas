<div class="form">
    <?php
    $visible = Yii::app()->params["adminEmail"] ? "" : "display:none;";
    $accao = Yii::app()->user->name == ("Guest") ? "register" : "create"
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
        'action' => 'register',
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidateAttribute' => 'js:' . $updateCaptcha,
            'afterValidate' => 'js:' . $updateCaptcha,
        ),
            ));
    ?>
   <p class="note"> </p>

<?php echo $form->errorSummary($model); ?>
   <div class="row-fluid">
       <?php echo $form->labelEx($model, 'proprietario'); ?>
        <?php echo $form->textField($model, 'proprietario', array('size' => 50, 'maxlength' => 50)); ?>
<?php echo $form->error($model, 'proprietario'); ?>
    </div>
   <div class="row-fluid">
        <?php echo $form->labelEx($model, 'senha'); ?>
        <?php echo $form->textField($model, 'senha', array('size' => 50, 'maxlength' => 50)); ?>
<?php echo $form->error($model, 'senha'); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'Repita a senha'); ?>
        <?php echo $form->textField($model, 'senha_repeat', array('size' => 50, 'maxlength' => 50)); ?>
<?php echo $form->error($model, 'senha_repeat'); ?>
    </div>
    <div class="row-fluid">
        <?php echo $form->labelEx($model, 'salt', array('style' => $visible)); ?>
        <?php echo $form->textField($model, 'salt', array('size' => 60, 'maxlength' => 128, 'style' => $visible)); ?>
<?php echo $form->error($model, 'salt', array('style' => $visible)); ?>
    </div>
   <div class="row-fluid">
        <?php echo $form->labelEx($model, 'telefone'); ?>
        <?php echo $form->textField($model, 'telefone', array('size' => 50, 'maxlength' => 50)); ?>
<?php echo $form->error($model, 'telefone'); ?>
    </div>
   <div class="row-fluid">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50)); ?>
<?php echo $form->error($model, 'email'); ?>
    </div>
   <div class="row-fluid">
        <?php echo $form->labelEx($model, 'morada'); ?>
        <?php echo $form->textField($model, 'morada', array('size' => 50, 'maxlength' => 50)); ?>
<?php echo $form->error($model, 'morada'); ?>
    </div>
   <div class="row-fluid">
        <?php echo $form->labelEx($model, 'cod_postal'); ?>
        <?php echo $form->textField($model, 'cod_postal', array('size' => 50, 'maxlength' => 50)); ?>
<?php echo $form->error($model, 'cod_postal'); ?>
    </div>
   <div class="row-fluid">
        <?php echo $form->labelEx($model, 'localidade'); ?>
        <?php echo $form->textField($model, 'localidade', array('size' => 50, 'maxlength' => 50)); ?>
<?php echo $form->error($model, 'localidade'); ?>
    </div>
   <div class="row-fluid">
        <?php echo $form->labelEx($model, 'sessid', array('style' => $visible)); ?>
        <?php echo $form->textField($model, 'sessid', array('value' => Yii::app()->session->sessionID, 'size' => 50, 'maxlength' => 50, 'style' => $visible)); ?>
<?php echo $form->error($model, 'sessid', array('style' => $visible)); ?>
    </div>
   <div class="row-fluid">
        <?php echo $form->labelEx($model, 'activo', array('style' => $visible)); ?>
        <?php echo $form->checkBox($model, 'activo', array('style' => $visible)); ?>
<?php echo $form->error($model, 'activo', array('style' => $visible)); ?>
    </div>
   <div class="row-fluid">
        <?php echo $form->labelEx($model, 'pais'); ?>
        <?php echo $form->textField($model, 'pais', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'pais'); ?>
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
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');
        ?>
    </div>

<?php $this->endWidget(); ?>


</div><!-- form -->

