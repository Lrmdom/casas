
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'search-mapa',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'action' => Yii::app()->createUrl('//casa/search'),
    'method' => 'GET',
        ));
?>
<div class="form-group">

    <?php echo $form->checkBox($model, 'for_rent', array()); ?>
    <?php echo $form->label($model, 'for_rent'); ?>

    <?php echo $form->checkBox($model, 'for_arrenda', array()); ?>
    <?php echo $form->label($model, 'for_arrenda'); ?>

    <?php echo $form->checkBox($model, 'for_sale', array('checked' => 'checked')); ?>
    <?php echo $form->label($model, 'for_sale'); ?>
</div>
<div class="form-group">
    <?php
    echo $form->label($model, 'pessoas', array("class" => "sr-only"));
    echo $form->dropDownList($model, 'pessoas', CHtml::listData(Casa::model()->findAll('activo=1'), 'pessoas', 'pessoas'), array(
        'prompt' => 'Todas Pessoas',
        "class" => "form-control",
        'ajax' => array(
            'type' => 'POST',
            'url' => CController::createUrl('casa/dynamicTipo'),
            'update' => '#Casa_tipo', //selector to update
    )));
    ?>
    <?php
    echo $form->label($model, 'tipoalojamento', array("class" => "sr-only"));
    echo $form->dropDownList($model, 'tipoalojamento', CHtml::listData(Casa::model()->findAll(), 'tipoalojamento', 'tipoalojamento'), array(
        'prompt' => 'Todos Tipos',
        "class" => "form-control",
        'id' => 'Casa_tipoalojamento',
        'ajax' => array(
            'type' => 'POST',
            'url' => CController::createUrl('Casa/dynamicTipoArrenda'),
            'update' => '.Casa_tipo',
            'data' => array('tipo' => 'js:this.value'),
    )));
    ?>
    <?php
    echo $form->label($model, 'tipo', array("class" => "sr-only"));
    echo $form->dropDownList($model, 'tipo', CHtml::listData(Casa::model()->findAll('activo=1'), 'tipo', 'tipo'), array(
        'prompt' => 'Todas tipologias',
        'id' => 'Casa_tipo',
        'class' => 'Casa_tipo form-control',
        'ajax' => array(
            'type' => 'POST',
            'url' => CController::createUrl('Casa/dynamicLocalidadeArrenda'),
            'update' => '.Casa_localidade',
            'data' => array('tipo' => 'js:this.value'),
    )));
    ?>
    <?php
    echo $form->label($model, 'localidade', array("class" => "sr-only"));
    echo $form->dropDownList($model, 'localidade', CHtml::listData(Casa::model()->findAll('t.activo=1 AND for_sale=1'), 'localidade', 'localidade'), array(
        'id' => 'Casa_localidade',
        'class' => 'Casa_localidade form-control',
        'prompt' => 'Todas localidades',
    ));
    ?>

</div>

<div class="rentAttr">
    <div class="form-group">
        <?php echo $form->label($model, 'inicio'); ?>
        <?php echo $form->textField($model, 'inicio', array('placeholder' => 'De', 'size' => 8, "class" => "form-control datepick datepickStart")); ?>
        <?php echo $form->label($model, 'fim'); ?>
        <?php echo $form->textField($model, 'fim', array('placeholder' => 'De', 'size' => 8, "class" => "form-control datepick datepickEnd")); ?>
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

        <?php echo $form->checkBox($model, 'certif', array('value' => '1', 'uncheckValue' => null)); ?>
        <?php echo $form->label($model, 'Certificadas Apenas'); ?>

        <?php echo $form->checkBox($model, 'piscina', array('value' => '1', 'uncheckValue' => null)); ?>
        <?php echo $form->label($model, 'piscina'); ?>

        <?php echo $form->checkBox($model, 'ar_condicionado', array('value' => '1', 'uncheckValue' => null)); ?>
        <?php echo $form->label($model, 'ar_condicionado'); ?>

        <?php echo $form->checkBox($model, 'satcabo', array('value' => '1', 'uncheckValue' => null)); ?>
        <?php echo $form->label($model, 'satcabo'); ?>

        <?php echo $form->checkBox($model, 'internet', array('value' => '1', 'uncheckValue' => null)); ?>
        <?php echo $form->label($model, 'internet'); ?>

    </div>
</div>
<div class="pull-right">
    <button type="submit" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-search icon-warning"></span></button>
</div>
<div class="clearfix"></div>
<?php $this->endWidget(); ?>

