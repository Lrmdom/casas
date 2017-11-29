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
<div class="alert alert-success">
   <span>
       <span class="phones">
            (+351)281956272 , (+351)966684564
       </span>
       <span>
            <img class="skp" src="/css/images/skype.jpeg"/>  skypeId: casas-da-praia
        </span>
    </span>
    <span>
        email: geral@casasdapraia.pt
    </span>
</span>
<div id="map" style="width: 450px; height: 200px;margin: 35px;">
</div>
</div>
<h3>Contacte-nos</h3>

<?php if (Yii::app()->user->hasFlash('contact')): ?>
   <div class="flash-success">
    <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>

<?php else: ?>
   <p>
        Se tiver questões, por favor preencha o seguinte formulário para nos contactar. Obrigado
    </p>
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
            <?php echo $form->textField($model, 'name'); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>
       <div class="row-fluid">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email'); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>
       <div class="row-fluid">
            <?php echo $form->labelEx($model, 'subject'); ?>
            <?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 128)); ?>
            <?php echo $form->error($model, 'subject'); ?>
        </div>
       <div class="row-fluid">
            <?php echo $form->labelEx($model, 'body'); ?>
            <?php echo $form->textArea($model, 'body', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'body'); ?>
        </div>
       <?php if (CCaptcha::checkRequirements()): ?>
            <div class="row-fluid">
                <?php echo $form->labelEx($model, 'verifyCode'); ?>
                <div>
                    <?php $this->widget('CCaptcha'); ?>
                    <?php echo $form->textField($model, 'verifyCode'); ?>
                </div>
                <div class="hint">Por favor introduza as letras que vê na imagem.
                    <br/>As letras não são case-sensitive.</div>
                <?php echo $form->error($model, 'verifyCode'); ?>
            </div>
        <?php endif; ?>
       <div class="row-fluid buttons">
            <?php echo CHtml::submitButton('Enviar', array('class' => 'but ui-widget-header ui-widget-header')); ?>
        </div>
       <?php $this->endWidget(); ?>
   </div><!-- form -->

<?php endif; ?>
<script type="text/javascript">
   var geo = new GClientGeocoder();
    var map = new GMap(document.getElementById("map2"));
   map.addControl(new GLargeMapControl3D());
    map.addControl(new GMapTypeControl());
    map.accuracy = 10;
    map.centerAndZoom(new GPoint(-7.49980, 37.17273), 5);
    var point = new GPoint(-7.49980, 37.17273);
    //map.addControl(new GOverviewMapControl(new GSize(100,100)));
   var marker = new GMarker(point, {draggable: true});
    map.addOverlay(marker);
</script>