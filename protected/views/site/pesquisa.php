
<link rel="stylesheet" type="text/css" href="/css/style.css"/>
<link rel="stylesheet" href="../css/jquery-ui-1.7.custom.css" type="text/css"/>
<link rel="stylesheet" href="../css/jquery.autocomplete.css" type="text/css"/>
<link rel="stylesheet" href="/css/forms.css" type="text/css"/>

<script type="text/javascript" src="../scripts/jquery.autocomplete.min.js"></script>
<script src="/scripts/markerclusterer.js" type="text/javascript"></script>




<SCRIPT type="text/javascript">
    $(function() {
        $("#accordionPesqs").accordion({autoHeight: false,
            collapsible: true,
            active: "none"
        });
        $("#onde").autocomplete("locautocomplete.aspx", {formatResult: function(data, value) {
                return value.split(" (")[0];
            }
        });
        $('#pesqAvanc').click(function() {
            $('#DivPesqAvanc').html('<center><img src="/images/ajax-loader.gif"></center>').load('pesquisaAvancada.htm');
        });
        $('#ofEspecial').click(function() {
            $('#DivOfEspecial').html('<center><img src="/images/ajax-loader.gif"></center>').load('pesqOfertaEsp.aspx');
        });
    });
</SCRIPT>
<script type="text/javascript">
    $().ready(function() {
        $('#inicio').datepicker({dateFormat: 'yy-mm-dd'});
        $('#fim').datepicker({dateFormat: 'yy-mm-dd'});
        $('#fim').change(function() {
            $('#results').html('<center><img src="/images/ajax-loader.gif"></center>').load('pesqDatas.aspx', {inicio: document.getElementById('inicio').value, fim: document.getElementById('fim').value});
            readMapDatas();
        });
    });


</script>




<div id="accordionPesqs">
    <h3><a href="#" id="ofEspecial">Pesquisa rápida oferta especial</a> </h3>
    <div>	<asp:TextBox ID="codigo" runat="server"></asp:TextBox>
        <asp:Button ID="Button2" runat="server" Text="Pesquisar" class="ui-state-default ui-corner-all" /></div>
    <h3> <a href="#">Pesquisa datas</a></h3>
    <div><asp:TextBox ID="inicio" runat="server"></asp:TextBox>
        <asp:TextBox ID="fim" runat="server"></asp:TextBox>
        <asp:Button ID="Button1" runat="server" Text="Pesquisar" class="ui-state-default ui-corner-all" /></div>
    <h3> <a href="activar.php">Pesquisa por código alojamento</a></h3>
    <div>	</div>
    <h3> <a href="#" id="pesqAvanc">Pesquisa avançada</a></h3>
    <div>
        <title>Para onde gostaria de ir</title>
        <SCRIPT type="text/javascript">
            $(function() {
                $("#onde").autocomplete("locautocomplete.aspx", {formatResult: function(data, value) {
                        return value.split(" (")[0];
                    }
                });
            });
        </SCRIPT>
        <div><form  name="formpesqavancada" id="formpesqavancada" class="cmxform" method="get" action="resultspesqavancada.aspx" >
                <fieldset id="divpesqavancada">
                    <legend></legend>
                    <ol>
                        <li><label for="onde">Para onde gostaria de ir? </label>
                            <input id="thispage" name="thispage" type="hidden" value="1" />
                            <input id="perpage" name="perpage" type="hidden" value="10" />
                            <input id="onde" name="onde" type="text" class="required"/>
                        </li>
                        <li>
                        </li>
                        <li>Quando?<label for="quandoinicio">de</label><input id="quandoinicio" name="quandoinicio" type="text"  value="" /><label for="quandofim">a </label>&nbsp;<input id="quandofim" name="quandofim" type="text" class="required" value="" />
                        </li>
                        <li>
                        </li>
                        <li>Quanto penso gastar?<label for="quantominimo">Mínimo</label><input id="quantominimo" name="quantominimo" type="text"  value="" />
                            Máximo<input id="quantomaximo" name="quantomaximo" type="text"  value="" /></li>
                        <li>
                        </li>
                        <li><label for="quartos">Quartos</label>
                            <input id="quartos" name="quartos" class="required" value="" />
                        </li>
                        <li>
                            <label for="pessoas">Pessoas</label>
                            <input id="pessoas" name="pessoas" class="required" type="text" />
                        </li>
                        <li>
                            <label for="tipo">Tipo</label>
                            <input id="tipo" name="tipo" class="required" type="text" />
                        </li>
                        <li>
                        </li>
                        <li>
                        </li>
                        Outros critérios:
                        <li>
                        </li>
                        <li><label for="rcamas">Roupas cama</label>
                            <input name="rcamas" type="checkbox" class="inputclass pageRequired" id="rcamas" value="1" /></li>
                        <li><label for="rbanho">Roupas banho</label>
                            <input name="rbanho" id="rbanho" type="checkbox" value="1" /></li>
                        <li><label for="limpeza">Limpeza</label>
                            <input name="limpeza" id="limpeza" type="checkbox"  value="1" /></li>
                        <li><label for="maqloica">Máq. lava loiça</label>
                            <input name="maqloica" id="maqloica" type="checkbox" value="1" /></li>
                        <li><label for="maqroupa">Máq. lava roupa</label>
                            <input name="maqroupa" id="maqroupa" type="checkbox" value="1" /></li>
                        <li><label for="arcon">Ar condicionado</label>
                            <input name="arcon" id="arcon" type="checkbox" value="1" /></li>
                        <li><label for="satcabo">Satélite/Cabo</label>
                            <input name="satcabo" id="satcabo" type="checkbox" value="1" /></li>
                        <li><label for="internet">Internet </label>
                            <input name="internet" id="internet" type="checkbox" value="1" /></li>
                        <li><label for="barbecue">Barbecue</label>
                            <input name="barbecue" id="barbecue" type="checkbox" value="1" /></li>
                    </ol>
                    <div class="buttonWrapper">
                        <input type="submit" class="ui-state-default ui-corner-all" value="Pesquisar" name="formpesqavancadabut" id="formpesqavancadabut" /></div>
                </fieldset>
            </form>
            <a id="env">caminho</a>
        </div>
    </div>
