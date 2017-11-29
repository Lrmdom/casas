<?php
$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
    'Contact',
);
if (Yii::app()->user->getState('isAdmin') == 'Back')
    $this->layout = 'column2';
$this->menu = array(
    array('label' => 'Gerir Casa', 'url' => array('casa/admin')),
    array('label' => 'Gerir Proprietario', 'url' => array('proprietario/admin', 'id' => Yii::app()->user->id)),
    array('label' => 'Gerir Cliente', 'url' => array('cliente/admin')),
    array('label' => 'Gerir Reserva', 'url' => array('reserva/admin')),
);
?>
<div class="row-fluid">
    <div class="col-xs-12 col-md-6 ">
        <div class="text-center">
            <span class="glyphicon glyphicon-phone"></span>  (+351)966684564
            <span class="glyphicon glyphicon-phone">
            </span>
            (+351)281956272
            <div class="text-center">
                <img src="/css/images/skype.jpeg"/>  skypeId: casas-da-praia
            </div>
        </div>
        <div class="text-center">
            <span class="glyphicon glyphicon-envelope"></span>  geral@casasdapraia.pt
        </div>
        <br>
        <address class="text-center">
            <strong>Imoexcel</strong><br>
            Rua da Alagoa<br>
            8950-412 Altura, Portugal

        </address>
        <div id="map" style="width: 100%; height: 200px;">
        </div>
    </div>
    <div class="col-xs-12 col-md-6">


        <?php if (Yii::app()->user->hasFlash('contact')): ?>
            <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('contact'); ?>
            </div>

        <?php else: ?>

            <div class="form">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'contact-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));
                ?>
                <p class="note"> </p>
                <?php echo $form->errorSummary($model); ?>
                <div class="row-fluid">
                    <?php echo $form->hiddenField($model, 'emailSite'); ?>
                </div>
                <div class="row-fluid">
                    <?php echo $form->labelEx($model, 'name'); ?>
                    <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'name'); ?>
                </div>
                <div class="row-fluid">
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>
                <div class="row-fluid">
                    <?php echo $form->labelEx($model, 'subject'); ?>
                    <?php echo $form->textField($model, 'subject', array('class' => 'form-control', 'size' => 60, 'maxlength' => 128)); ?>
                    <?php echo $form->error($model, 'subject'); ?>
                </div>
                <div class="row-fluid">
                    <?php echo $form->labelEx($model, 'body'); ?>
                    <?php echo $form->textArea($model, 'body', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
                    <?php echo $form->error($model, 'body'); ?>
                </div>
                <?php if (CCaptcha::checkRequirements()): ?>
                    <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'verifyCode'); ?>
                        <div>
                            <?php $this->widget('CCaptcha'); ?>
                            <?php echo $form->textField($model, 'verifyCode', array('class' => 'form-control')); ?>
                        </div>

                        <?php echo $form->error($model, 'verifyCode'); ?>
                    </div>
                <?php endif; ?>
                <div class="row-fluid buttons">
                    <?php echo CHtml::submitButton('Enviar', array('class' => 'btn btn-primary btn-block')); ?>
                </div>
                <?php $this->endWidget(); ?>
            </div><!-- form -->
        </div>
    </div>
<?php endif; ?>
<script type="text/javascript">
    var myOptions = {
        center: new google.maps.LatLng(37.17273, -7.49980),
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        // Add controls
        mapTypeControl: true,
        scaleControl: true,
        overviewMapControl: true,
        overviewMapControlOptions: {
            opened: true
        }
    };
    var map = new google.maps.Map(document.getElementById('map'), myOptions);
    var marker = new google.maps.Marker({
        position: myOptions.center,
        draggable: true,
        map: map
    });

</script>