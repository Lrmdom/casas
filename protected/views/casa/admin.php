<?php echo $this->renderPartial("//site/flashMessage");
?>

<h4><?php echo Yii::t("content", "Gerir Casas") ?></h4>

<div class="table-responsive ">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'casa-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'ajaxUrl' => $this->createUrl('casa/admin'),
        //'pager' => array('htmlOptions' => array('class' => '')),
        "itemsCssClass" => 'table table-hover table-responsive table-condensed',
        'columns' => array(
            array(
                'class' => 'ButtonColumnExt',
                'template' => '{view}{update}{delete}{add}{fb}{print}',
                'buttons' => array(
                    'delete' => array(
                        'url' => 'Yii::app()->createUrl("casa/delete", array("id"=>$data->cod_casa))',
                    //'visible' => '$data->cod_casa != 23',
                    ),
                    'view' => array(
                        'url' => 'Yii::app()->createUrl("casa/view", array("id"=>$data->cod_casa))',
                    ),
                    'update' => array(
                        'url' => 'Yii::app()->createUrl("casa/update", array("id"=>$data->cod_casa))',
                    ),
                    'add' => array(
                        'url' => 'Yii::app()->createUrl("casa/create")',
                    ),
                    'fb' => array(
                        'label' => '<img src="/css/images/fb_1.png" style="height:16px;width:16px;"/>',
                        'url' => 'Yii::app()->createUrl("casa/sendToFacebook",array("id"=>"$data->cod_casa"))',
                        'options' => array("title" => "Send to Facebook"),
                        'visible' => 'Yii::app()->user->name == Yii::app()->params["adminEmail"]',
                    ),
                    'print' => array(
                        'label' => '<span class="glyphicon glyphicon-print printToM"></span>',
                        'url' => 'Yii::app()->createUrl("casa/print",array("id"=>"$data->cod_casa"))',
                        'options' => array("title" => "Print"),
                        'visible' => 'Yii::app()->user->name == Yii::app()->params["adminEmail"]',
                    ),
                ),
            ),
            array(
                'name' => 'img_1',
                'header' => '',
                'type' => 'image',
                'value' => '"/uploads/$data->img_1"',
                'htmlOptions' => array('class' => 'imgGridView responsive-image'),
                'filter' => '',
            // 'class'=>'imgGridview',
            ),
            'cod_casa',
            array(
                'name' => 'propid',
                'value' => '$data->propid',
                'htmlOptions' => array('class' => 'propColumn viewMore', 'onClick' => 'showProp($(this).text());'),
                'filter' => CHtml::listData(Proprietario::model()->findAll(array('order' => 'propid')), 'propid', 'proprietario')
            ),
            // 'adicionado',
            // 'data_activo',
            // 'destino',
            //array('name' => 'img_3', 'header' => 'negocio', 'type' => 'raw', 'value' => 'Casa::model()->getStatus($data->for_rent,$data->for_sale,$data->for_arrenda);'),
            //  'proprietario',
            // 'designacao',
            //'activo',
            //'certif',
            array(
                'class' => 'JToggleColumn',
                "filter" => array(0 => "No", 1 => "Yes"),
                'name' => 'for_sale', // boolean model attribute (tinyint(1) with values 0 or 1)
                'action' => "casa/switch", // other action, default is 'toggle' action
                'checkedButtonLabel' => '/images/checked.png', // Image,text-label or Html
                'uncheckedButtonLabel' => '/images/unchecked.png', // Image,text-label or Html
                'checkedButtonTitle' => 'Yes.Click to No', // tooltip
                'uncheckedButtonTitle' => 'No. Click to Yes', // tooltip
                'labeltype' => 'image', // New Option - may be 'image','html' or 'text'
                'htmlOptions' => array('style' => 'text-align:center;min-width:60px;', "onClick" => "forSalePrice()")
            ),
            array(
                'class' => 'JToggleColumn',
                "filter" => array(0 => "No", 1 => "Yes"),
                'name' => 'for_arrenda', // boolean model attribute (tinyint(1) with values 0 or 1)
                'action' => "casa/switch", // other action, default is 'toggle' action
                'checkedButtonLabel' => '/images/checked.png', // Image,text-label or Html
                'uncheckedButtonLabel' => '/images/unchecked.png', // Image,text-label or Html
                'checkedButtonTitle' => 'Yes.Click to No', // tooltip
                'uncheckedButtonTitle' => 'No. Click to Yes', // tooltip
                'labeltype' => 'image', // New Option - may be 'image','html' or 'text'
                'htmlOptions' => array('style' => 'text-align:center;min-width:60px;', "onClick" => "forSalePrice()")
            ),
            array(
                'class' => 'JToggleColumn',
                "filter" => array(0 => "No", 1 => "Yes"),
                'name' => 'for_rent', // boolean model attribute (tinyint(1) with values 0 or 1)
                'action' => "casa/switch", // other action, default is 'toggle' action
                'checkedButtonLabel' => '/images/checked.png', // Image,text-label or Html
                'uncheckedButtonLabel' => '/images/unchecked.png', // Image,text-label or Html
                'checkedButtonTitle' => 'Yes.Click to No', // tooltip
                'uncheckedButtonTitle' => 'No. Click to Yes', // tooltip
                'labeltype' => 'image', // New Option - may be 'image','html' or 'text'
                'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
            ),
            array(
                'class' => 'JToggleColumn',
                "filter" => array(0 => "No", 1 => "Yes"),
                'name' => 'certif', // boolean model attribute (tinyint(1) with values 0 or 1)
                'action' => "casa/switch", // other action, default is 'toggle' action
                'checkedButtonLabel' => '/images/checked.png', // Image,text-label or Html
                'uncheckedButtonLabel' => '/images/unchecked.png', // Image,text-label or Html
                'checkedButtonTitle' => 'Yes.Click to No', // tooltip
                'uncheckedButtonTitle' => 'No. Click to Yes', // tooltip
                'labeltype' => 'image', // New Option - may be 'image','html' or 'text'
                'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
            ),
            array(
                'class' => 'JToggleColumn',
                "filter" => array(0 => "No", 1 => "Yes"),
                'name' => 'activo', // boolean model attribute (tinyint(1) with values 0 or 1)
                'action' => "casa/delete", // other action, default is 'toggle' action
                'checkedButtonLabel' => '/images/checked.png', // Image,text-label or Html
                'uncheckedButtonLabel' => '/images/unchecked.png', // Image,text-label or Html
                'checkedButtonTitle' => 'Yes.Click to No', // tooltip
                'uncheckedButtonTitle' => 'No. Click to Yes', // tooltip
                'labeltype' => 'image', // New Option - may be 'image','html' or 'text'
                'htmlOptions' => array('style' => 'text-align:center;min-width:60px;')
            ),
        ),
    ));
    ?>
</div>
