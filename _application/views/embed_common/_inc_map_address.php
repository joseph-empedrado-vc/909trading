<div class="panel panel-default">

    <div class="panel-body">
        <p class="text-justify">For inquiries, and free site viewings, you can contact us at Tel. Nos. 63.920.917.4837 (Globe/Viber/Tango)
            or 63.922.894.9880 (Sun).
        </p>
        <p class="text-justify">
            You can also use the form on the right or email us at <a href="mailto:info@909trading.com">info@909trading.com</a> if you prefer online inquiries. We constantly check any queries and make sure that we reply as soon as possible.
        </p>
        <div class="clearfix"></div>
        <div class="row go-fluid ">

            <div class="col-md-12  no-padding" >
                <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
                <script>
                    function initialize() {
                        var myLatlng = new google.maps.LatLng(14.855205,120.255081);
                        var mapOptions = {
                            zoom: 16,
                            center: myLatlng
                        }
                        var map = new google.maps.Map(document.getElementById('map-container'), mapOptions);


                        var marker = new google.maps.Marker({
                            position: myLatlng,
                            map: map
                        });

                        var contentString = '<div id="content">'+

                            '<h4>909Trading</h4>'+
                            '<div id="bodyContent">'+
                            '<p>222 Argonaut Highway,</p>'+

                            '<p>Subic Bay Freeport Zone 2222 Philippine</p>'+
                            '</div>'+
                            '</div>';

                        var infowindow = new google.maps.InfoWindow({
                            content: contentString
                        });

                        infowindow.open(map, marker);
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow.open(map,marker);
                        });
                    }

                    google.maps.event.addDomListener(window, 'load', initialize);
                </script>

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <span>Location Map</span>
                    </div>
                    <div id="map-container" class="panel-body" style="height: 600px;">

                    </div>
                </div>


            </div>


        </div>
    </div>
</div>