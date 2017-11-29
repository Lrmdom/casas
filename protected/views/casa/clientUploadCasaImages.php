
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.galleryview.css" />

<script   src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.galleryview.js"></script>
<script   src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.timers.js"></script>


<div class="container-fluid">
    <ul id="myGallery">
        <li><img class="img-responsive" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_1); ?>"/>
        <li><img class="img-responsive" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_2); ?>"/>
        <li><img class="img-responsive" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_3); ?>"/>
        <li><img class="img-responsive" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_4); ?>"/>
        <li><img class="img-responsive" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_5); ?>"/>
        <li><img class="img-responsive" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_6); ?>"/>
        <li><img class="img-responsive" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_7); ?>"/>
        <li><img class="img-responsive" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_8); ?>"/>
        <li><img class="img-responsive" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_9); ?>"/>
        <li><img class="img-responsive" src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_10); ?>"/>


    </ul>
</div>
<script type="text/javascript">
    $(function() {
        $('#myGallery').galleryView({
            panel_width: 650,
            panel_height: 500,
            frame_width: 35,
            frame_height: 30,
            show_filmstrip_nav: false
        });
    });
</script>
