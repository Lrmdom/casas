<div id="divhide">
    <div class="form">
       <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'casa-form',
            'enableAjaxValidation' => true,
        ));
        ?>
       <p class="note"> </p>
       <?php echo $form->errorSummary($model); ?>
        <div id="stepForm">
            <h3><a href="#">Localização (Passo 1 de 5)</a></h3>
            <div id="sf1">
               <fieldset>
                    <legend><span></span></legend>
                    <div style="float:right;">
                        <p>
                            <input type="text" size="50" name="address" value="Altura,Portugal" />
                            <input type="button"  class="but" value="Ir!" onclick="showAddress(address.value);"/>
                        </p>
                       <div id="map" style="width: 300px; height: 300px;">
                        </div>
                    </div>
                    <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'adicionado'); ?>
                        <?php echo $form->textField($model, 'adicionado', array('value' => '')); ?>
                        <?php echo $form->error($model, 'adicionado'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'data_activo'); ?>
                        <?php echo $form->textField($model, 'data_activo', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'data_activo'); ?>
                    </div>
                   <div class="row-fluid">
                       <?php echo $form->labelEx($model, 'destino'); ?>
                        <?php echo $form->textField($model, 'destino', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'destino'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'proprietario'); ?>
                        <?php echo $form->textField($model, 'proprietario', array('size' => 50, 'maxlength' => 50, 'value' => Yii::app()->user->name)); ?>
                        <?php echo $form->error($model, 'proprietario'); ?>
                    </div>
                    <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'propid'); ?>
                        <?php echo $form->textField($model, 'propid', array('size' => 50, 'maxlength' => 50, 'value' => Yii::app()->user->id)); ?>
                        <?php echo $form->error($model, 'propid'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'designacao'); ?>
                        <?php
                        echo $form->textField($model, 'designacao', array('size' => 50, 'maxlength' => 50,
                            'class' => 'pageRequired'));
                        ?>
                        <?php echo $form->error($model, 'designacao'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'tipoalojamento'); ?>
                        <?php echo $form->textField($model, 'tipoalojamento', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'tipoalojamento'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'tipo'); ?>
                        <?php echo $form->textField($model, 'tipo', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'tipo'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'pessoas'); ?>
                        <?php echo $form->textField($model, 'pessoas', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'pessoas'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'pais'); ?>
                        <?php echo $form->textField($model, 'pais', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'pais'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'distrito'); ?>
                        <?php echo $form->textField($model, 'distrito', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'distrito'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'concelho'); ?>
                        <?php echo $form->textField($model, 'concelho', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'concelho'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'endereco'); ?>
                        <?php echo $form->textField($model, 'endereco', array('size' => 60, 'maxlength' => 200)); ?>
                        <?php echo $form->error($model, 'endereco'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'codpostal'); ?>
                        <?php echo $form->textField($model, 'codpostal', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'codpostal'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'area'); ?>
                        <?php echo $form->textField($model, 'area', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'area'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'lat'); ?>
                        <?php echo $form->textField($model, 'lat', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'lat'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'lng'); ?>
                        <?php echo $form->textField($model, 'lng', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'lng'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'altitude'); ?>
                        <?php echo $form->textField($model, 'altitude', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'altitude'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'localidade'); ?>
                        <?php echo $form->textField($model, 'localidade', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'localidade'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'dist_centro'); ?>
                        <?php echo $form->textField($model, 'dist_centro', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'dist_centro'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'dist_praia'); ?>
                        <?php echo $form->textField($model, 'dist_praia', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'dist_praia'); ?>
                    </div>
                   <div class="buttonWrapper">
                        <div id="summary1" class="summary">
                        </div>
                       <input type="button" title="Next"  value="Seguinte" class="but open21 nextbutton" name="formNext1" />
                    </div>
                </fieldset>
            </div>
            <h3><a href="#">Composição e caracteristicas (Passo 2 de 5)</a></h3>
            <div id="sf2">
                <fieldset>
                    <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'piscina'); ?>
                        <?php echo $form->checkBox($model, 'piscina'); ?>
                        <?php echo $form->error($model, 'piscina'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'televisao'); ?>
                        <?php echo $form->checkBox($model, 'televisao'); ?>
                        <?php echo $form->error($model, 'televisao'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'ar_condicionado'); ?>
                        <?php echo $form->checkBox($model, 'ar_condicionado'); ?>
                        <?php echo $form->error($model, 'ar_condicionado'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'img_1'); ?>
                        <?php echo $form->fileField($model, 'img_1', array('size' => 60, 'maxlength' => 300)); ?>
                        <?php echo $form->error($model, 'img_1'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'alt_img_1'); ?>
                        <?php echo $form->textField($model, 'alt_img_1', array('size' => 60, 'maxlength' => 300)); ?>
                        <?php echo $form->error($model, 'alt_img_1'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'img_2'); ?>
                        <?php echo $form->fileField($model, 'img_2', array('size' => 60, 'maxlength' => 300)); ?>
                        <?php echo $form->error($model, 'img_2'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'img_3'); ?>
                        <?php echo $form->fileField($model, 'img_3', array('size' => 60, 'maxlength' => 300)); ?>
                        <?php echo $form->error($model, 'img_3'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'img_4'); ?>
                        <?php echo $form->fileField($model, 'img_4', array('size' => 60, 'maxlength' => 300)); ?>
                        <?php echo $form->error($model, 'img_4'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'img_5'); ?>
                        <?php echo $form->fileField($model, 'img_5', array('size' => 60, 'maxlength' => 300)); ?>
                        <?php echo $form->error($model, 'img_5'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'img_6'); ?>
                        <?php echo $form->fileField($model, 'img_6', array('size' => 60, 'maxlength' => 300)); ?>
                        <?php echo $form->error($model, 'img_6'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'img_7'); ?>
                        <?php echo $form->fileField($model, 'img_7', array('size' => 60, 'maxlength' => 300)); ?>
                        <?php echo $form->error($model, 'img_7'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'img_8'); ?>
                        <?php echo $form->fileField($model, 'img_8', array('size' => 60, 'maxlength' => 300)); ?>
                        <?php echo $form->error($model, 'img_8'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'quartos'); ?>
                        <?php echo $form->textField($model, 'quartos'); ?>
                        <?php echo $form->error($model, 'quartos'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'camascasal'); ?>
                        <?php echo $form->textField($model, 'camascasal'); ?>
                        <?php echo $form->error($model, 'camascasal'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'camassingle'); ?>
                        <?php echo $form->textField($model, 'camassingle'); ?>
                        <?php echo $form->error($model, 'camassingle'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'casasbanho'); ?>
                        <?php echo $form->textField($model, 'casasbanho'); ?>
                        <?php echo $form->error($model, 'casasbanho'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'golf'); ?>
                        <?php echo $form->checkBox($model, 'golf'); ?>
                        <?php echo $form->error($model, 'golf'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'tenis'); ?>
                        <?php echo $form->checkBox($model, 'tenis'); ?>
                        <?php echo $form->error($model, 'tenis'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'pesca'); ?>
                        <?php echo $form->checkBox($model, 'pesca'); ?>
                        <?php echo $form->error($model, 'pesca'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'natacao'); ?>
                        <?php echo $form->checkBox($model, 'natacao'); ?>
                        <?php echo $form->error($model, 'natacao'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'bowling'); ?>
                        <?php echo $form->checkBox($model, 'bowling'); ?>
                        <?php echo $form->error($model, 'bowling'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'casino'); ?>
                        <?php echo $form->checkBox($model, 'casino'); ?>
                        <?php echo $form->error($model, 'casino'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'cinema'); ?>
                        <?php echo $form->checkBox($model, 'cinema'); ?>
                        <?php echo $form->error($model, 'cinema'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'discoteca'); ?>
                        <?php echo $form->checkBox($model, 'discoteca'); ?>
                        <?php echo $form->error($model, 'discoteca'); ?>
                    </div>
                    <div class="buttonWrapper">
                        <div id="summary2" class="summary">
                        </div>
                       <input type="button" title="Back" value="Anterior" name="formBack1" class="open0 prevbutton but" />
                        <input type="button" title="Next"  value="Seguinte" class="open2 nextbutton but" name="formNext2" /></div>
                </fieldset>
            </div>
            <h3><a href="#">Serviços e equipamento (Passo 3 de 5)</a></h3>
            <div id="sf3">
                <fieldset>
                    <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'outras_actividprox'); ?>
                        <?php echo $form->textArea($model, 'outras_actividprox', array('rows' => 6, 'cols' => 50)); ?>
                        <?php echo $form->error($model, 'outras_actividprox'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'roupascama'); ?>
                        <?php echo $form->checkBox($model, 'roupascama'); ?>
                        <?php echo $form->error($model, 'roupascama'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'roupasbanho'); ?>
                        <?php echo $form->checkBox($model, 'roupasbanho'); ?>
                        <?php echo $form->error($model, 'roupasbanho'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'limpeza'); ?>
                        <?php echo $form->checkBox($model, 'limpeza'); ?>
                        <?php echo $form->error($model, 'limpeza'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'utilcozinha'); ?>
                        <?php echo $form->checkBox($model, 'utilcozinha'); ?>
                        <?php echo $form->error($model, 'utilcozinha'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'fogao'); ?>
                        <?php echo $form->checkBox($model, 'fogao'); ?>
                        <?php echo $form->error($model, 'fogao'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'frigorif'); ?>
                        <?php echo $form->checkBox($model, 'frigorif'); ?>
                        <?php echo $form->error($model, 'frigorif'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'congel'); ?>
                        <?php echo $form->checkBox($model, 'congel'); ?>
                        <?php echo $form->error($model, 'congel'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'forno'); ?>
                        <?php echo $form->checkBox($model, 'forno'); ?>
                        <?php echo $form->error($model, 'forno'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'barbecue'); ?>
                        <?php echo $form->checkBox($model, 'barbecue'); ?>
                        <?php echo $form->error($model, 'barbecue'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'microndas'); ?>
                        <?php echo $form->checkBox($model, 'microndas'); ?>
                        <?php echo $form->error($model, 'microndas'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'mlavaloica'); ?>
                        <?php echo $form->checkBox($model, 'mlavaloica'); ?>
                        <?php echo $form->error($model, 'mlavaloica'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'mlavaroupa'); ?>
                        <?php echo $form->checkBox($model, 'mlavaroupa'); ?>
                        <?php echo $form->error($model, 'mlavaroupa'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'aqcentral'); ?>
                        <?php echo $form->checkBox($model, 'aqcentral'); ?>
                        <?php echo $form->error($model, 'aqcentral'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'satcabo'); ?>
                        <?php echo $form->checkBox($model, 'satcabo'); ?>
                        <?php echo $form->error($model, 'satcabo'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'internet'); ?>
                        <?php echo $form->checkBox($model, 'internet'); ?>
                        <?php echo $form->error($model, 'internet'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'outros_servicos'); ?>
                        <?php echo $form->checkBox($model, 'outros_servicos'); ?>
                        <?php echo $form->error($model, 'outros_servicos'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'link_info'); ?>
                        <?php echo $form->textField($model, 'link_info', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'link_info'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'link_dispon'); ?>
                        <?php echo $form->textField($model, 'link_dispon', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'link_dispon'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'activo'); ?>
                        <?php echo $form->checkBox($model, 'activo'); ?>
                        <?php echo $form->error($model, 'activo'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'sessid'); ?>
                        <?php echo $form->textField($model, 'sessid', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'sessid'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'promo'); ?>
                        <?php echo $form->checkBox($model, 'promo'); ?>
                        <?php echo $form->error($model, 'promo'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'certif'); ?>
                        <?php echo $form->checkBox($model, 'certif'); ?>
                        <?php echo $form->error($model, 'certif'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'data_act'); ?>
                        <?php echo $form->textField($model, 'data_act', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'data_act'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'titulo'); ?>
                        <?php echo $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 100)); ?>
                        <?php echo $form->error($model, 'titulo'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'qtspecialoffer'); ?>
                        <?php echo $form->textField($model, 'qtspecialoffer'); ?>
                        <?php echo $form->error($model, 'qtspecialoffer'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'fengomar'); ?>
                        <?php echo $form->checkBox($model, 'fengomar'); ?>
                        <?php echo $form->error($model, 'fengomar'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'estacionamento'); ?>
                        <?php echo $form->checkBox($model, 'estacionamento'); ?>
                        <?php echo $form->error($model, 'estacionamento'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'telefone'); ?>
                        <?php echo $form->checkBox($model, 'telefone'); ?>
                        <?php echo $form->error($model, 'telefone'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'despertador'); ?>
                        <?php echo $form->checkBox($model, 'despertador'); ?>
                        <?php echo $form->error($model, 'despertador'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'dvd'); ?>
                        <?php echo $form->checkBox($model, 'dvd'); ?>
                        <?php echo $form->error($model, 'dvd'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'torradeira'); ?>
                        <?php echo $form->checkBox($model, 'torradeira'); ?>
                        <?php echo $form->error($model, 'torradeira'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'animais'); ?>
                        <?php echo $form->checkBox($model, 'animais'); ?>
                        <?php echo $form->error($model, 'animais'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'fumadores'); ?>
                        <?php echo $form->checkBox($model, 'fumadores'); ?>
                        <?php echo $form->error($model, 'fumadores'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'caucao'); ?>
                        <?php echo $form->checkBox($model, 'caucao'); ?>
                        <?php echo $form->error($model, 'caucao'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'valorcaucao'); ?>
                        <?php echo $form->textField($model, 'valorcaucao', array('size' => 50, 'maxlength' => 50)); ?>
                        <?php echo $form->error($model, 'valorcaucao'); ?>
                    </div>
                   <div class="row-fluid">
                        <?php echo $form->labelEx($model, 'deficientes'); ?>
                        <?php echo $form->checkBox($model, 'deficientes'); ?>
                        <?php echo $form->error($model, 'deficientes'); ?>
                    </div>
                   <div class="row-fluid buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('id' => 'adicionarcasa')); ?>
                    </div>
                </fieldset>
                <div id="summary3" class="summary">
               </div>
                <div>
                    <input type="button" title="Back"  value="Anterior" class="open1 prevbutton but" name="formBack2" />
                    <input type="button" title="Next"  value="Seguinte" class="open3 nextbutton but" name="formNext3" />
                </div>
            </div>
            <div id="summarytotal" class="summary"></div>
            <?php $this->endWidget(); ?>
            <div id="carrega">
            </div>
            <div class="blockMsg" id="domMessage" style="display:none;"><img src="/siteimg/ajax-loader.gif"/>Aguarde um momento...</div>
        </div><!-- form -->
   </div>
