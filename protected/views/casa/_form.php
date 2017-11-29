<?php
Yii::app()->clientScript
        ->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.jqEasyCharCounter.min.js');

if (!$model->proprietario) {
    $prop = Yii::app()->user->name;
} else {
    $prop = $model->proprietario;
}
if (!$model->propid) {
    $propid = Yii::app()->user->id;
} else {
    $propid = $model->propid;
}


if (isset($trans->messages)) {
    foreach ($trans->messages as $lang => $translation) {
        if ($translation->language == 'en')
            $en = $translation->translation;
        if ($translation->language == 'de')
            $de = $translation->translation;
        if ($translation->language == 'es')
            $es = $translation->translation;
        if ($translation->language == 'fr')
            $fr = $translation->translation;
    }
}

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'casa-form',
    'enableClientValidation' => true,
    //'errorMessageCssClass' => 'has-error',
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('role' => 'form', 'class' => 'form-horizontal')
        ));
echo $form->hiddenField($model, 'proprietario', array('size' => 50, 'maxlength' => 50, 'value' => $prop));
?>
<?php echo $form->errorSummary($model); ?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h3 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <?php echo Yii::t("content", "Localização  e caraterísticas(Passo 1 de 2)") ?></a></h3>


        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <div id="sf1" class="container-fluid">
                    <div class="buttonWrapper row pull-right">
                        <a href="#collapseTwo" class=" btn btn-mini btn-warning button"  data-toggle="collapse" data-target="#collapseTwo"><?php echo Yii::t("content", "Seguinte") ?></a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <?php
                        if (Yii::app()->user->name == Yii::app()->params["adminEmail"]) :
                            ?>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'propid'); ?>
                                <?php echo $form->dropDownList($model, 'propid', CHtml::listData(Proprietario::model()->findAll(), 'propid', 'proprietario'), array('prompt' => Yii::t("content", "Escolha proprietario"), "class" => "btn btn-warning form-control")); ?>
                                <?php echo $form->error($model, 'propid'); ?>

                            </div>

                        <?php else : echo $form->hiddenField($model, 'propid', array('size' => 50, 'maxlength' => 50, 'value' => $propid)); ?>
                        <?php endif; ?>
                        <div class="form-group">

                            <img class="" src="/images/pt.gif"/>
                            <?php echo $form->labelEx($model, 'seo_title'); ?>
                            <?php echo $form->textField($model, 'seo_title', array('maxlength' => 100, "class" => "form-control")); ?>
                            <button class="btn btn-default getTrans" id="But_seo_title_pt" lang="pt"><?php echo Yii::t("content", "Traduzir") ?></button>

                            <?php echo $form->error($model, 'seo_title'); ?>
                        </div>


                        <div class="form-group">
                            <img class="" src="/images/en.gif"/>
                            <?php echo $form->labelEx($model, 'seo_title_en'); ?>
                            <?php echo $form->textField($model, 'seo_title_en', array('maxlength' => 100, 'value' => isset($en) ? $en : "", "class" => "form-control")); ?>
                            <?php echo $form->error($model, 'seo_title_en'); ?>
                            <button class="btn btn-default getTrans" id="But_seo_title_en" lang="en"><?php echo Yii::t("content", "Traduzir") ?></button>
                        </div>
                        <div class="form-group">
                            <img class="" src="/images/de.gif"/>
                            <?php echo $form->labelEx($model, 'seo_title_de'); ?>
                            <?php echo $form->textField($model, 'seo_title_de', array('maxlength' => 100, 'value' => isset($de) ? $de : "", "class" => "form-control")); ?>
                            <?php echo $form->error($model, 'seo_title_de'); ?>
                            <button class="btn btn-default getTrans" id="But_seo_title_de" lang="de"><?php echo Yii::t("content", "Traduzir") ?></button>
                        </div>
                        <div class="form-group">
                            <img class="" src="/images/es.gif"/>
                            <?php echo $form->labelEx($model, 'seo_title_es'); ?>
                            <?php echo $form->textField($model, 'seo_title_es', array('maxlength' => 100, 'value' => isset($es) ? $es : "", "class" => "form-control")); ?>
                            <?php echo $form->error($model, 'seo_title_es'); ?>
                            <button class="btn btn-default getTrans" id="But_seo_title_es" lang="es"><?php echo Yii::t("content", "Traduzir") ?></button>
                        </div>
                        <div class="form-group">
                            <img class="" src="/images/fr.gif"/>
                            <?php echo $form->labelEx($model, 'seo_title_fr'); ?>
                            <?php echo $form->textField($model, 'seo_title_fr', array('maxlength' => 100, 'value' => isset($fr) ? $fr : "", "class" => "form-control")); ?>
                            <?php echo $form->error($model, 'seo_title_fr'); ?>
                            <button class="btn btn-default getTrans" id="But_seo_title_fr" lang="fr"><?php echo Yii::t("content", "Traduzir") ?></button>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'titulo'); ?>
                            <?php echo $form->textArea($model, 'titulo', array('maxlength' => 600, 'class' => 'titulo', 'class' => "form-control")); ?>
                            <?php echo $form->error($model, 'titulo'); ?>

                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'destino'); ?>
                            <?php echo $form->dropDownList($model, 'destino', CHtml::listData(Destino::model()->findAll(), 'destino', 'destino'), array('prompt' => 'Select Tipo Destino', "class" => "form-control")); ?>
                            <?php echo $form->error($model, 'destino'); ?>
                        </div>


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'designacao'); ?>
                            <?php echo $form->textField($model, 'designacao', array('size' => 15, 'maxlength' => 15, 'class' => "form-control"));
                            ?>
                            <?php echo $form->error($model, 'designacao'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'tipoalojamento'); ?>
                            <?php echo $form->dropDownList($model, 'tipoalojamento', CHtml::listData(TipoAlojamento::model()->findAll(), 'nameLocalized', 'nameLocalized'), array('prompt' => 'Select Tipo Alojamento', 'class' => "form-control")); ?>
                            <?php echo $form->error($model, 'tipoalojamento'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'tipo'); ?>
                            <?php echo $form->dropDownList($model, 'tipo', CHtml::listData(Tipo::model()->findAll(), 'tipo', 'tipo'), array('prompt' => 'Select Tipo', 'class' => "form-control")); ?>
                            <?php echo $form->error($model, 'tipo'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'pessoas'); ?>
                            <?php echo $form->textField($model, 'pessoas', array('size' => 15, 'maxlength' => 50, 'class' => "form-control")); ?>
                            <?php echo $form->error($model, 'pessoas'); ?>
                        </div>
                        <?php echo $form->hiddenField($model, 'cod_casa'); ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'quartos'); ?>
                            <?php echo $form->textField($model, 'quartos', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'quartos'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'camascasal'); ?>
                            <?php echo $form->textField($model, 'camascasal', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'camascasal'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'camassingle'); ?>
                            <?php echo $form->textField($model, 'camassingle', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'camassingle'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'casasbanho'); ?>
                            <?php echo $form->textField($model, 'casasbanho', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'casasbanho'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'area'); ?>
                            <?php echo $form->textField($model, 'area', array('class' => "form-control")); ?>
                            <?php echo $form->error($model, 'area'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'dist_centro'); ?>
                            <?php echo $form->textField($model, 'dist_centro', array('size' => 15, 'maxlength' => 50, 'class' => "form-control")); ?>
                            <?php echo $form->error($model, 'dist_centro'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'dist_praia'); ?>
                            <?php echo $form->textField($model, 'dist_praia', array('size' => 15, 'maxlength' => 50, 'class' => "form-control")); ?>
                            <?php echo $form->error($model, 'dist_praia'); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <?php if (Yii::app()->user->name == Yii::app()->params['adminEmail']): ?>

                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'activo'); ?>
                                <?php echo $form->checkBox($model, 'activo', array('uncheckValue' => '')); ?>
                                <?php echo $form->error($model, 'activo'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'certif'); ?>
                                <?php echo $form->checkBox($model, 'certif', array('uncheckValue' => '')); ?>
                                <?php echo $form->error($model, 'certif'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'certif_energ'); ?>
                                <?php echo $form->checkBox($model, 'certif_energ', array('uncheckValue' => '')); ?>
                                <?php echo $form->error($model, 'certif_energ'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'certif_energ_level'); ?>
                                <?php
                                echo $form->dropDownList($model, 'certif_energ_level', array(
                                    'A' => "A",
                                    "B" => "B",
                                    "C" => "C",
                                    "D" => "D",
                                    "E" => "F",
                                    "F" => "G"
                                ));
                                ?>
                                <?php echo $form->error($model, 'certif_energ_level'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'for_rent'); ?>
                                <?php echo $form->checkBox($model, 'for_rent', array('uncheckValue' => '')); ?>
                                <?php echo $form->error($model, 'for_rent'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'for_arrenda'); ?>
                                <?php echo $form->checkBox($model, 'for_arrenda', array('uncheckValue' => '')); ?>
                                <?php echo $form->error($model, 'for_arrenda'); ?>
                            </div>
                            <div class="form-group varrenda">
                                <?php echo $form->labelEx($model, 'valor_arrendamento'); ?>
                                <?php echo $form->textField($model, 'valor_arrendamento', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'valor_arrendamento'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'valorcaucao'); ?>
                                <?php echo $form->textField($model, 'valorcaucao', array('size' => 15, 'maxlength' => 50, 'class' => "form-control")); ?>
                                <?php echo $form->error($model, 'valorcaucao'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'for_sale'); ?>
                                <?php echo $form->checkBox($model, 'for_sale', array('uncheckValue' => '')); ?>
                                <?php echo $form->error($model, 'for_sale'); ?>
                            </div>
                            <div class="form-group vvenda">
                                <?php echo $form->labelEx($model, 'valor_venda'); ?>
                                <?php echo $form->textField($model, 'valor_venda', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'valor_venda'); ?>
                            </div>
                            <div class="form-group">

                                <?php echo $form->labelEx($model, 'ano'); ?>
                                <?php echo $form->textField($model, 'ano', array("class" => "form-control")); ?>
                                <?php echo $form->error($model, 'ano'); ?>
                            </div>

                        <?php endif; ?>


                        <div class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span><?php echo Yii::t("content", "Escreva a cidade e o País e arraste a marca para preencher localização automáticamente.") ?></div>


                        <div class="input-group form-group">
                            <input type="text"  id="addr" name="address" placeholder="ex: Lisboa, Portugal" class="form-control" /><span class="input-group-btn">
                                <button class="btn btn-default" type="button" onclick="showAddress(address.value)"><?php echo Yii::t("content", "Ir") ?>  <span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div><!-- /input-group -->

                        <div id="map"  style="width: 100%; height: 300px;margin-top:20px;margin-bottom:20px;">
                        </div>


                    </div>




                    <div class="col-xs-12 col-md-6 col-lg-6">


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'pais'); ?>
                            <?php echo $form->textField($model, 'pais', array('size' => 15, 'maxlength' => 50, 'class' => "form-control")); ?>
                            <?php echo $form->error($model, 'pais'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'distrito'); ?>
                            <?php echo $form->textField($model, 'distrito', array('size' => 15, 'maxlength' => 50, 'class' => "form-control")); ?>
                            <?php echo $form->error($model, 'distrito'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'concelho'); ?>
                            <?php echo $form->textField($model, 'concelho', array('size' => 15, 'maxlength' => 50, 'class' => "form-control")); ?>
                            <?php echo $form->error($model, 'concelho'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'endereco'); ?>
                            <?php echo $form->textField($model, 'endereco', array('size' => 15, 'maxlength' => 200, 'class' => "form-control")); ?>
                            <?php echo $form->error($model, 'endereco'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'codpostal'); ?>
                            <?php echo $form->textField($model, 'codpostal', array('size' => 15, 'maxlength' => 50, 'class' => "form-control")); ?>
                            <?php echo $form->error($model, 'codpostal'); ?>
                        </div>


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'lat'); ?>
                            <?php echo $form->textField($model, 'lat', array('size' => 15, 'maxlength' => 50, 'class' => "form-control", 'placeholder' => 'use map')); ?>
                            <?php echo $form->error($model, 'lat'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'lng'); ?>
                            <?php echo $form->textField($model, 'lng', array('size' => 15, 'maxlength' => 50, 'class' => "form-control", 'placeholder' => 'use map')); ?>
                            <?php echo $form->error($model, 'lng'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'altitude'); ?>
                            <?php echo $form->textField($model, 'altitude', array('size' => 15, 'maxlength' => 50, 'class' => "form-control", 'placeholder' => 'use map')); ?>
                            <?php echo $form->error($model, 'altitude'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'localidade'); ?>
                            <?php echo $form->textField($model, 'localidade', array('size' => 15, 'maxlength' => 50, 'class' => "form-control")); ?>
                            <?php echo $form->error($model, 'localidade'); ?>
                        </div>

                        <div class="buttonWrapper row pull-right">
                            <a href="#collapseTwo" class=" btn btn-mini btn-warning button"  data-toggle="collapse" data-target="#collapseTwo"><?php echo Yii::t("content", "Seguinte") ?></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">

            <h3 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><?php echo Yii::t("content", "Composição") ?></a></h3>

        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div id="sf2 container">
                    <div class="buttonWrapper">
                        <a href="#collapseOne" class="prevbutton btn btn-mini btn-warning"  data-toggle="collapse" data-target="#collapseOne"><?php echo Yii::t("content", "Anterior") ?></a>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'piscina'); ?>
                            <?php echo $form->checkBox($model, 'piscina', array()); ?>
                            <?php echo $form->error($model, 'piscina'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'televisao'); ?>
                            <?php echo $form->checkBox($model, 'televisao'); ?>
                            <?php echo $form->error($model, 'televisao'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'ar_condicionado'); ?>
                            <?php echo $form->checkBox($model, 'ar_condicionado'); ?>
                            <?php echo $form->error($model, 'ar_condicionado'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'roupascama'); ?>
                            <?php echo $form->checkBox($model, 'roupascama'); ?>
                            <?php echo $form->error($model, 'roupascama'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'roupasbanho'); ?>
                            <?php echo $form->checkBox($model, 'roupasbanho'); ?>
                            <?php echo $form->error($model, 'roupasbanho'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'limpeza'); ?>
                            <?php echo $form->checkBox($model, 'limpeza'); ?>
                            <?php echo $form->error($model, 'limpeza'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'utilcozinha'); ?>
                            <?php echo $form->checkBox($model, 'utilcozinha'); ?>
                            <?php echo $form->error($model, 'utilcozinha'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'fogao'); ?>
                            <?php echo $form->checkBox($model, 'fogao'); ?>
                            <?php echo $form->error($model, 'fogao'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'frigorif'); ?>
                            <?php echo $form->checkBox($model, 'frigorif'); ?>
                            <?php echo $form->error($model, 'frigorif'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'congel'); ?>
                            <?php echo $form->checkBox($model, 'congel'); ?>
                            <?php echo $form->error($model, 'congel'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'forno'); ?>
                            <?php echo $form->checkBox($model, 'forno'); ?>
                            <?php echo $form->error($model, 'forno'); ?>
                        </div>
                        <div class="form-group">
                            <a href="#collapseOne" class="prevbutton btn btn-mini btn-warning"  data-toggle="collapse" data-target="#collapseOne"><?php echo Yii::t("content", "Anterior") ?></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-3">

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'barbecue'); ?>
                            <?php echo $form->checkBox($model, 'barbecue'); ?>
                            <?php echo $form->error($model, 'barbecue'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'microndas'); ?>
                            <?php echo $form->checkBox($model, 'microndas'); ?>
                            <?php echo $form->error($model, 'microndas'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'mlavaloica'); ?>
                            <?php echo $form->checkBox($model, 'mlavaloica'); ?>
                            <?php echo $form->error($model, 'mlavaloica'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'mlavaroupa'); ?>
                            <?php echo $form->checkBox($model, 'mlavaroupa'); ?>
                            <?php echo $form->error($model, 'mlavaroupa'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'aqcentral'); ?>
                            <?php echo $form->checkBox($model, 'aqcentral'); ?>
                            <?php echo $form->error($model, 'aqcentral'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'satcabo'); ?>
                            <?php echo $form->checkBox($model, 'satcabo'); ?>
                            <?php echo $form->error($model, 'satcabo'); ?>
                        </div>


                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'internet'); ?>
                            <?php echo $form->checkBox($model, 'internet'); ?>
                            <?php echo $form->error($model, 'internet'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'outros_servicos'); ?>
                            <?php echo $form->checkBox($model, 'outros_servicos'); ?>
                            <?php echo $form->error($model, 'outros_servicos'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'fengomar'); ?>
                            <?php echo $form->checkBox($model, 'fengomar'); ?>
                            <?php echo $form->error($model, 'fengomar'); ?>
                        </div>

                    </div>

                    <div class="col-xs-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'estacionamento'); ?>
                            <?php echo $form->checkBox($model, 'estacionamento'); ?>
                            <?php echo $form->error($model, 'estacionamento'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'telefone'); ?>
                            <?php echo $form->checkBox($model, 'telefone'); ?>
                            <?php echo $form->error($model, 'telefone'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'despertador'); ?>
                            <?php echo $form->checkBox($model, 'despertador'); ?>
                            <?php echo $form->error($model, 'despertador'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'dvd'); ?>
                            <?php echo $form->checkBox($model, 'dvd'); ?>
                            <?php echo $form->error($model, 'dvd'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'torradeira'); ?>
                            <?php echo $form->checkBox($model, 'torradeira'); ?>
                            <?php echo $form->error($model, 'torradeira'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'animais'); ?>
                            <?php echo $form->checkBox($model, 'animais'); ?>
                            <?php echo $form->error($model, 'animais'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'fumadores'); ?>
                            <?php echo $form->checkBox($model, 'fumadores'); ?>
                            <?php echo $form->error($model, 'fumadores'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'caucao'); ?>
                            <?php echo $form->checkBox($model, 'caucao'); ?>
                            <?php echo $form->error($model, 'caucao'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'deficientes'); ?>
                            <?php echo $form->checkBox($model, 'deficientes'); ?>
                            <?php echo $form->error($model, 'deficientes'); ?>
                        </div>


                    </div>

                    <div class="col-xs-12 col-md-3 col-lg-3 well-small">
                        <h4><?php echo Yii::t("content", "Atividades próximas") ?></h4>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'golf'); ?>
                            <?php echo $form->checkBox($model, 'golf'); ?>
                            <?php echo $form->error($model, 'golf'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'tenis'); ?>
                            <?php echo $form->checkBox($model, 'tenis'); ?>
                            <?php echo $form->error($model, 'tenis'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'pesca'); ?>
                            <?php echo $form->checkBox($model, 'pesca'); ?>
                            <?php echo $form->error($model, 'pesca'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'natacao'); ?>
                            <?php echo $form->checkBox($model, 'natacao'); ?>
                            <?php echo $form->error($model, 'natacao'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'bowling'); ?>
                            <?php echo $form->checkBox($model, 'bowling'); ?>
                            <?php echo $form->error($model, 'bowling'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'casino'); ?>
                            <?php echo $form->checkBox($model, 'casino'); ?>
                            <?php echo $form->error($model, 'casino'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'cinema'); ?>
                            <?php echo $form->checkBox($model, 'cinema'); ?>
                            <?php echo $form->error($model, 'cinema'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'discoteca'); ?>
                            <?php echo $form->checkBox($model, 'discoteca'); ?>
                            <?php echo $form->error($model, 'discoteca'); ?>
                        </div>


                    </div>

                </div>      </div>
        </div>
    </div>
