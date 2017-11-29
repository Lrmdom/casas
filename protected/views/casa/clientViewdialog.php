
<div class="">
    <img class="img-responsive img-polaroid imgGridView"  src="<?php echo (Yii::app()->baseUrl . '/uploads/' . $model->img_2); ?>" title='' />
</div>
<?php echo $model->cod_casa ?>
<div id="map" class="" style="width: 100%; height: 150px;margin-bottom:10px;">
</div>
<div class="clearfix"></div>
<?php if ($model->for_sale == 1): ?>
    <div class="alert alert-success">Para venda: € <?php echo $model->valor_venda ?></div>
<?php endif ?>
<?php if ($model->for_arrenda == 1): ?>
    <div class="alert alert-success">Arrendamento: € <?php echo $model->valor_arrendamento ?></div>
<?php endif ?>

<?php if ($model->for_rent == 1): ?>
    <div class="alert alert-success">Para férias, confirme disponibilidade </div>
    <div class="dPicker dialogdp "></div>
<?php endif ?>
<div class="pull-right">
    <a href="<?php echo Yii::app()->createUrl('casa/client', array('id' => $model->cod_casa)) ?>" class="btn btn-warning"> Ver detalhes</a>
</div>
<script type="text/javascript">
<?php echo $js ?>
    $(function() {
        $('.dPicker').datepicker({beforeShowDay: Days, numberOfMonths: [1, 2]});
    });
</script>
<script type="text/javascript">
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
    var mapa = new google.maps.Map(document.getElementById('map'), myOptions);
    var mark = new google.maps.Marker({
        position: myOptions.center,
        draggable: false,
        map: mapa
    });


</script>