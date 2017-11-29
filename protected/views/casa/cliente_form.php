<div role="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'casa-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            "class" => "form-inline",
            'validateOnSubmit' => true),
    ));
    ?>
    <div class="container-fluid casaform well-lg">
        <div class="well well-sm">
            <h4><?php echo Yii::t("content", "Caraterísticas") ?></h4>
        </div>
        <div class="col-md-3 col-lg-3">
            <div class="form-group">
                <?php echo $form->hiddenField($model, 'cod_casa', array('size' => 5, 'maxlength' => 50)); ?>
                <?php echo $form->label($model, 'destino'); ?>
                <?php echo $model->destino; ?>
                <?php echo $form->hiddenField($model, 'propid', array('size' => 5, 'maxlength' => 50, 'value' => Yii::app()->user->id)); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label($model, 'tipoalojamento'); ?>
                <?php echo $model->tipoalojamento; ?>
            </div>
            <div class="form-group">
                <?php echo $form->label($model, 'tipo'); ?>
                <?php echo $model->tipo; ?>
            </div>
            <div class="form-group">
                <?php echo $form->label($model, 'quartos'); ?>
                <?php echo $model->quartos; ?>
            </div>
            <div class="form-group">
                <?php echo $form->label($model, 'dist_centro'); ?>
                <?php echo $model->dist_centro; ?>
            </div>
            <div class="form-group">
                <?php echo $form->label($model, 'dist_praia'); ?>
                <?php echo $model->dist_praia; ?>
            </div>
            <div class="form-group">
                <?php echo $form->label($model, 'ano'); ?>
                <?php echo $model->ano; ?>
            </div>
            <div class="form-group">
                <?php echo $form->label($model, 'piscina'); ?>
                <?php echo $form->checkBox($model, 'piscina'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->label($model, 'estacionamento'); ?>
                <?php echo $form->checkBox($model, 'estacionamento'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->label($model, 'aqcentral'); ?>
                <?php echo $form->checkBox($model, 'aqcentral'); ?>
            </div>
        </div>
        <?php if (($model->for_rent || $model->for_arrenda)): ?>
            <div class="col-md-3 col-lg-3">

                <div class="form-group">
                    <?php echo $form->label($model, 'pessoas'); ?>
                    <?php echo $model->pessoas; ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label($model, 'camascasal'); ?>
                    <?php echo $model->camascasal; ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'camassingle'); ?>
                    <?php echo $model->camassingle; ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'casasbanho'); ?>
                    <?php echo $model->casasbanho; ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label($model, 'altitude'); ?>
                    <?php echo $model->altitude; ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'televisao'); ?>
                    <?php echo $form->checkBox($model, 'televisao'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'ar_condicionado'); ?>
                    <?php echo $form->checkBox($model, 'ar_condicionado'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'roupascama'); ?>
                    <?php echo $form->checkBox($model, 'roupascama'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'roupasbanho'); ?>
                    <?php echo $form->checkBox($model, 'roupasbanho'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'despertador'); ?>
                    <?php echo $form->checkBox($model, 'despertador'); ?>
                </div>

            </div>

            <div class="col-md-3 col-lg-3">

                <div class="form-group">
                    <?php echo $form->label($model, 'dvd'); ?>
                    <?php echo $form->checkBox($model, 'dvd'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'limpeza'); ?>
                    <?php echo $form->checkBox($model, 'limpeza'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'utilcozinha'); ?>
                    <?php echo $form->checkBox($model, 'utilcozinha'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'fogao'); ?>
                    <?php echo $form->checkBox($model, 'fogao'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'frigorif'); ?>
                    <?php echo $form->checkBox($model, 'frigorif'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'congel'); ?>
                    <?php echo $form->checkBox($model, 'congel'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'forno'); ?>
                    <?php echo $form->checkBox($model, 'forno'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'barbecue'); ?>
                    <?php echo $form->checkBox($model, 'barbecue'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'microndas'); ?>
                    <?php echo $form->checkBox($model, 'microndas'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'mlavaloica'); ?>
                    <?php echo $form->checkBox($model, 'mlavaloica'); ?>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="form-group">
                    <?php echo $form->label($model, 'mlavaroupa'); ?>
                    <?php echo $form->checkBox($model, 'mlavaroupa'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label($model, 'satcabo'); ?>
                    <?php echo $form->checkBox($model, 'satcabo'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'internet'); ?>
                    <?php echo $form->checkBox($model, 'internet'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'deficientes'); ?>
                    <?php echo $form->checkBox($model, 'deficientes'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'outros_servicos'); ?>
                    <?php echo $form->checkBox($model, 'outros_servicos'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label($model, 'fengomar'); ?>
                    <?php echo $form->checkBox($model, 'fengomar'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->label($model, 'telefone'); ?>
                    <?php echo $form->checkBox($model, 'telefone'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'torradeira'); ?>
                    <?php echo $form->checkBox($model, 'torradeira'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'animais'); ?>
                    <?php echo $form->checkBox($model, 'animais'); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model, 'fumadores'); ?>
                    <?php echo $form->checkBox($model, 'fumadores'); ?>
                </div>
            </div>

            <div class="col-md-12 col-lg-12 well-lg">
                <div class="well well-sm">
                    <h4><?php echo Yii::t("content", "Atividades próximas") ?></h4>
                </div>
                <span class="form-group">
                    <?php echo $form->label($model, 'golf'); ?>
                    <?php echo $form->checkBox($model, 'golf'); ?>
                </span>
                <span class="form-group">
                    <?php echo $form->label($model, 'tenis'); ?>
                    <?php echo $form->checkBox($model, 'tenis'); ?>
                </span>
                <span class="form-group">
                    <?php echo $form->label($model, 'pesca'); ?>
                    <?php echo $form->checkBox($model, 'pesca'); ?>
                </span>
                <span class="form-group">
                    <?php echo $form->label($model, 'natacao'); ?>
                    <?php echo $form->checkBox($model, 'natacao'); ?>
                </span>
                <span class="form-group">
                    <?php echo $form->label($model, 'bowling'); ?>
                    <?php echo $form->checkBox($model, 'bowling'); ?>
                </span>
                <span class="form-group">
                    <?php echo $form->label($model, 'casino'); ?>
                    <?php echo $form->checkBox($model, 'casino'); ?>
                </span>
                <span class="form-group">
                    <?php echo $form->label($model, 'cinema'); ?>
                    <?php echo $form->checkBox($model, 'cinema'); ?>
                </span>
                <span class="form-group">
                    <?php echo $form->label($model, 'discoteca'); ?>
                    <?php echo $form->checkBox($model, 'discoteca'); ?>
                </span>

            </div>
        <?php endif ?>
        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->

<?php
if ($model->lat == '') {
    $model->lat = '-7.508811950683594';
}
if ($model->lng == '') {
    $model->lng = '37.18302281055254';
}
?>

<script type="text/javascript">
    $('#casa-form :input').attr('disabled', 'disabled')
    $(':checkbox').simpleImageCheck({
        image: '/css/images/uncheck.png',
        imageChecked: '/css/images/check.png'
    });
    var geo = new google.maps.Geocoder();
    var myOptions = {
        center: new google.maps.LatLng(<?php echo $model->lat; ?>,<?php echo $model->lng; ?>),
        zoom: 9,
        draggable: false,
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
        //draggable: true,
        map: map
    });
    // Recenter Map and add Coords by clicking the map
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });
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


    $("input:checkbox").not(":checked").parent().hide();


</script>
