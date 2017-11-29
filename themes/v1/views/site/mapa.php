<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/markerclusterer.js" type="text/javascript"></script>
<div class='loading'></div>
<h4><span class="mapresult"></span><?php echo " casas nesta pesquisa.  " ?></h4>

<div id="mapSearch" class="thumbnail" style="width: 100%; height: 320px;"></div>

<script type="text/javascript">

    //<![CDATA[

    var infowindow;
    var gmarkers = [];
    var i = 0;
    // A function to create the marker and set up the event window

    var myOptions = {
        center: new google.maps.LatLng(37, -7),
        zoom: 9,
        scrollwheel: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        // Add controls
        mapTypeControl: true,
        scaleControl: true,
        overviewMapControl: true,
        overviewMapControlOptions: {
            opened: true
        }
    };
    var map = new google.maps.Map(document.getElementById('mapSearch'), myOptions);


    function createMarker(point, casa) {


        var marker = new google.maps.Marker({
            position: point,
            animation: google.maps.Animation.DROP,
            casa: casa
        });


        gmarkers.push(marker);

        google.maps.event.addListener(marker, 'click',
                function(event)
                {

                    $.get("<?php echo Yii::app()->createUrl('casa/clientdialog') ?>/" + casa, function(data) {
                        if (infowindow)
                            infowindow.close();
                        infowindow = new google.maps.InfoWindow();
                        infowindow.open(map, marker);
                        infowindow.setContent(data);
                    });
                }
        );

    }
    // A function to read the data
    function readMap() {


        var url = "<?php echo Yii::app()->createUrl('casa/SearchMap') ?>";
        var model =<?php echo CJSON::encode($model->attributes) ?>;
        $.post(url, model, function(data) {

            var xmlDoc = data;
            var markers = xmlDoc.documentElement.getElementsByTagName("marker");
            $('.mapresult').html(markers.length)

            gmarkers = [];
            infoWindows = [];


            for (var i = 0; i < markers.length; i++) {
                // obtain the attribues of each marker

                var lat = parseFloat(markers[i].getAttribute("lat"));
                var lng = parseFloat(markers[i].getAttribute("lng"));
                var point = new google.maps.LatLng(lat, lng);
                var html = markers[i].getAttribute("html");
                var label = markers[i].getAttribute("label");
                var casa = markers[i].getAttribute("casa");

                // create the marker
                createMarker(point, casa);

            }

            var markerClusterer = new MarkerClusterer(map, gmarkers);
        });
    }

    readMap();
    $("a[href='#maps']").on('shown.bs.tab', function() {
        google.maps.event.trigger(map, 'resize');
        map.setCenter(myOptions.center);
    });
</script>

