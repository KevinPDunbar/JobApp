

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
 <meta charset=utf-8 />
 <title>Workr</title>
</head>
<body>
  
  
 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="slide-nav">
  <div class="container">
   <div class="navbar-header">
    <a class="navbar-toggle"> 
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
     </a>
    <a class="navbar-brand" href="index.php">Workr</a>
    <a class="navbar-latest" href="index.php">Latest Jobs</a>
   </div>
   <div id="slidemenu">
     
         
     
    <ul class="nav navbar-nav">
     <li class="active"><a href="#">Home</a></li>
     <li><a href="#about">About</a></li>
     <li><a href="#contact">Contact</a></li>
     <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
      <ul class="dropdown-menu">
       <li><a href="#">View Account</a></li>
              <li class="divider"></li>
       <li><a href="#">Edit Information</a></li>
              <li class="divider"></li>
       <li><a href="#">Logout</a></li>
      </ul>
     </li>
    </ul>
          
   </div>
  </div>
 </div>

 <div class="container-fluid switchTabs">
<div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#map" data-toggle="tab">Map</a></li>
        <li><a href="#jobSearch" data-toggle="tab">Job Search</a></li>
        <li><a href="#favorites" data-toggle="tab">Favorites</a></li>
            </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="map">

        <script>
          var width2 = document.getElementById("map").offsetWidth;

          $("#map").css("width", width2).css("height", 500);
          $('#map a[href="#map"]').on('shown', function(){
          google.maps.event.trigger(map, 'resize');
          map.setCenter(latlng);
          });
        </script> 


      
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
          downloadUrl('https://kevinpdunbar.000webhostapp.com/xml.php', function(data) {
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
              
              var html = "<p><a href='https://kevinpdunbar.000webhostapp.com/viewJob.php?id=" + id +"'>View Listing</a></p>";
  
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
        <div class="tab-pane" id="jobSearch">
            <div class="container">
  <div class="row">
    <div class="col-xs-12 col-lg-8">
      <form class="jobSearch" action="jobSearchNotLoggedIn.php" method="POST">
        
        <label for="what" >What</label>
        <input type="text" class="form-control " id="name" name="name" placeholder="Keyword">

        <label for="Where">Where</label>
            <select class="form-control i" id="location" name="location" placeholder="Location" >
                <option value="">All</option>
                <option value="antrim">Antrim</option>
                <option value="armagh">Armagh</option>
                <option value="carlow">Carlow</option>
                <option value="cavan">Cavan</option>
                <option value="clare">Clare</option>
                <option value="cork">Cork</option>
                <option value="derry">Derry</option>
                <option value="donegal">Donegal</option>
                <option value="down">Down</option>
                <option value="dublin">Dublin</option>
              
                <option value="dublin 1">Dublin 1</option>
                <option value="dublin 2">Dublin 2</option>
                <option value="dublin 3">Dublin 3</option>
                <option value="dublin 4">Dublin 4</option>
                <option value="dublin 5">Dublin 5</option>
                <option value="dublin 6">Dublin 6</option>
                <option value="dublin 6W">Dublin 6W</option>
                <option value="dublin 7">Dublin 7</option>
                <option value="dublin 8">Dublin 8</option>
                <option value="dublin 9">Dublin 9</option>
                <option value="dublin 10">Dublin 10</option>
                <option value="dublin 11">Dublin 11</option>
                <option value="dublin 12">Dublin 12</option>
                <option value="dublin 13">Dublin 13</option>
                <option value="dublin 14">Dublin 14</option>
                <option value="dublin 15">Dublin 15</option>
                <option value="dublin 16">Dublin 16</option>
                <option value="dublin 17">Dublin 17</option>
                <option value="dublin 18">Dublin 18</option>
                <option value="dublin 20">Dublin 20</option>
                <option value="dublin 22">Dublin 22</option>
                <option value="dublin 24">Dublin 24</option>
                 
                <option value="fermanagh">Fermanagh</option>
                <option value="galway">Galway</option>
                <option value="kerry">Kerry</option>
                <option value="kildare">Kildare</option>
                <option value="kilkenny">Kilkenny</option>
                <option value="laois">Laois</option>
                <option value="leitrim">Leitrim</option>
                <option value="limerick">Limerick</option>
                <option value="longford">Longford</option>
                <option value="louth">Louth</option>
                <option value="mayo">Mayo</option>
                <option value="meath">Meath</option>
                <option value="monaghan">Monaghan</option>
                <option value="offaly">Offaly</option>
                <option value="roscommon">Roscommon</option>
                <option value="sligo">Sligo</option>
                <option value="tipperary">Tipperary</option>
                <option value="tyrone">Tyrone</option>
                <option value="waterford">Waterford</option>
                <option value="westmeath">Westmeath</option>
                <option value="wexford">Wexford</option>
                <option value="wicklow">Wicklow</option>
            </select>

            <label for="Category">Category</label>
            <select class="form-control i" id="type" name="type" placeholder="Category" >
                <option value="">All</option>
                <option value="Accounting">Accounting</option>
                <option value="Administrative">Administrative</option>
                <option value="Media">Media</option>
                <option value="Automotive">Automotive</option>
                <option value="Biotechnology">Biotechnology</option>
                <option value="Business">Business</option>
                <option value="Constuction">Construction</option>
                <option value="Customer Service">Customer Service</option>
                <option value="Education">Education</option>
                <option value="Engineering">Engineering</option>
                <option value="Executive">Executive</option>
                <option value="Facilities">Facilities</option>
                <option value="Financial Services">Financial Services</option>
                <option value="Government">Government</option>
                <option value="Healthcare">Healthcare</option>
                <option value="Hospitality">Hospitality</option>
                <option value="Human Resources">Human Resources</option>
                <option value="Information Technology">Information Technology</option>
                <option value="Insurance">Insurance</option>
                <option value="Law Enforcement">Law Enforcement</option>
                <option value="Legal">Legal</option>
                <option value="Manufacturing">Manufacturing</option>
                <option value="Marketing">Marketing</option>
                <option value="Other">Other</option>
                <option value="Real Estate">Real Estate</option>
                <option value="Retail">Retail</option>
                <option value="Sales">Sales</option>
                <option value="Science">Science</option>
                <option value="Telecommunications">Telecommunications</option>
                <option value="Transportation">Transportation</option> 
            </select>

            <button type="submit" class=" btn btcustom2 ">Find Jobs</button>

      </form>

    </div>
  </div>
</div>


        </div>
        <div class="tab-pane" id="favorites">
            
        </div>
        
    </div>
</div>

</body>
</html>