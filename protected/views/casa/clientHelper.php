<div class="casaContact thumbnail sh">
    <?php if ($model->for_rent == 1 && !Yii::app()->user->isGuest): ?>
        <div class="btn btn-success btn-block reservaheader well-sm"> <h5><span class="glyphicon glyphicon-book "></span> <?php echo Yii::t("content", "Reservar") ?> </h5> </div>
        <div class="form reservacasaform">
            <?php
            $actio = Yii::app()->createUrl('preco/clientCreate');

            $modelForm1 = new ContactCasaForm('reserva');
            $form1 = $this->beginWidget('CActiveForm', array(
                'id' => 'contactcasa-form1',
                'enableClientValidation' => true,
                'action' => $actio,
                'htmlOptions' => array('role' => 'form',),
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

            <div class="form-group">
                <?php echo $form1->hiddenField($modelForm1, 'cod_casa', array('value' => $model->cod_casa)); ?>
                <?php echo $form1->hiddenField($modelForm1, 'livre', array('value' => '0')); ?>
                <?php echo $form1->hiddenField($modelForm1, 'idcliente', array('value' => Yii::app()->user->getId())); ?>
            </div>
            <div class="form-group">
                <?php echo $form1->labelEx($modelForm1, 'name'); ?>
                <?php echo $form1->textField($modelForm1, 'name', array('value' => $client->cliente, 'class' => 'form-control')); ?>
                <?php echo $form1->error($modelForm1, 'name'); ?>
            </div>
            <div class="form-group">
                <?php echo $form1->labelEx($modelForm1, 'telefone'); ?>
                <?php echo $form1->textField($modelForm1, 'telefone', array('value' => $client->telefone, 'class' => 'form-control')); ?>
                <?php echo $form1->error($modelForm1, 'telefone'); ?>
            </div>
            <div class="form-group">
                <?php echo $form1->labelEx($modelForm1, 'email'); ?>
                <?php echo $form1->textField($modelForm1, 'email', array('value' => $client->email, 'class' => 'form-control')) ?>
                <?php echo $form1->error($modelForm1, 'email'); ?>
            </div>
            <div class="form-group">
                <?php echo $form1->textField($modelForm1, 'inicio', array('value' => Yii::app()->session['inicio'], 'class' => 'datepick datepickStart inic form-control', 'placeholder' => 'De', 'size' => 10)) ?>
                <?php echo $form1->error($modelForm1, 'inicio'); ?>
            </div>
            <div class="form-group">
                <?php echo $form1->textField($modelForm1, 'fim', array('value' => Yii::app()->session['fim'], 'class' => 'datepick datepickEnd fi form-control', 'placeholder' => 'Até', 'size' => 10)) ?>
                <?php echo $form1->error($modelForm1, 'fim'); ?>
            </div>
            <div class="form-group">
                <?php //echo $form1->labelEx($modelForm1, 'preco');    ?>
                <?php echo $form1->hiddenField($modelForm1, 'preco', array('class' => 'precoReserva')) ?>
                <?php echo $form1->error($modelForm1, 'preco'); ?>
                <div class="precoReservaDiv"></div>
            </div>
            <div class="form-group pull-middle">
                <?php echo CHtml::submitButton('<span class="glyphicon glyphicon-book "></span>  Reservar', array('id' => 'btreserv1', 'class' => 'btreserv1 btn btn-success ')); ?>
            </div>

            <?php $this->endWidget(); ?>


            <script>
    <?php echo $js ?>
                $(".fi").datepicker({beforeShowDay: Days, dateFormat: "yy-mm-dd", beforeShow: function() {
                        return{minDate:
                                    $('#ContactCasaForm_inicio').datepicker('getDate')}
                    }
                });
                $(".inic").datepicker({beforeShowDay: Days, dateFormat: "yy-mm-dd",
                    beforeShow: function() {
                        return{minDate: $.now()
                        }
                    }
                });
            </script>
        </div>


    <?php endif ?>
    <?php if ($model->for_rent == 1 && Yii::app()->user->isGuest) : ?>
        <div class="btn btn-success btn-block reservaheader well-sm"> <h5><span class="glyphicon glyphicon-book "></span> <?php echo Yii::t("content", "Reservar") ?> </h5> </div>

        <script>

            $(".reservaheader").on("click", function(e) {

                $.get("<?php echo Yii::app()->createUrl('site/login') ?>", function(data) {
                    $('.modal-body').html(data);
                });
                e.preventDefault();
                $('#fdkCreate').modal();
            });

        </script>
    <?php endif ?>
    <div class="well-lg"></div>
    <?php if ($model->certif == 1) : $actio2 = Yii::app()->createUrl('casa/contactMe'); ?>
        <div class="btn  btn-default btn-block contactheader well-sm"> <h5><span class="glyphicon glyphicon-envelope"></span><?php echo Yii::t("content", "Contatar") ?></h5>
        </div>
    <?php endif ?>
    <?php if ($model->certif != 1) : $actio2 = Yii::app()->createUrl('casa/contactOwner'); ?>
        <div class="btn btn-default btn-block contactheader well-sm"> <h5><span class="glyphicon glyphicon-envelope"></span><?php echo Yii::t("content", "Contatar") ?></h5>
        </div>
    <?php endif ?>
    <div class="form contactcasaform">
        <?php
        $modelForm = new ContactCasaForm('contact');
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'contactcasa-form',
            'enableClientValidation' => true,
            'clientOptions' => array('validateOnSubmit' => true),
            'action' => $actio2,
            'htmlOptions' => array('role' => 'form',)
        ));
        ?>
        <?php echo $form->errorSummary($modelForm); ?>
        <div class="form-group">
            <?php echo $form->hiddenField($modelForm, 'cod_casa'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($modelForm, 'name'); ?>
            <?php echo $form->textField($modelForm, 'name', array('value' => $client->cliente, 'class' => 'form-control')); ?>
            <?php echo $form->error($modelForm, 'name'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($modelForm, 'telefone'); ?>
            <?php echo $form->textField($modelForm, 'telefone', array('value' => $client->telefone, 'class' => 'form-control')); ?>
            <?php echo $form->error($modelForm, 'telefone'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($modelForm, 'email'); ?>
            <?php echo $form->textField($modelForm, 'email', array('value' => $client->email, 'class' => 'form-control')) ?>
            <?php echo $form->error($modelForm, 'email'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($modelForm, 'body'); ?>
            <?php echo $form->textArea($modelForm, 'body', array('class' => 'form-control')) ?>
            <?php echo $form->error($modelForm, 'body'); ?>
        </div>
        <div class="form-group pull-middle">
            <?php echo CHtml::submitButton('<span class="glyphicon glyphicon-envelope"></span>' . Yii::t("content", "Enviar"), array('id' => 'btreserv', 'class' => 'btn btn-default ')); ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <div>
        <?php
        if ($model->for_sale == 1) {
            echo '<br><br>';
            echo CHtml::linkButton(
                    'Agendar Visita', array('tag' => 'button',
                'class' => 'btAgVisitaCasa btAction',
                'href' => Yii::app()->createUrl('visita/create', array('id' => $model->cod_casa)),
                    )
            );
        }
        if ($model->for_rent == 1) {
            echo '<br><br>';
            echo CHtml::linkButton(
                    'Classificar', array('tag' => 'button',
                'onclick' => 'return false;',
                'class' => 'btClassificaCasa btAction',
                'href' => '#',
                    )
            );
        }
        echo '<br><br>';
        echo CHtml::ajaxLink(
                'Adicionar favoritos', Yii::app()->createUrl('mylist/create'), array('data' => array('Mylist[cod_casa]' => $model->cod_casa,
                'Mylist[cliente]' => Yii::app()->user->id,
            ), 'type' => 'post',
            'dataType' => "json",
            'success' => 'js: function(data) {
                $("#favcount").html(data.count);
                redirect = data.redirect
                if(data.status == "500")
                  alert("Já existe nos favoritos");
               if(data.status == "200")
                  window.location.href = redirect;
                  }'
                ), array('class' => 'btMylistCreate btAction')
        );
        ?>
    </div>
</div>


<script>
    $(function() {
        $('.btClassificaCasa').on('click', function(e) {
            e.preventDefault();
            $.get("<?php echo Yii::app()->createUrl('feedback/create', array('id' => $model->cod_casa)); ?>", function(data) {
                $('.modal-body').html(data);
            });

            $('#fdkCreate').modal();
        });

        $('#ContactCasaForm_inicio,#ContactCasaForm_fim').change(function() {

            if (!$('.inic').val() || !$('.fi').val())
            {
            }
            else {
                $.get("<?php echo Yii::app()->createUrl('reserva/calculate/id/' . $model->cod_casa) ?>" + "?in=" + $('.inic').val() + "&out=" + $('.fi').val()
                        , function(result) {
                            obj = JSON.parse(result);

                            if (obj.result.preco)
                            {

                                $('.precoReserva').val(obj.result.preco);
                                $('.precoReservaDiv').html('Eur ' + obj.result.html);
                                $('.btreserv1').removeAttr('disabled');
                            }
                            else
                            {

                                $('.precoReservaDiv').html(obj.result.html);
                            }
                        });
            }

        });

        if (!$('.inic').val() || !$('.fi').val())
        {
        }
        else {
            $.get("<?php echo Yii::app()->createUrl('reserva/calculate/id/' . $model->cod_casa) ?>" + "?in=" + $('.inic').val() + "&out=" + $('.fi').val()
                    , function(result) {
                        obj = JSON.parse(result);

                        if (obj.result.preco)
                        {

                            $('.precoReserva').val(obj.result.preco);
                            $('.precoReservaDiv').html('Eur ' + obj.result.html);
                            $('.btreserv1').removeAttr('disabled');
                        }
                        else
                        {

                            $('.precoReservaDiv').html(obj.result.html);
                        }
                    });
        }
    });
</script>
