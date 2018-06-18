<?php

require_once 'utils/functions.php';
require_once 'User.php';
require_once 'Connection.php';
require_once 'Favorites.php';
require_once 'FavoritesTableGateway.php';

 /*if (!is_logged_in()) {
    header("Location: loginForm.php");
}*/

if(is_logged_in())
{
  start_session();
  $user = $_SESSION['user'];

  $connection = Connection::getInstance();
  $gateway = new FavoritesTableGateway($connection);

  $userId = $user->getId();
  $statement = $gateway->getFavoritesById($userId);
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1">
<link rel="stylesheet" type="text/css" href="css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

 <meta charset=utf-8 />
 <title>Workr</title>
</head>
<body style="max-width: 100%; overflow-x: hidden; max-height: 100%;">




  
  
<?php require 'h-f/header.php' ?>

 <div class="container-fluid switchTabs">
<div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#map" onclick="mapResize()" data-toggle="tab">Map</a></li>
        <li><a href="#jobSearch" data-toggle="tab">Job Search</a></li>
        <li><a href="#favorites" data-toggle="tab">Favorites</a></li>
            </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="map" style="height: 100%;">

        <script>
          var width2 = document.getElementById("map").offsetWidth;

          $("#map").css("width", width2).css("height", window.screen.height - 110);
          $('#map a[href="#map"]').on('shown', function(){
          google.maps.event.trigger(map, 'resize');
          map.setCenter(latlng);

          function mapResize()
          {
            google.maps.event.trigger(map, 'resize');
          }

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
          zoom: 12,
           styles: [
            {
        "featureType": "all",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#f3f4f4"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry",
        "stylers": [
            {
                "weight": 0.9
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#83cead"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#fee379"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#fee379"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#7fc8ed"
            }
        ]
    }
          ]
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

          // URL for XML data
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
              
              var html = "<p><a href='https://kevinpdunbar.000webhostapp.com/viewJobNEW.php?id=" + id +"'>View Listing</a></p>";
  
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
      <form class="jobSearch" action="jobSearchNEW.php" method="POST">
        
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


          <div class = "table-responsive">
           <table class = "table">
                
              <?php
              if (is_logged_in()) 
              {
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<tr>';
                    echo '<td>' . $row['jobTitle'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>' . $row['jobType'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>' . $row['employer'] . '</td>';
                    echo '</tr>';
                    echo '<td>'
                    . '<a href="viewJobNEW.php?id='.$row['id'].'" class=" btn btcustom1 ">View</a> '
                    . '<br>'
                    . '<a class=" btn btcustom1 "  href="removeFromFavorites.php?userId='.$user->getId().'&jobId='.$row['id'].'">Remove From Favorites</a> '
                    . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>'
                    
                    . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                  }

              }

              else if(!is_logged_in())
              {
                echo '<h1>You need to be logged in to view your favorites</h1>';
              }

                
                ?>
                    </tbody>
                </table>   
        </div>
            
        </div>
        
    </div>
</div>

</body>
</html>