</div>


<script type="text/javascript">
    $.blockUI({message: $('#domMessage')});
    setTimeout($.unblockUI, 1500);
   $(document).ready(function() {
       // add * to required field labels
        $('label.required').append("&nbsp;<strong class='vermelho'>*</strong>&nbsp;");
       // accordion functions
        var accordion = $("#stepForm").accordion({
            event: "",
            autoHeight: false
       });
       var current = 0;
       $.validator.addMethod("pageRequired", function(value, element) {
            var $element = $(element)
            function match(index) {
                return current == index && $(element).parents("#sf" + (index + 1)).length;
            }
            if (match(0) || match(1) || match(2) || match(3) || match(4)) {
               return !this.optional(element);
           }
            return "dependency-mismatch";
        }, $.validator.messages.required)
       var v = $("#casa-form").validate({
            errorClass: "error",
            success: function(label) {
               label.html("&nbsp;").addClass("checked");
           },
            invalidHandler: function(form) {
                $(".summary").addClass("ui-state-error");
                $(".summary").text(v.numberOfInvalids() + " campos inválidos");
                $(".summary").width(150);
            }
       });
       // back buttons do not need to run validation
        $(".open0.prevbutton").click(function() {
            $.blockUI({message: $('#domMessage')});
            setTimeout($.unblockUI, 1500);
           $("#stepForm").accordion({active: 0})
            current = 0;
       });
        $(".open1.prevbutton").click(function() {
            $.blockUI({message: $('#domMessage')});
            setTimeout($.unblockUI, 1500);
           $("#stepForm").accordion({active: 1})
            current = 1;
       });
       $(".open2.prevbutton").click(function() {
            $("#stepForm").accordion({active: 2})
            current = 2;
       });
        $(".open3.prevbutton").click(function() {
            $("#stepForm").accordion({active: 3})
            current = 3;
       });
       // these buttons all run the validation, overridden by specific targets above
       $(".open4.nextbutton").click(function() {
            $.blockUI();
            setTimeout($.unblockUI, 1500);
           if (v.form()) {
               $(".summary").empty();
                $(".summary").removeClass("ui-state-error");
               $('html, body').animate({scrollTop: $('#sf4').offset().top}, 1500);
                $("#stepForm").accordion('activate', 4)
                current = 4;
           }
        });
       $(".open3.nextbutton").click(function() {
            $.blockUI();
            setTimeout($.unblockUI, 1500);
           if (v.form()) {
               $(".summary").empty();
                $(".summary").removeClass("ui-state-error");
               $('html, body').animate({scrollTop: $('#sf3').offset().top}, 1500);
                $("#stepForm").accordion('activate', 3)
                current = 3;
           }
        });
       $(".open2.nextbutton").click(function() {
            $.blockUI();
            setTimeout($.unblockUI, 1500);
           if (v.form()) {
               $(".summary").empty();
                $(".summary").removeClass("ui-state-error");
                $('html, body').animate({scrollTop: $('#sf2').offset().top}, 1500);
                $("#stepForm").accordion('activate', 2)
                current = 2;
           }
        });
        $(".open21.nextbutton").click(function() {
            $.blockUI();
            setTimeout($.unblockUI, 1500);
           if (v.form()) {
               $(".summary").empty();
                $(".summary").removeClass("ui-state-error");
               $('html, body').animate({scrollTop: $('#sf1').offset().top}, 1500);
                $("#stepForm").accordion('activate', 1)
                current = 1;
           }
        });
        $(".open0").click(function() {
            $.blockUI();
            setTimeout($.unblockUI, 1500);
           if (v.form()) {
               $("#stepForm").accordion('activate', 0)
                current = 0;
                $(".summary").empty();
                $(".summary").removeClass("ui-state-error");
           }
        });
       $("#destino").change(function() {
           if ($(this).attr("selectedIndex") == 1) {
                $("#condicao").html("<label for='distcentro'>Distância Centro</label><input id='distcentro' name='distcentro' type='text' class='inputclass pageRequired' value=''/>");
            }
            else if ($(this).attr("selectedIndex") == 2) {
                $("#condicao").html("<label for='distpraia'>Distância Praia</label><input id='distpraia' name='distpraia' type='text' class='inputclass pageRequired' value=''/>");
            }
            else if ($(this).attr("selectedIndex") == 5) {
                $("#condicao").html("<label for='altitude'>Altitude</label><input id='altitude' name='altitude' type='text' class='inputclass pageRequired' value=''/>");
            }
            else
                $("#condicao").empty();
        });
       $(".but").button();
        $.growlUI('Growl Notification', 'Casa Adicionada, complete informação.');
   });
