
<?php
$this->beginContent('//layouts/main');

if (!isset($_SESSION['inicio']))
    $_SESSION['inicio'] = ' ';
if (!isset($_SESSION['fim']))
    $_SESSION['fim'] = ' ';
?>

<div id="white">
    <div class="search">
        <div id="tabs" class="searchTabs">
            <ul class="ulStabs well">
                <li><a href="#tabs-2">Venda</a></li>
                <li><a href="#tabs-1">Férias</a></li>
                <li><a href="#tabs-3">Arrenda</a></li>
                <li><a href="#tabs-4" class="linkTabsMap" title="Map">Map<i class=" icon-globe"></i></a></li>
            </ul>
            <div id="tabs-1">
                <div class="head">  <h4 class="well">Encontre casas de férias</h4></div>
                <div class="wide form">
                    <?php
                    $model = new Casa();
                    if (isset($_POST['Casa']))
                        $model->attributes = $_POST['Casa'];
                    if (isset($_GET['Casa']))
                        $model->attributes = $_GET['Casa'];
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'search-quick',
                        // 'enableClientValidation' => true,
                        // 'clientOptions' => array('validateOnSubmit' => true),
                        'action' => Yii::app()->createUrl('//casa/search'),
                        'method' => 'POST',
                    ));
                    ?>
                    <div class="row">
                        <?php echo $form->label($model, 'Certificadas Apenas'); ?>
                        <a href="#" class="AcertifImg"><img class="certifImg" src="<?php echo Yii::app()->baseUrl . '/css/images/certified.png' ?>"/></a>
                        <?php echo $form->checkBox($model, 'certif', array('value' => '1', 'uncheckValue' => null,)); ?>
                        <?php echo $form->error($model, 'certif'); ?>
                    </div>
                    <div class="row">
                        <div >
                            <?php echo $form->label($model, 'inicio'); ?>
                            <?php echo $form->textField($model, 'inicio', array('class' => 'datepick', 'placeholder' => 'De', 'size' => 8)); ?>
                            <i class=" icon-calendar"></i>
                        </div>
                        <div >
                            <?php echo $form->label($model, 'fim'); ?>
                            <?php echo $form->textField($model, 'fim', array('class' => 'datepick', 'placeholder' => 'De', 'size' => 8)); ?>
                            <i class=" icon-calendar"></i>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        echo $form->label($model, 'pessoas');
                        echo $form->dropDownList($model, 'pessoas', CHtml::listData(Casa::model()->findAll('activo=1 AND for_rent=1'), 'pessoas', 'pessoas'), array(
                            'prompt' => 'Todas',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('casa/dynamicTipo'),
                                'update' => '#Casa_tipo', //selector to update
                        )));
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        echo $form->label($model, 'tipo');
                        echo $form->dropDownList($model, 'tipo', CHtml::listData(Casa::model()->findAll('activo=1 AND for_rent=1'), 'tipo', 'tipo'), array(
                            'prompt' => 'Todos',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('Casa/dynamicLocalidade'),
                                'update' => '#Casa_localidade',
                                'data' => array('tipo' => 'js:this.value'),
                        )));
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        echo $form->hiddenField($model, 'for_rent', array('value' => '1'));
                        echo $form->label($model, 'localidade');
                        echo $form->dropDownList($model, 'localidade', CHtml::listData(Casa::model()->findAll('activo=1 AND for_rent=1'), 'localidade', 'localidade'), array(
                            'prompt' => 'Todas'));
                        ?>
                    </div>
                    <div class="row">
                        <?php echo $form->label($model, 'piscina'); ?>
                        <?php echo $form->checkBox($model, 'piscina', array('value' => '1', 'uncheckValue' => null)); ?>
                        <?php echo $form->error($model, 'piscina'); ?>
                    </div>
                    <div class="row">
                        <?php echo $form->label($model, 'ar_condicionado'); ?>
                        <?php echo $form->checkBox($model, 'ar_condicionado', array('value' => '1', 'uncheckValue' => null)); ?>
                    </div>
                    <div class="row">
                        <?php echo $form->label($model, 'quartos'); ?>
                        <?php echo $form->textField($model, 'quartos', array('size' => 5, 'maxlength' => 1)); ?>
                        <?php echo $form->error($model, 'quartos'); ?>
                    </div>
                    <div class="row">
                        <?php echo $form->label($model, 'camascasal'); ?>
                        <?php echo $form->textField($model, 'camascasal', array('size' => 5, 'maxlength' => 1)); ?>
                        <?php echo $form->error($model, 'camascasal'); ?>
                    </div>
                    <div class="row">
                        <?php echo $form->label($model, 'camassingle'); ?>
                        <?php echo $form->textField($model, 'camassingle', array('size' => 5, 'maxlength' => 1)); ?>
                        <?php echo $form->error($model, 'camassingle'); ?>
                    </div>
                    <div class="row">
                        <?php echo $form->label($model, 'satcabo'); ?>
                        <?php echo $form->checkBox($model, 'satcabo', array('value' => '1', 'uncheckValue' => null,)); ?>
                        <?php echo $form->error($model, 'satcabo'); ?>
                    </div>
                    <div class="row">
                        <?php echo $form->label($model, 'internet'); ?>
                        <?php echo $form->checkBox($model, 'internet', array('value' => '1', 'uncheckValue' => null,)); ?>
                        <?php echo $form->error($model, 'internet'); ?>
                    </div>
                    <div class="row buttons">
                        <button class="btn btn-primary">Procurar</button>
                    </div>
                    <?php $this->endWidget(); ?>	</div>
            </div>
            <div id="tabs-2">
                <div class="head"> <h4 class="well">Casas para venda</h4></div>
                <div class="wide form">
                    <?php
                    $form2 = $this->beginWidget('CActiveForm', array(
                        'id' => 'search-quick-venda',
                        // 'enableClientValidation' => true,
                        // 'clientOptions' => array('validateOnSubmit' => true),
                        'action' => Yii::app()->createUrl('//casa/search'),
                        'method' => 'GET',
                    ));
                    ?>
                    <div class="row">
                        <?php
                        echo $form2->label($model, 'tipoalojamento');
                        echo $form2->dropDownList($model, 'tipoalojamento', CHtml::listData(Casa::model()->findAll(), 'tipoalojamento', 'tipoalojamento'), array(
                            'prompt' => 'Todos',
                            'id' => 'Casa_tipoalojamento_venda',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('Casa/dynamicTipoVenda'),
                                'update' => '#Casa_tipo_venda',
                                'data' => array('tipo' => 'js:this.value'),
                        )));
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        echo $form2->label($model, 'tipo');
                        echo $form2->dropDownList($model, 'tipo', CHtml::listData(Casa::model()->findAll('activo=1 AND for_sale=1'), 'tipo', 'tipo'), array(
                            'prompt' => 'Todos',
                            'id' => 'Casa_tipo_venda',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('Casa/dynamicLocalidadeVenda'),
                                'update' => '#Casa_localidade_venda',
                                'data' => array('tipo' => 'js:this.value'),
                        )));
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        echo $form2->hiddenField($model, 'for_sale', array('value' => '1'));
                        echo $form2->label($model, 'localidade');
                        echo $form2->dropDownList($model, 'localidade', CHtml::listData(Casa::model()->findAll('t.activo=1 AND for_sale=1'), 'localidade', 'localidade'), array(
                            'id' => 'Casa_localidade_venda',
                            'prompt' => 'Todas',
                        ));
                        ?>
                    </div>
                    <div class="row buttons">
                        <button class="btn btn-primary">Procurar</button>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
            <div id="tabs-3">
                <div class="head"> <h4 class="well">Casas para arrendamento</h4></div>
                <div class="wide form">
                    <?php
                    $form3 = $this->beginWidget('CActiveForm', array(
                        'id' => 'search-quick-arrenda',
                        // 'enableClientValidation' => true,
                        // 'clientOptions' => array('validateOnSubmit' => true),
                        'action' => Yii::app()->createUrl('//casa/search'),
                        'method' => 'GET',
                    ));
                    ?>
                    <div class="row">
                        <?php
                        echo $form3->label($model, 'tipoalojamento');
                        echo $form3->dropDownList($model, 'tipoalojamento', CHtml::listData(Casa::model()->findAll(), 'tipoalojamento', 'tipoalojamento'), array(
                            'prompt' => 'Todos',
                            'id' => 'Casa_tipoalojamento_arrenda',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('Casa/dynamicTipoArrenda'),
                                'update' => '#Casa_tipo_arrenda',
                                'data' => array('tipo' => 'js:this.value'),
                        )));
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        echo $form3->label($model, 'tipo');
                        echo $form3->dropDownList($model, 'tipo', CHtml::listData(Casa::model()->findAll('activo=1 AND for_arrenda=1'), 'tipo', 'tipo'), array(
                            'prompt' => 'Todos',
                            'id' => 'Casa_tipo_arrenda',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('Casa/dynamicLocalidadeArrenda'),
                                'update' => '#Casa_localidade_arrenda',
                                'data' => array('tipo' => 'js:this.value'),
                        )));
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        echo $form3->hiddenField($model, 'for_arrenda', array('value' => '1'));
                        echo $form3->label($model, 'localidade');
                        echo $form3->dropDownList($model, 'localidade', CHtml::listData(Casa::model()->findAll('t.activo=1 AND for_arrenda=1'), 'localidade', 'localidade'), array(
                            'id' => 'Casa_localidade_arrenda',
                            'prompt' => 'Todas',
                        ));
                        ?>
                    </div>
                    <div class="row buttons">
                        <button class="btn btn-primary">Procurar</button>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
            <div id="tabs-4">
                <div class="wide form">
                    <h4 class="well">Map Search</h4>
                    <?php
                    $form4 = $this->beginWidget('CActiveForm', array(
                        'id' => 'search-mapa',
                        // 'enableClientValidation' => true,
                        // 'clientOptions' => array('validateOnSubmit' => true),
                        'action' => Yii::app()->createUrl('//site/mapa'),
                        'method' => 'GET'
                    ));
                    ?>
                    <div class="row">
                        <?php
                        echo $form4->label($model, 'pessoas');
                        echo $form4->dropDownList($model, 'pessoas', CHtml::listData(Casa::model()->findAll('activo=1'), 'pessoas', 'pessoas'), array(
                            'prompt' => 'Todas',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('casa/dynamicTipo'),
                                'update' => '#Casa_tipo', //selector to update
                        )));
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        echo $form4->label($model, 'tipoalojamento');
                        echo $form4->dropDownList($model, 'tipoalojamento', CHtml::listData(Casa::model()->findAll(), 'tipoalojamento', 'tipoalojamento'), array(
                            'prompt' => 'Todos',
                            'id' => 'Casa_tipoalojamento_arrenda',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('Casa/dynamicTipoArrenda'),
                                'update' => '.Casa_tipo',
                                'data' => array('tipo' => 'js:this.value'),
                        )));
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        echo $form4->label($model, 'tipo');
                        echo $form4->dropDownList($model, 'tipo', CHtml::listData(Casa::model()->findAll('activo=1'), 'tipo', 'tipo'), array(
                            'prompt' => 'Todos',
                            'id' => 'Casa_tipo_arrenda',
                            'class' => 'Casa_tipo',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('Casa/dynamicLocalidadeArrenda'),
                                'update' => '.Casa_localidade',
                                'data' => array('tipo' => 'js:this.value'),
                        )));
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        echo $form4->label($model, 'localidade');
                        echo $form4->dropDownList($model, 'localidade', CHtml::listData(Casa::model()->findAll('t.activo=1 AND for_sale=1'), 'localidade', 'localidade'), array(
                            'id' => 'Casa_localidade_arrenda',
                            'class' => 'Casa_localidade',
                            'prompt' => 'Todas',
                        ));
                        ?>
                    </div>
                    <div class="row">
                        <?php echo $form4->label($model, 'for_rent'); ?>
                        <?php echo $form4->checkBox($model, 'for_rent', array('checked' => 'checked')); ?>
                    </div>
                    <div class="row">
                        <?php echo $form4->label($model, 'for_arrenda'); ?>
                        <?php echo $form4->checkBox($model, 'for_arrenda', array('checked' => 'checked')); ?>
                    </div>
                    <div class="row">
                        <?php echo $form4->label($model, 'for_sale'); ?>
                        <?php echo $form4->checkBox($model, 'for_sale', array('checked' => 'checked')); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
        <div class="fpageDivBtt"></div>
    </div>
    <script>
        $(function() {

            $('.datepick').change(function() {

                if ($('#inicio').val() != '' && $('#fim').val() != '') {

                    $('#search-quick').attr('action', '<?php echo Yii::app()->createUrl('//casa/searchByDate') ?>');
                }
            });


            $('#tabs').tabs();

            $('.but').button();

            $(".datepick").datepicker({dateFormat: "yy/mm/dd", beforeShow: function() {
                    return{minDate:
                                $('#Casa_inicio').datepicker('getDate')}
                }
            });
            $(".datepick").datepicker($.datepicker.regional[ "<?php echo Yii::app()->language ?>" ]);

            $(".linkTabsMap").click(function(e) {
                e.preventDefault();
                window.location = "/index.php/site/mapa";
            });
            $(".AcertifImg").click(function(e)
            {

                $(this).addClass('popactive');
                e.preventDefault();
                $(".AcertifImg.popactive").popover('hide');


            });
            $(".AcertifImg").popover({title: 'Certificada', content: "O que é uma casa certificada?", placement: 'top', trigger: 'hover'});

            $(".autCpltSearchCod").autocomplete
                    ({
                        source: function(request, response)
                        {
                            $.ajax(
                                    {
                                        url: "<?php echo Yii::app()->createUrl('casa/AutocompleteSearchCod') ?>",
                                        data: {
                                            term: request.term
                                        },
                                        type: "POST", // POST transmits in querystring format (key=value&key1=value1) in utf-8
                                        dataType: "json", //return data in json format
                                        success: function(data)
                                        {
                                            response($.map(data, function(item)
                                            {
                                                return {
                                                    label: item.cod_casa + ' > ' + item.tipo + ' > ' + item.tipoalojamento,
                                                    value: item.cod_casa

                                                }
                                            }));
                                        }
                                    });
                        },
                        select: function(event, ui)
                        {   //"use strict";
                            $(this).val(ui.item.localidade);
                            $(".autCpltSearch").val(ui.item.localidade);  //put the stateProvince abbrev'n in the hidden input box

                        },
                        minLength: 1
                    });




        });
    </script>
    <div id="contentColumn1">
        <?php echo $content; ?>
    </div><!-- content -->
    <?php $this->endContent(); ?>
</div>
