<div class="container-fluid">
    <div class="form hidden-xs hidden-sm  col-md-2 col-lg-2">
    </div>
    <div class="form col-xs-12 col-md-6 col-lg-6">
        <div class='inlinelogin'>
            <?php
            $cn = new CNumberFormatter(Yii::app()->getLanguage());

            if (Yii::app()->user->isGuest):
                //$this->renderPartial("//site/login", array("model" => new LoginForm()));
                ?>
                <script>
                    $.get("<?php echo Yii::app()->createUrl('site/login') ?>", function(data) {
                        $('.modal-body').html(data);
                        $('#fdkCreate').modal();
                    });


                </script>

            <?php endif; ?>

        </div>

        <?php
        $this->layout = 'search';
        $modelForm1 = new ContactCasaForm();
        $form1 = $this->beginWidget('CActiveForm', array(
            'id' => 'reserva-form',
            "action" => Yii::app()->createUrl("preco/clientCreate"),
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'afterValidate' => 'js:function(form,data,hasError){
                        if(!hasError){
                                $.ajax({
                                        "type":"POST",
                                        "url":"' . Yii::app()->createUrl("preco/clientCreate") . '",
                                        "data":form.serialize(),
                                        "success":function(data){
                                        $(".xhrResults").html(data);
                                        obj = JSON.parse(data);
                                        if(obj.status=="700"){
                                        location.reload()}
                                        }

                                        });
                                }
                        }'
            ),
        ));
        ?>
        <?php echo $form1->errorSummary($modelForm1); ?>
        <div class="row-fluid">
            <?php echo $form1->hiddenField($modelForm1, 'cod_casa', array('value' => $model->cod_casa)); ?>
            <?php echo $form1->hiddenField($modelForm1, 'livre', array('value' => '0')); ?>
            <?php echo $form1->hiddenField($modelForm1, 'preco', array('value' => $model->preco)); ?>
            <?php echo $form1->hiddenField($modelForm1, 'idcliente', array('value' => Yii::app()->user->getId())); ?>
        </div>
        <div class="row-fluid">
            <div class="form-group">
                <?php echo $form1->hiddenField($modelForm1, 'email', array('value' => Yii::app()->user->name)) ?>
                <?php echo $form1->error($modelForm1, 'email'); ?>
            </div>
            <div class="form-group">
                <?php echo $form1->textField($modelForm1, 'inicio', array('readonly' => 'readonly', 'size' => 10, 'value' => $model->inicio, 'class' => 'form-control')) ?>
                <?php echo $form1->error($modelForm1, 'inicio'); ?>
            </div>
            <div class="form-group">
                <?php echo $form1->textField($modelForm1, 'fim', array('readonly' => 'readonly', 'size' => 10, 'value' => $model->fim, 'class' => 'form-control')) ?>
                <?php echo $form1->error($modelForm1, 'fim'); ?>
            </div>
            <div class="column alert alert-success"><h3 class="colored"><?php echo CHtml::encode($cn->formatCurrency($model->preco, 'EUR')); ?></h3></div>

        </div>
        <div class="form-group">
            <?php echo CHtml::submitButton('Reservar', array('id' => 'btreserv1', 'class' => 'btn btn-primary')); ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <div class=" col-xs-12 col-md-4 col-lg-4">
        <img class="img-polaroid img-responsive well-sm" src="/uploads/<?php echo $model->casas->img_1; ?>"/>
        <?php echo $this->renderPartial("//casa/_view", array("data" => $model->casas)); ?>
    </div>
</div>

