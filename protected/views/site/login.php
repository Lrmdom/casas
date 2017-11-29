<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<div class="row-fluid">
    <div class="form col-xs-12 <?php echo $col ?>">

        <div class="row-fluid buttons">
            <?php
            CVarDumper::dump($model->userType);
            if ($model->userType == 'Back') {
                echo CHtml::link('Registrar', Yii::app()->createUrl('proprietario/register'), array('class' => 'btn btn-warning btn-large'));
                $actio = Yii::app()->createUrl('proprietario/register');
            } else {
                echo CHtml::link('Registrar', Yii::app()->createUrl('cliente/register'), array('class' => 'btn btn-warning btn-large'));
                $actio = Yii::app()->createUrl('cliente/register');
            }
            ?>
        </div>
        <div class="row-fluid">
            <?php if ($model->userType == 'Front') :
                ?>
                <?php
                $_SESSION['login'] = 'client';
                $this->widget('application.widgets.facebook.Facebook', array('appId' => '790150834333514'));
                ?>
            <?php endif ?>
            <?php if ($model->userType == 'Back') : ?>
                <?php
                $_SESSION['login'] = 'owner';
                $this->widget('application.widgets.facebook.Facebook', array('appId' => '790150834333514'));
                ?>
            <?php endif ?>
        </div>

    </div>
    <div class="form col-xs-12 <?php echo $col ?>">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>



        <div class="row-fluid">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email'); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>

        <div class="row-fluid">
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password'); ?>
            <?php echo $form->error($model, 'password'); ?>

        </div>

        <div class="row-fluid rememberMe">
            <?php echo $form->checkBox($model, 'rememberMe'); ?>
            <?php echo $form->label($model, 'rememberMe'); ?>
            <?php echo $form->error($model, 'rememberMe'); ?>
        </div>

        <div class="row-fluid">
            <div class="">
                <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary btn-large', 'type' => 'button')); ?>
            </div>
        </div>
        <div class="row-fluid ">
            <?php
            if ($model->userType == 'Back') {
                echo CHtml::link('Recuperar Password ?', Yii::app()->createUrl('proprietario/PwdRecover'), array('class' => ''));
            } else {
                echo CHtml::link('Recuperar Password ?', Yii::app()->createUrl('cliente/PwdRecover'), array('class' => ''));
            }
            ?>
        </div>
        <?php $this->endWidget(); ?>
        <!-- form -->


    </div>
</div>