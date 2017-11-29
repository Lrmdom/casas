<?php
$model->unsetAttributes();
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'search-mapa',
    "htmlOptions" => array("class" => "form-search ff"),
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'action' => Yii::app()->createUrl('//casa/search/'),
    'method' => 'GET',
        ));
?>
<div class="form-group">
    <div class="btn-group">
        <?php echo $form->radioButton($model, 'for_rent', array('class' => "prettyradio", 'uncheckValue' => null, 'name' => 'sType', 'id' => 'Casa_for_rent', 'value' => 'for_rent')); ?>

        <?php echo $form->label($model, 'for_rent'); ?>

        <?php echo $form->radioButton($model, 'for_arrenda', array('class' => "prettyradio", 'uncheckValue' => null, 'name' => 'sType', 'value' => 'for_arrenda', 'id' => 'Casa_for_arrenda')); ?>
        <?php echo $form->label($model, 'for_arrenda'); ?>

        <?php echo $form->radioButton($model, 'for_sale', array('class' => "prettyradio", 'uncheckValue' => null, 'checked' => 'checked', 'name' => 'sType', 'value' => 'for_sale', 'id' => 'Casa_for_sale')); ?>
        <?php echo $form->label($model, 'for_sale'); ?>
    </div>
</div>
<div class="form-group">

    <?php
    if (isset($_GET['Casa'])) {
        $model = new Casa;
        $model->attributes = $_GET['Casa'];
    }
    if (isset($_GET['sType'])) {
        $stype = "Casa[" . $_GET['sType'] . "]";
        $stypeLean = $_GET['sType'];
    } else {
        $stype = "Casa[for_sale]";
        $stypeLean = 'for_sale';
    }



    $criteria = new CDbCriteria;
    $criteria->select = array('tipoalojamento');
    $criteria->order = "tipoalojamento ASC";
    $criteria->condition = 'activo =1';
    $criteria->addCondition($stypeLean . "=1");
    echo $form->label($model, 'tipoalojamento', array("class" => "sr-only"));
    echo $form->dropDownList($model, 'tipoalojamento', CHtml::listData(Casa::model()->findAll($criteria), 'tipoalojamento', 'tipoalojamento'), array(
        'prompt' => 'Todos Tipos',
        "class" => "Casa_tipoalojamento form-control",
        'id' => 'Casa_tipoalojamento',
        'ajax' => array(
            'type' => 'POST',
            'url' => CController::createUrl('Casa/dynamicTipo'),
            'update' => '.Casa_tipo',
            'data' => array('Casa[tipoalojamento]' => 'js:this.value', $stype => 1),
            'complete' => 'js:function(){'
            . '$("#Casa_tipo").trigger("change");'
            . '}'
    )));



    $criteria = new CDbCriteria;
    $criteria->select = array('tipo');
    $criteria->order = "tipo ASC";
    $criteria->condition = 'activo =1';

    $criteria->addCondition($stypeLean . "=1");

    echo $form->label($model, 'tipo', array("class" => "sr-only"));
    echo $form->dropDownList($model, 'tipo', CHtml::listData(Casa::model()->findAll($criteria), 'tipo', 'tipo'), array(
        'prompt' => 'Todas tipologias',
        'id' => 'Casa_tipo',
        'class' => 'Casa_tipo form-control',
        'ajax' => array(
            'type' => 'POST',
            'url' => CController::createUrl('Casa/dynamicLocalidade'),
            'update' => '.Casa_localidade',
            'data' => array('Casa[tipo]' => 'js:this.value', $stype => 1),
    )));




    $criteria = new CDbCriteria;
    $criteria->select = array('localidade');
    $criteria->order = "localidade ASC";
    $criteria->condition = 'activo =1';
    $criteria->addCondition($stypeLean . "=1");
    echo $form->label($model, 'localidade', array("class" => "sr-only"));
    echo $form->dropDownList($model, 'localidade', CHtml::listData(Casa::model()->findAll($criteria), 'localidade', 'localidade'), array(
        'id' => 'Casa_localidade',
        'class' => 'Casa_localidade form-control',
        'prompt' => 'Todas localidades',
        'ajax' => array(
            'type' => 'POST',
            'url' => CController::createUrl('casa/dynamicPessoas'),
            'update' => '#Casa_pessoas', //selector to update
            'data' => array('Casa[pessoas]' => 'js:this.value', $stype => 1),
        )
    ));
    ?>
    <?php
    $criteria = new CDbCriteria;
    $criteria->select = array('pessoas');
    $criteria->order = "pessoas DESC";
    $criteria->condition = 'activo =1';
    $criteria->addCondition('for_rent=1');
    echo $form->label($model, 'pessoas', array("class" => "sr-only"));
    echo $form->dropDownList($model, 'pessoas', CHtml::listData(Casa::model()->findAll($criteria), 'pessoas', 'pessoas'), array(
        'prompt' => 'Todas Pessoas',
        "class" => "form-control",
//            'ajax' => array(
//                'type' => 'POST',
//                'url' => CController::createUrl('casa/dynamicTipo'),
//                'update' => '#Casa_tipo', //selector to update
//            )
    ));
    ?>
