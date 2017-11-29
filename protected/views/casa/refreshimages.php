<?php echo CHtml::form('imgs', 'post', array('enctype' => 'multipart/form-data')); ?>
<div id="sff1" class="container-fluid">
    <p class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span><?php echo Yii::t("content", "Click na imagem que quer alterar") ?></p>

    <div class="row">
        <div class="col-xs-3 col-md-3 col-lg-3">
            <img id="thumb1" class="img-responsive img-thumbnail" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_1); ?>"/>

        </div>
        <div class="col-xs-3 col-md-3 col-lg-3">
            <img id="thumb2" class="img-responsive img-thumbnail" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_2); ?>"/><br>

        </div>
        <div class="col-xs-3 col-md-3 col-lg-3">
            <img id="thumb3" class="img-responsive img-thumbnail" src='<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_3); ?>'><br>

        </div>
        <div class="col-xs-3 col-md-3 col-lg-3">
            <img id="thumb4" class="img-responsive img-thumbnail" src='<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_4); ?>'><br>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-md-3 col-lg-3">
            <img id="thumb5" class="img-responsive img-thumbnail" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_5); ?>"/>

        </div>
        <div class="col-xs-3 col-md-3 col-lg-3">
            <img id="thumb6" class="img-responsive img-thumbnail" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_6); ?>"/><br>

        </div>
        <div class="col-xs-3 col-md-3 col-lg-3">
            <img id="thumb7" class="img-responsive img-thumbnail" src='<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_7); ?>'><br>

        </div>
        <div class="col-xs-3 col-md-3 col-lg-3">
            <img id="thumb8" class="img-responsive img-thumbnail" src='<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_8); ?>'><br>

        </div>
    </div>

    <div class="row">
        <div class="col-xs-3 col-md-3 col-lg-3">
            <img id="thumb9" class="img-responsive img-thumbnail" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_9); ?>"/>

        </div>
        <div class="col-xs-3 col-md-3 col-lg-3">
            <img id="thumb10" class="img-responsive img-thumbnail" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_10); ?>"/><br>

        </div>

    </div>
</div>

<?php echo CHtml::endForm(); ?>

<script type="text/javascript">
    $(document).ready(function() {

        $('.uplfile').dialog({
            autoOpen: false,
            height: 140,
            modal: true,
            width: 'auto',
            height:'auto'
        });
        $('.btcancel').on('click', function() {
            $('.uplfile').dialog('close', function() {
                $('.uplfile').empty();
            });
        });
        $('#thumb1').bind('click', function() {
            $("#Casa_file").trigger('click')
            $.get('../sesschange', {id: 1});
        });
        $('#thumb2').bind('click', function() {
            $("#Casa_file").trigger('click')
            $.get('../sesschange', {id: 2});
        });
        $('#thumb3').bind('click', function() {
            $("#Casa_file").trigger('click');
            $.get('../sesschange', {id: 3});
        });
        $('#thumb4').bind('click', function() {
            $("#Casa_file").trigger('click');
            $.get('../sesschange', {id: 4});
        });
        $('#thumb5').bind('click', function() {
            $("#Casa_file").trigger('click');
            $.get('../sesschange', {id: 5});
        });
        $('#thumb6').bind('click', function() {
            $("#Casa_file").trigger('click');
            $.get('../sesschange', {id: 6});
        });
        $('#thumb7').bind('click', function() {
            $("#Casa_file").trigger('click');
            $.get('../sesschange', {id: 7});
        });
        $('#thumb8').bind('click', function() {
            $("#Casa_file").trigger('click');
            $.get('../sesschange', {id: 8});
        });
        $('#thumb9').bind('click', function() {
            $("#Casa_file").trigger('click');
            $.get('../sesschange', {id: 9});
        });
        $('#thumb10').bind('click', function() {
            $("#Casa_file").trigger('click');
            $.get('../sesschange', {id: 10});
        });
    });
    $('#start_uploads').click(function() {
        $('.file_upload_start button').click();
    });

</script>



