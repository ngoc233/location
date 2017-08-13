
          <!-- map-->
          <div id="map"></div>
          <script>

            // This example displays a marker at the center of Australia.
            // When the user clicks the marker, an info window opens.
            function initMap() {
              var uluru = {lat: 16.46278, lng: 107.58472};
              var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 5 ,
                center: uluru
              });
              // create a new marker and infowindows
              @foreach($arrays['places'] as $place)

                var {{'uluru'.$place->id}} = {lat: {{$place->latitude}}, lng: {{$place->longitude}}};

                var {{'contentString'.$place->id}} = "<img width='200px;' style='float:left;margin:20px;' src='"+"{{url('public/admin/image_place/'.'/'.$place->image)}}"+"'>" +
                  "<br/>"+
                  "<div style='floaf:left;margin:20px;font-size:16px;font-weight:bold'>{{$place->description}}</div>";

                var {{'infoWindow'.$place->id}} = new google.maps.InfoWindow({
                  content: {{'contentString'.$place->id}}
                });
                // incon for marker
                var checkAlias = '{{$place->Type->alias}}';
                if (checkAlias == 'Thu-Do')
                {
                  var icon = 'https://maps.gstatic.com/mapfiles/ms2/micons/rangerstation.png';
                }
                else if(checkAlias == 'Rung-Nui')
                {
                  var icon ='https://maps.gstatic.com/mapfiles/ms2/micons/tree.png';
                }
                else if(checkAlias == 'Bien')
                {
                  var icon ='https://maps.gstatic.com/mapfiles/ms2/micons/sailing.png';
                }
                else if(checkAlias == 'Thanh-Pho')
                {
                  var icon ='https://maps.gstatic.com/mapfiles/ms2/micons/homegardenbusiness.png';
                }
                else
                {
                  var icon ='https://maps.gstatic.com/mapfiles/ms2/micons/blue-dot.png';
                }
                var {{'marker'.$place->id}} = new google.maps.Marker({
                  position: {{'uluru'.$place->id}}, 
                  map: map,
                  title: '{{$place->name}}',
                  icon: icon
                });
                {{'marker'.$place->id}}.addListener('click', function() {
                  {{'infoWindow'.$place->id}}.open(map, {{'marker'.$place->id}});
                });
              @endforeach

            }
          </script>
          <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXILn0FXsBlGB2kntwlUGpl3AavXkYdEs&callback=initMap">
          </script>
          <!--/map-->
        </div>