</div>

<div class="rentAttr">
    <div class="form-group">
        <?php echo $form->label($model, 'inicio'); ?>
        <?php echo $form->textField($model, 'inicio', array('placeholder' => 'De', 'size' => 8, "class" => "form-control datepick", 'value' => Yii::app()->session['inicio'])); ?>
        <?php echo $form->label($model, 'fim'); ?>
        <?php echo $form->textField($model, 'fim', array('placeholder' => 'De', 'size' => 8, "class" => "form-control datepick datepickEnd", 'value' => Yii::app()->session['fim'])); ?>
        <?php echo $form->label($model, 'quartos'); ?>
        <?php echo $form->textField($model, 'quartos', array('size' => 5, 'maxlength' => 1, "class" => "form-control")); ?>
        <?php echo $form->error($model, 'quartos'); ?>
        <?php echo $form->label($model, 'camascasal'); ?>
        <?php echo $form->textField($model, 'camascasal', array('size' => 5, 'maxlength' => 1, "class" => "form-control")); ?>
        <?php echo $form->error($model, 'camascasal'); ?>
        <?php echo $form->label($model, 'camassingle'); ?>
        <?php echo $form->textField($model, 'camassingle', array('size' => 5, 'maxlength' => 1, "class" => "form-control")); ?>
        <?php echo $form->error($model, 'camassingle'); ?>

    </div>
    <div class="form-group">

        <?php echo $form->checkBox($model, 'certif', array('value' => '1', 'uncheckValue' => null, 'class' => 'prettycheckbox')); ?>
        <?php echo $form->label($model, 'Certificadas Apenas', array("for" => "Casa_certif")); ?>

        <?php echo $form->checkBox($model, 'piscina', array('value' => '1', 'uncheckValue' => null, 'class' => 'prettycheckbox')); ?>
        <?php echo $form->label($model, 'piscina'); ?>

        <?php echo $form->checkBox($model, 'ar_condicionado', array('value' => '1', 'uncheckValue' => null, 'class' => 'prettycheckbox')); ?>
        <?php echo $form->label($model, 'ar_condicionado'); ?>

        <?php echo $form->checkBox($model, 'satcabo', array('value' => '1', 'uncheckValue' => null, 'class' => 'prettycheckbox')); ?>
        <?php echo $form->label($model, 'satcabo'); ?>

        <?php echo $form->checkBox($model, 'internet', array('value' => '1', 'uncheckValue' => null, 'class' => 'prettycheckbox')); ?>
        <?php echo $form->label($model, 'internet'); ?>


    </div>
</div>
<div class="form-group pull-right">
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search icon-warning"></span></button>
</div>

<div class="clearfix"></div>


<?php $this->endWidget(); ?>

<script>
    $(function() {

        $('.rentAttr,#Casa_pessoas').hide();
        $('input:radio[name="sType"]').change(function() {
            var param = $(this).val();
            var data = {
                'Casa': {}
            };
            data.Casa[param] = 1;
            $('#Casa_tipoalojamento').load('<?php echo CController::createUrl('Casa/dynamicTipoAloja') ?>',
                    data,
                    function() {
                        $('#Casa_tipo').load('<?php echo CController::createUrl('Casa/dynamicTipo') ?>',
                                data,
                                function() {
                                    $('#Casa_localidade').load('<?php echo CController::createUrl('Casa/dynamicLocalidade') ?>', data);
                                });
                    });
        });
        $('input:radio[value="<?php
if (isset($_GET['sType'])) {
    echo $_GET['sType'];
}
?>"]').attr('checked', 'checked');
        if ($('input:radio[id="Casa_for_rent"]').attr('checked') === 'checked') {
            $('.rentAttr,#Casa_pessoas').show();
        }
        $('input:radio[name="sType"]').live("change", function() {
            if ($(this).val() == 'for_rent') {

                $('.rentAttr,#Casa_pessoas').show();
            }
            else {
                $('#Casa_pessoas').hide();
                $('.rentAttr').hide();
                $('#Casa_inicio,#Casa_fim').val('');
            }


        });
    });
    $('#search-mapa').change(function() {
        if ($('#Casa_inicio').val() != '' && $('#Casa_fim').val() != '') {
            var start = $('#Casa_inicio').datepicker("getDate");
            var end = $('#Casa_fim').datepicker("getDate");
            var days = (end - start) / (1000 * 60 * 60 * 24);
            if (days > 15) {
                $('#fdkCreate').modal();
                $(".modal-content").html(days + "<?php echo Yii::t("content", "dias de diferença. Por favor escolha intervalo menor!") ?>");
            }
            $('#search-mapa').attr('action', '<?php echo Yii::app()->createUrl('//casa/searchByDate') ?>');
        }
    });
    $('#search-mapa').submit(function(e) {
        if ($(this).attr('action') == "<?php echo Yii::app()->createUrl('//casa/searchByDate') ?>") {
            $('#fdkCreate').modal();
            $(".modal-content").html($(".waitforprices").css("visibility", "visible"));
        }
    });

</script>