</script>

<script type="text/javascript">
   var elevator = new google.maps.ElevationService();
    var geo = new google.maps.Geocoder();
    var myOptions = {
        center: new google.maps.LatLng(<?php echo $model->lat; ?>,<?php echo $model->lng; ?>),
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
    google.maps.event.addListener(map, "click", function(e) {
        clicked(e.latLng, map);
    });
    google.maps.event.addListener(marker, 'dragend', function(e) {
        clicked(e.latLng, map);
    });
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });
    // Recenter Map and add Coords by clicking the map
    function showAddress(address) {
       if (geo) {
            geo.geocode({'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    //In this case it creates a marker, but you can get the lat and lng from the location.LatLng
                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
            });
        }
    }
    function clicked(position, map) {
       marker.setPosition(position);
        map.panTo(position);
        map.setCenter(position);
        //map.closeInfoWindow();
        if (position) {
           var locations = [];
            locations.push(position);
            var positionalRequest = {
                'locations': locations
            }
           elevator.getElevationForLocations(positionalRequest, function(results, status) {
                if (status == google.maps.ElevationStatus.OK) {
                   // Retrieve the first result
                    if (results[0]) {
                       if (confirm('Altitude ' + (results[0].elevation).toFixed() + " m ?")) {
                            document.getElementById("Casa_altitude").value = (results[0].elevation).toFixed() + " m";
                       }
                   } else {
                        alert("No results found");
                    }
                } else {
                    alert("Elevation service failed due to: " + status);
                }
            });
           geo.geocode({'latLng': position}, function(results, status) {
               if (status != google.maps.GeocoderStatus.OK) {
                    alert("reverse geocoder failed to find an address for " + position.toUrlValue());
                }
                else {
                   address = results[0].formatted_address;
                    resLenght = Object.keys(results).length;
                    addrLenght = Object.keys(addr).length;
                    if (confirm('Ok?\n\n\n' + address)) {
                       document.getElementById("Casa_lat").value = results[0].geometry.location.lat();
                        document.getElementById("Casa_lng").value = results[0].geometry.location.lng();
                        for (var k = 0; k <= resLenght; k++) {
                           for (var i = 0; i <= addrLenght; i++) {
                               if (results[k].address_components[i].types[0] == 'administrative_area_level_2' || results[k].address_components[i].types[0] == 'administrative_area_level_3' || results[k].address_components[i].types[0] == 'locality') {
                                    //  alert( "CONCELHO:" + r[a] + " ?");
                                    document.getElementById("Casa_concelho").value = results[k].address_components[i].long_name.replace('Municipality', '');
                                }
                                if (results[k].address_components[i].types[0] == 'administrative_area_level_3' || results[k].address_components[i].types[0] == 'administrative_area_level_3' || results[k].address_components[i].types[0] == 'locality') {
                                    //  alert( "CONCELHO:" + r[a] + " ?");
                                    document.getElementById("Casa_localidade").value = results[k].address_components[i].long_name.replace('Municipality', '');
                                }
                                if (results[k].address_components[i].types[0] == 'administrative_area_level_1') {
                                    //  alert("DISTRITO:" + r[a] + " ?");
                                    document.getElementById("Casa_distrito").value = results[k].address_components[i].long_name.replace('District', '');
                                }
                                if (results[k].address_components[i].types[0] == 'country') {
                                    // alert("País:" + r[a] + " ?");
                                    document.getElementById("Casa_pais").value = results[k].address_components[i].long_name;
                                }
                               if (results[k].address_components[i].types[0] == 'postal_code_prefix') {
                                    // alert("País:" + r[a] + " ?");
                                    document.getElementById("Casa_codpostal").value = results[k].address_components[i].long_name;
                                }
                                if (results[k].address_components[i].types[0] == 'postal_code') {
                                    // alert("País:" + r[a] + " ?");
                                    document.getElementById("Casa_codpostal").value = results[k].address_components[i].long_name;
                                }
                                if (results[0].formatted_address) {
                                    // alert("País:" + r[a] + " ?");
                                    document.getElementById("Casa_endereco").value = results[0].formatted_address;
                                }
                           }
                       }
                    }
               }
            });
        }
    }
    function dragged() {
        marker.setPosition(position);
        map.panTo(position);
        map.setCenter(position);
        //map.closeInfoWindow();
        if (position) {
            geo.geocode({'latLng': position}, function(results, status) {
               if (status != google.maps.GeocoderStatus.OK) {
                    alert("reverse geocoder failed to find an address for " + position.toUrlValue());
                }
                else {
                   address = results[0].formatted_address;
                    resLenght = Object.keys(results).length;
                    addrLenght = Object.keys(addr).length;
                    if (confirm('Ok?\n\n\n' + address)) {
                       document.getElementById("Casa_lat").value = results[0].geometry.location.lat();
                        document.getElementById("Casa_lng").value = results[0].geometry.location.lng();
                        for (var k = 0; k <= resLenght; k++) {
                           for (var i = 0; i <= addrLenght; i++) {
                               if (results[k].address_components[i].types[0] == 'administrative_area_level_2' || results[k].address_components[i].types[0] == 'administrative_area_level_3' || results[k].address_components[i].types[0] == 'locality') {
                                    //  alert( "CONCELHO:" + r[a] + " ?");
                                    document.getElementById("Casa_localidade").value = results[k].address_components[i].long_name.replace('Municipality', '');
                                }
                                if (results[k].address_components[i].types[0] == 'administrative_area_level_1') {
                                    //  alert("DISTRITO:" + r[a] + " ?");
                                    document.getElementById("Casa_distrito").value = results[k].address_components[i].long_name.replace('District', '');
                                }
                                if (results[k].address_components[i].types[0] == 'country') {
                                    // alert("País:" + r[a] + " ?");
                                    document.getElementById("Casa_pais").value = results[k].address_components[i].long_name;
                                }
                            }
                       }
                    }
               }
            });
        }
    }

</script>