</div>

<div class="row text-center">
    <div class="buttons buttonWrapper">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t("content", "Criar") . " <span class='glyphicon glyphicon-floppy-save'></span>" : Yii::t("content", "Salvar") . " <span class='glyphicon glyphicon-floppy-save'></span>", array('id' => 'adicionarcasa', 'class' => 'btn btn-lg btn-primary')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>


<script type="text/javascript">
    $(document).ready(function() {

        if ($('#Casa_for_arrenda').attr('checked') == 'checked')
        {
            $('.varrenda').css('display', 'inline');
        }
        if ($('#Casa_for_sale').attr('checked') == 'checked')
        {
            $('.vvenda').css('display', 'inline');
        }
        $('#Casa_for_arrenda').click(function() {
            $('.varrenda').toggle('slow');
        });
        $('#Casa_for_sale').click(function() {
            $('.vvenda').toggle('slow');
        });

        $('.titulo').jqEasyCounter({
            'maxChars': 600,
            'maxCharsWarning': 400,
            'msgFontColor': '#000',
            'msgWarningColor': '#F00'
        });
    });</script>

<?php
if ($model->lat == '') {
    $model->lat = '37.18302281055254';
}
if ($model->lng == '') {
    $model->lng = '-7.508811950683594';
}
?>

<script type="text/javascript">
    var elevator = new google.maps.ElevationService();
    var geo = new google.maps.Geocoder();
    var myOptions = {
        center: new google.maps.LatLng(<?php echo $model->lat; ?>,<?php echo $model->lng; ?>),
        zoom: 9,
        scrollwheel: false,
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

    $(function() {

        $('.titulo').jqEasyCounter({
            'maxChars': 600,
            'maxCharsWarning': 500,
            'msgFontColor': '#000',
            'msgWarningColor': '#F00'
        });
        //$("#But_seo_title_<?php echo Yii::app()->getLanguage() ?>").hide();

        $(".getTrans").click(function() {
            elem = "#Casa_seo_title_" + $(this).attr("lang");
            $.ajax(
                    {
                        // The link we are accessing.
                        url: "<?php echo $this->createUrl("casa/translate") ?>",
                        // The type of request.
                        type: "post",
                        dataType: "text",
                        data: {lang: $(this).attr('lang'), text: $('#Casa_seo_title').val()},
                        // The type of data that is getting returned.
                        dataType: "html",
                                error: function() {

                                },
                        beforeSend: function() {

                        },
                        complete: function() {

                        },
                        success: function(data) {
                            alert(data);
                            $(elem).val(data);
                        }
                    }
            );
            return false
        });


    });
</script>