</div>


<div id="map" style="width: 550px; height: 450px;float:right;"></div>








<div id="results"></div>
<script type="text/javascript">
    //<![CDATA[
    if (GBrowserIsCompatible()) {
        var side_bar_html = "";
        var gmarkers = [];
        var htmls = [];
        var i = 0;
        // A function to create the marker and set up the event window
        function createMarker(point, name, html) {
            var marker = new GMarker(point);
            GEvent.addListener(marker, "click", function() {
                marker.openInfoWindowHtml(html);
            });
            gmarkers[i] = marker;
            htmls[i] = html;
            side_bar_html += '<a href="javascript:myclick(' + i + ')">' + name + '<\/a><br>';
            i++;
            return marker;
        }
        // This function picks up the click and opens the corresponding info window
        function myclick(i) {
            gmarkers[i].openInfoWindowHtml(htmls[i]);
        }
        // create the map
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GLargeMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(39, -7), 2);
        // A function to read the data
        function readMap(pessoas, localidade, tipo, mes) {
            var parms = "localidade=" + localidade + "&pessoas=" + pessoas + "&tipo=" + tipo + "&mes=" + mes
            var marker_s = new Array();
            var url = "points.aspx?" + parms;
            var request = GXmlHttp.create();
            request.open("GET", url, true);
            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    var xmlDoc = request.responseXML;
                    // obtain the array of markers and loop through it
                    var markers = xmlDoc.documentElement.getElementsByTagName("marker");
                    // hide the info window, otherwise it still stays open where the removed marker used to be
                    map.getInfoWindow().hide();
                    map.clearOverlays();
                    // empty the array
                    gmarkers = [];
                    // reset the side_bar
                    side_bar_html = "";
                    for (var i = 0; i < markers.length; i++) {
                        // obtain the attribues of each marker
                        var lat = parseFloat(markers[i].getAttribute("lat"));
                        var lng = parseFloat(markers[i].getAttribute("lng"));
                        var point = new GLatLng(lat, lng);
                        var html = markers[i].getAttribute("html");
                        var label = markers[i].getAttribute("label");
                        // create the marker
                        var marker = createMarker(point, label, html);
                        marker_s.push(marker);
                    }
                    // put the assembled side_bar_html contents into the side_bar div
                    var markerClusterer = new MarkerClusterer(map, marker_s);
                }
            }
            request.send(null);
        }
        // When initially loaded, use the data from "map11.php?q=a"
        readMap("All", "All", "All", "All");
    }
    else {
        alert("Sorry, the Google Maps API is not compatible with this browser");
    }
    // This Javascript is based on code provided by the
    // Community Church Javascript Team
    // http://www.bisphamchurch.org.uk/
    // http://econym.org.uk/gmap/
    //]]>
    function readMapDatas() {
        var parms = "inicio=" + $('#inicio').val() + "&fim=" + $('#fim').val()
        var marker_s = new Array();
        var url = "pointsPdata.aspx?" + parms;
        var request = GXmlHttp.create();
        request.open("GET", url, true);
        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                var xmlDoc = request.responseXML;
                // obtain the array of markers and loop through it
                var markers = xmlDoc.documentElement.getElementsByTagName("marker");
                // hide the info window, otherwise it still stays open where the removed marker used to be
                map.getInfoWindow().hide();
                map.clearOverlays();
                // empty the array
                gmarkers = [];
                // reset the side_bar
                side_bar_html = "";
                for (var i = 0; i < markers.length; i++) {
                    // obtain the attribues of each marker
                    var lat = parseFloat(markers[i].getAttribute("lat"));
                    var lng = parseFloat(markers[i].getAttribute("lng"));
                    var point = new GLatLng(lat, lng);
                    var html = markers[i].getAttribute("html");
                    var label = markers[i].getAttribute("label");
                    // create the marker
                    var marker = createMarker(point, label, html);
                    marker_s.push(marker);
                }
                // put the assembled side_bar_html contents into the side_bar div
                var markerClusterer = new MarkerClusterer(map, marker_s);
            }
        }
        request.send(null);
    }


</script>

