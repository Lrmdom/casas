<?php
$this->widget('ext.mPrint.mPrint', array(
    'id' => 'mprint1', // !!!you have to set up this one if you want multiple prints per page
    'title' => 'Some title for page', //the title of the document. Defaults to the HTML title
    'tooltip' => 'Print para montra', //tooltip message of the print icon. Defaults to 'print'
    'text' => 'Print', //text which will appear beside the print icon. Defaults to NULL
    'element' =>
    '#printdiv',
    //the element to be printed.
    'exceptions' => array("textarea"
    ),
    'publishCss' => true,
        //'debug' => true
));
?>

<link rel="stylesheet" type="text/css" href="/protected/extensions/mPrint/assets/mprint.css" />
<div id="printdiv" class="divcenter">

    <div  class="wrapper divcenter">

        <div class="row-fluid divcenter">
            <div class="row-fluid ui-widget-content">
                <div class="logo"><img src="/<?php echo Yii::app()->params['watermarkImg']; ?>"/></div>
                <h5><?php echo $model->concelho; ?>  -  <?php echo $model->localidade; ?></h5>
            </div>
            <div class="row-fluid ui-widget-content">
                <h1> <?php echo $model->tipoalojamento; ?> - <?php echo $model->tipo; ?> </h1>
            </div>
            <div class="column ui-widget-content w33">
                <?php if ($model->for_sale == 1): ?>
                    <h3>Venda :<?php echo $model->valor_venda; ?> €</h3>
                <?php endif ?>
            </div>
            <div class="column ui-widget-content w33">
                <?php if ($model->for_arrenda == 1): ?>
                    <h3>Arrendamento :<?php echo $model->valor_arrendamento; ?> €</h3>
                <?php endif ?>
            </div>
            <div class="column ui-widget-content w33">
                <?php if ($model->for_rent == 1): ?>
                    <h3>Disponível Férias</h3>
                <?php endif ?>
            </div>
        </div>
        <div class="row-fluid divcenter">
            <div class="left"><img class="img-polaroid" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_1); ?>" title='' /></li></div>
            <div class="left"><img class="img-polaroid" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_2); ?>"  title=''/></div>
            <div class="left"><img class="img-polaroid" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_3); ?>"  title=''/></div>
        </div>
        <div class="row-fluid divcenter">
            <div class="left"><img class="img-polaroid" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_4); ?>" title='' /></li></div>
            <div class="left"><img class="img-polaroid" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_5); ?>"  title=''/></div>
            <div class="left"><img class="img-polaroid" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_6); ?>"  title=''/></div>
        </div>
        <br/>
        <div class="row-fluid">

            <textarea class="pt"><?php echo $model->titulo; ?></textarea>
            <div class="print_only"></div><br/>
        </div>
        <div class="row-fluid">
            <textarea class="en"><?php echo Casa::model()->translate($model->titulo, en); ?></textarea>
            <div class="print_only"></div><br/>
        </div>
        <div class="row-fluid">

            <textarea class="fr"><?php echo Casa::model()->translate($model->titulo, fr); ?></textarea>
            <div class="print_only"></div><br/>
        </div>
    </div>
    <div class="row-fluid divcenter">
        <img src="<?php echo (Yii::app()->baseUrl . '/qrcodes/casa' . $model->cod_casa); ?>.png"/>
    </div>
</div>
<script>
    $(function() {
        $(".print_only").html(function() {
            return $(this).prev('textarea').val();
        });
        $("textarea").on('change', function() {

            $(this).next("div").html($(this).val());
        });
    });


</script>
