<?php $this->renderPartial('//site/flashMessage'); ?>

<div class="form container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
            <?php
            if (!is_null($preco))
                $model = $preco;

            $casa = $cod_casa;
            if ($referer == 'preco') {
                $actio = Yii::app()->createUrl('preco/update/' . $model->id . '/' . '?cod_casa=' . $casa);
                $isreserva = Reserva::model()->find('(reserva_state =' . Reserva::RESERVA . " or reserva_state =" . Reserva::SINAL . ") and idpreco= " . $idpreco);
                $js3 = " $('#btreserv').attr('disabled','disabled');";
                if ($isreserva) {
                    Yii::app()->clientScript->registerScript('11', $js3, CClientScript::POS_END);
                }
            } else {
                $actio = Yii::app()->createUrl('preco/create' . '?cod_casa=' . $casa);
            }
            $reserva = new Reserva();
            $pagamento = new ReservaPayment();
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'preco-form',
                // 'enableAjaxValidation' => true,
                // 'enableClientValidation' => true,
                'clientOptions' => array(
//            "errorCssClass" => "bg-danger",
//            "successCssClass" => "bg-success",
//            "errorMessageCssClass" => "bg-danger",
                    'validateOnSubmit' => true,),
                'action' => $actio,
                'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form'),
            ));
            ?>


            <div class="form-group">
                <?php echo $form->labelEx($model, 'Opção'); ?>
                <?php echo $form->dropDownList($model, 'defaccao', array('add' => 'Criar Promoção', 'reserva' => 'Criar Reserva', 'del' => 'Apagar'), array('prompt' => 'Select Opção', 'class' => 'required form-control')); ?>
                <?php echo $form->error($model, 'defaccao'); ?>
            </div>
            <?php if ($model->promo == 1 && $model->livre == 1) : ?>
                <script>
                    $("#Preco_defaccao option[value='add']").remove();
                </script>
            <?php endif ?>
            <?php echo $form->errorSummary(array($model, $reserva, $pagamento)); ?>
            <?php echo $form->hiddenField($model, 'cod_casa', array('type' => "text", 'value' => $casa)); ?>

            <?php echo $form->hiddenField($model, 'id', array('type' => "text", 'value' => $casa)); ?>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'inicio'); ?>
                <?php echo $form->textField($model, 'inicio', array('size' => 50, 'maxlength' => 50, 'id' => 'Preco_inicio', 'class' => 'inic datepick dtstart required form-control')); ?>
                <?php echo $form->error($model, 'inicio'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'fim'); ?>
                <?php echo $form->textField($model, 'fim', array('size' => 50, 'maxlength' => 50, 'id' => 'Preco_fim', 'class' => 'fim datepick dtend required form-control')); ?>
                <?php echo $form->error($model, 'fim'); ?>
            </div>
            <div class="precoReservaDiv"></div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'preco'); ?>
                <?php echo $form->textField($model, 'preco', array('size' => 50, 'maxlength' => 50, 'class' => 'precoReserva required form-control')); ?>
                <?php echo $form->error($model, 'preco'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($reserva, 'valorSinal'); ?>
                <?php echo $form->textField($reserva, 'valorSinal', array('size' => 50, 'maxlength' => 50, 'class' => 'required form-control')); ?>
                <?php echo $form->error($reserva, 'valorSinal'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->hiddenField($model, 'livre'); ?>
                <?php echo $form->hiddenField($model, 'promo'); ?>
            </div>
            <div id="divdadosreserva">
                <div class="form-group">
                    <?php echo $form->hiddenField($reserva, 'id'); ?>
                    <?php echo $form->hiddenField($reserva, 'user', array('type' => "text", 'value' => Yii::app()->user->name)); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($reserva, 'Estado'); ?>
                    <?php echo $form->dropDownList($reserva, 'reserva_state', CHtml::listData(ReservaState::model()->findAll(), 'id', 'state'), array('prompt' => 'Select Estado da Reserva', 'class' => 'form-control')); ?>
                    <?php echo $form->error($reserva, 'Estado'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($reserva, 'idcliente'); ?>
                    <?php echo $form->dropDownList($reserva, 'idcliente', CHtml::listData(Cliente::model()->findAll(), 'clienteid', 'NameSurname'), array('prompt' => 'Select Cliente', 'class' => 'form-control')); ?>
                    <?php echo $form->error($reserva, 'idcliente'); ?>
                </div>

                <?php echo $form->hiddenField($reserva, 'idpreco'); ?>
            </div>
            <div id="divdadospagamento">
                <div class="form-group">
                    <?php echo $form->labelEx($pagamento, 'id_tipo_pagamento'); ?>
                    <?php echo $form->dropDownList($pagamento, 'id_tipo_pagamento', CHtml::listData(TipoPagamento::model()->findAll(), 'id', 'tipo_pagamento'), array('prompt' => 'Select Meio Pagamento', 'class' => 'form-control')); ?>
                    <?php echo $form->error($pagamento, 'id_tipo_pagamento'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($pagamento, 'id_pagamento'); ?>
                    <?php echo $form->textField($pagamento, 'id_pagamento', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                    <?php echo $form->error($pagamento, 'id_pagamento'); ?>
                </div>


                <div class="form-group">
                    <?php echo $form->labelEx($pagamento, 'valor'); ?>
                    <?php echo $form->textField($pagamento, 'valor', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                    <?php echo $form->error($pagamento, 'valor'); ?>
                </div>
            </div>
            <div class="form-group buttons buttonWrapper">
                <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t("content", "Criar") . " <span class='glyphicon glyphicon-floppy-save'></span>" : Yii::t("content", "Salvar") . " <span class='glyphicon glyphicon-floppy-save'></span>", array('id' => 'btreserv', 'class' => 'btn btn-lg btn-primary')); ?>

            </div>
            <?php
            $this->endWidget();

            Yii::import('application.controllers.PrecoController');
            $pc = new PrecoController(1);
            $pc->actionCalendar($casa, $model->id);
            ?>
            <?php
            $pth = Yii::app()->createUrl('reserva/ajaxform');
            $js2 = '';
            $js2 = $js2 .
                    "

$(document).ready(function(){

$('#divdadospagamento').hide();
	$('#divdadosreserva').hide();

		$('.but').button();

		$('#Preco_defaccao').change(function(){

			var accao=$(this).val();

			$('#accao').val(accao);
			if (accao=='reserva')

			{
			$('#divdadosreserva').show();
                       $('#Preco_livre').val(0).removeAttr('checked');
			}
			else
			{
			$('#divdadosreserva').hide();
	                   $('#Preco_livre').val(1).attr('checked','checked');
			}
                       if (accao=='add')

			{
                       $('#Preco_promo').val(1).attr('checked','checked');
			}


		});
               $('#Reserva_reserva_state').change(function(){
                  if ($('#Reserva_reserva_state').val()==2 || $('#Reserva_reserva_state').val()==4 )

			{
			$('#divdadospagamento').show();

			}
                        else{
                        $('#divdadospagamento').hide();
                        }
                   });

 });
";
            Yii::app()->clientScript->registerScript('1', $js2, CClientScript::POS_END);
            ?>
        </div>
        <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">

            <span class="dPicker"></span>

            <div class="alert alert-block"><i class=" icon-info-sign"></i><h5>Para alterações click no período respectivo usando o calendário</h5></div>




            <div class="updaterPreco">
                <ul  class="operations">
                    <li><a class="updater" href="/index.php/preco/update/">Updater</a></li>
                </ul></div>

        </div>
    </div>
</div><!-- form -->


<script>
    $(document).ready(function() {
        $('.dPicker').datepicker({minDate: 0, beforeShowDay: Days, numberOfMonths: [1, 3], stepMonths: 1, showOtherMonths: false, firstDay: 1, changeFirstDay: false, showButtonPanel: false, dateFormat: 'yy-mm-dd'
        });
        $('#Preco_inicio').datepicker({minDate: 0, beforeShowDay: Days, numberOfMonths: [1, 2], stepMonths: 2, showOtherMonths: false, firstDay: 1, changeFirstDay: false, showButtonPanel: true, dateFormat: 'yy-mm-dd'
        });
        $('#Preco_fim').datepicker({beforeShowDay: Days, numberOfMonths: [1, 2], stepMonths: 2, showOtherMonths: false, firstDay: 1, changeFirstDay: false, showButtonPanel: true, dateFormat: 'yy-mm-dd', beforeShow: function() {
                return{minDate:
                            $('#Preco_inicio').datepicker('getDate'),
                    maxDate:
                            $('#Preco_inicio').datepicker('getDate') + '+30d'}
            }
        });

        $('#Preco_inicio').datepicker();



        $("#Preco_preco").on("change", function() {

            $("#Reserva_valorSinal").val(Math.round($(this).val() / 3));
        });
        $('.updaterPreco').hide();
        $('#preco-form').validate({
            rules: {
                'Reserva[reserva_state]': {
                    required: function() {
                        return $('#Preco_defaccao').val() == 'reserva';
                    }
                },
                'Reserva[idcliente]': {
                    required: function() {
                        return $('#Preco_defaccao').val() == 'reserva';
                    }
                },
                'ReservaPayment[id_tipo_pagamento]': {
                    required: function() {
                        return $('#Reserva_reserva_state').val() == '2' || $('#Reserva_reserva_state').val() == '4';
                    }
                },
                'ReservaPayment[id_pagamento]': {
                    required: function() {
                        return $('#Reserva_reserva_state').val() == '2' || $('#Reserva_reserva_state').val() == '4';
                    }
                },
                'ReservaPayment[valor]': {
                    required: function() {
                        return $('#Reserva_reserva_state').val() == '2' || $('#Reserva_reserva_state').val() == '4';
                    }
                }
            }
        });

        $('#Preco_inicio,#Preco_fim').change(function() {

            if (!$('.inic').val() || !$('.fim').val())
            {
            }
            else {
                $.get("<?php echo Yii::app()->createUrl('reserva/calculate/id/' . $cod_casa) ?>" + "?in=" + $('.inic').val() + "&out=" + $('.fim').val()
                        , function(result) {
                            obj = JSON.parse(result);

                            if (obj.result.preco)
                            {

                                $('.precoReserva').val(obj.result.preco);
                                $("#Reserva_valorSinal").val(Math.round($('.precoReserva').val() / 3));

                                $('.precoReservaDiv').html('Eur ' + obj.result.html);
                            }
                            else
                            {

                                $('.precoReservaDiv').html(obj.result.html);
                            }
                        });
            }

        });
    });

</script>
