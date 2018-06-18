<!doctype html>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/custom.css" rel="stylesheet">
     <script src="js/respond.js"></script>


</head>

<body>
<div class="row-fluid">
        <nav class="navbar nav nav-tabs nav-justified navcolor ">
		<div class = "container">
		<div class=" col-xs-1  ">
		 <a  href="index.html"><img src="images/homebutton.png" alt="l." height="30px" width="30px" class="brand  " ></a>
		</div>
		<div class=" col-lg-6 col-lg-offset-2 col-md-6 col-md-offset-2 col-sm-6 col-xs-6 col-xs-offset-1 ">
        
         <input type="text" class=" field  input-large1 " id="email" placeholder="Keyword">
		  </div>
		  <div class=" col-lg-3 col-md-3 col-sm-4 col-xs-3 ">
		<input type="button" class="btn btcustom1 pull-right"  value="submit" >
	
		<!--<button type="submit" class="  btn  btcustom pull-right ">Filter</button>-->
	    
	    </div>
		</div>
		</div>
		</div>
		</div>
		<div class = "container">
		<div class="row">
        <nav class="navbar navbar-default  ">
		
		
		 <ul class="nav nav-tabs nav-justified" role="tablist">
    <div class=" col-xs-4 text-center ">
    <li role="presentation" ><a href="Map" aria-controls="profile" role="tab" data-toggle="tab"><h3>Map</h3></a></li>
	</div>
	<div class="  col-xs-4 text-center  ">
    <li role="presentation"><a href="list" aria-controls="messages" role="tab" data-toggle="tab"><h3>List</h3></a></li>
	</div>
	<div class="  col-xs-2  col-xs-offset-2 ">
    <li role="presentation"><a href="Saved" aria-controls="settings" role="tab" data-toggle="tab"><h3>Saved Jobs</h3></a></li>
	</div>
  </ul>

  <!-- Tab panes -->
  
         
         
		
		
		</div>
		<div class="tab-content">
   
		<div role="tabpanel" class="tab-pane active" id="profile">this is where the map goes
                
                <div id="map"></div>

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(53.350140, -6.266155),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;
        
        
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost/JobsClick/xml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');  
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              
              var html = "<p><a href='http://localhost/JobsClick/viewJob.php?id=" + id +"'>View Listing</a></p>";
  
              text.textContent = address + html
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(name + html);
                infoWindow.open(map, marker);
              });
            });
          });
        }
        
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ-5lRHh5LkZ8RCgEmNMbJu96EPEk5XOI&callback=initMap">
    </script>
                
                
                </div>
		<div role="tabpanel" class="tab-pane " id="messages">this is the listview</div>
		<div role="tabpanel" class="tab-pane " id="settings">this is the section for favourite jobs that are saved</div>
        </div>
		</div>
		

      
            
             

       
			
 
<!--javascript-->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jscript.js"></script>

</body>
</html>
