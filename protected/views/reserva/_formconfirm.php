<div class="col-xs-12 col-md-6 col-lg-6">
    <?php echo $this->renderPartial('//preco/view', array('model' => $model->precos,)); ?>
    <fieldset>
        <div class="row-fluid">
            <?php echo $form->hiddenField($model, 'id'); ?>
        </div>
        <div class="row-fluid">
            <?php echo $form->labelEx($model, 'reserva_state'); ?>
            <?php echo $form->dropDownList($model, 'reserva_state', CHtml::listData(ReservaState::model()->findAll(), 'id', 'state'), array('prompt' => 'Select Estado da Reserva', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'reserva_state'); ?>
        </div>
        <div class="row-fluid">
            <?php echo $form->labelEx($model, 'idcliente'); ?>
            <?php echo $form->dropDownList($model, 'idcliente', CHtml::listData(Cliente::model()->findAll(), 'clienteid', 'cliente'), array('prompt' => 'Select Cliente', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'idcliente'); ?>
        </div>
        <div class="row-fluid">
            <?php echo $form->hiddenField($model, 'idpreco'); ?>
        </div>
        <div class="row-fluid">
            <?php echo $form->labelEx($model, 'valorSinal'); ?>
            <?php echo $form->textField($model, 'valorSinal', array('size' => 10, 'maxlength' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'valorSinal'); ?>
        </div>
        <div class="row-fluid">
    </fieldset>

    <div id="divdadospagamento">
        <fieldset>
            <div class="row-fluid">
                <?php echo $form->labelEx($model, 'id_tipo_pagamento'); ?>
                <?php echo $form->dropDownList($model, 'id_tipo_pagamento', CHtml::listData(TipoPagamento::model()->findAll(), 'id', 'tipo_pagamento'), array('prompt' => 'Select Meio Pagamento', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'id_tipo_pagamento'); ?>
            </div>
            <div class="row-fluid">
                <?php echo $form->labelEx($model, 'id_pagamento'); ?>
                <?php echo $form->textField($model, 'id_pagamento', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'id_pagamento'); ?>
            </div>
            <div class="row-fluid">
                <?php echo $form->labelEx($model, 'valor'); ?>
                <?php echo $form->textField($model, 'valor'); ?>
                <?php echo $form->error($model, 'valor'); ?>
            </div>
        </fieldset>
    </div>
    <?php
    if ($model->reserva_state == Reserva::RESERVA):
        ?>
        <div class="alert alert-warning fMsg"></div>
        <script>

            $(function() {

                $("#reserva-form :input").attr("disabled", true);
                $(".buttonWrapper").hide();
                $(".fMsg").html('Reserva não pode ser alterada. Estado PAGA!');
            });

        </script>

    <?php endif; ?>
    <div class="row-fluid buttons buttonWrapper">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('id' => 'btreserv', 'class' => 'btreserv btn btn-lg btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
