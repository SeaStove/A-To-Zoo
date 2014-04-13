<?php


//capture search term and remove spaces at its both ends if the is any
$searchTerm = trim($_GET['keyname']);


//check whether the name parsed is empty
if($searchTerm == "")
{
        echo "Enter name you are searching for.";
        exit();
}


//database connection info
$host = "localhost"; //server
$db = "atozoo"; //database name
$user = "root"; //dabases user name
$pwd = "YES"; //password


//connecting to server and creating link to database
$link = mysqli_connect($host, $user, $pwd, $db)
        or die("Unable to connect to MYSQL.");


//MYSQL search statement
$query = array("SELECT * FROM STLZoo WHERE animal LIKE '%$searchTerm%'", "SELECT * FROM CHIZoo WHERE animal LIKE '%$searchTerm%'"
, "SELECT * FROM SDIZoo WHERE animal LIKE '%$searchTerm%'", "SELECT * FROM COLZoo WHERE animal LIKE '%$searchTerm%'"
, "SELECT * FROM WOOZoo WHERE animal LIKE '%$searchTerm%'", "SELECT * FROM SMSZoo WHERE animal LIKE '%$searchTerm%'"
, "SELECT * FROM CMOZoo WHERE animal LIKE '%$searchTerm%'", "SELECT * FROM BRXZoo WHERE animal LIKE '%$searchTerm%'"
, "SELECT * FROM DVRZoo WHERE animal LIKE '%$searchTerm%'", "SELECT * FROM HOUZoo WHERE animal LIKE '%$searchTerm%'");

$results = mysqli_query($link, $query[0]);
$results2 = mysqli_query($link, $query[1]);
$results3 = mysqli_query($link, $query[2]);
$results4 = mysqli_query($link, $query[3]);
$results5 = mysqli_query($link, $query[4]);
$results6 = mysqli_query($link, $query[5]);
$results7 = mysqli_query($link, $query[6]);
$results8 = mysqli_query($link, $query[7]);
$results9 = mysqli_query($link, $query[8]);
$results10 = mysqli_query($link, $query[9]);
?> 

<!doctype html>
<html>
  <head>
    <title>A to Zoo</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/site.css">




    <!-- Map -->
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />




    <style type="text/css">
      html { height: 90% }
      body { height: 90%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
    </style>
  <script type="text/javascript" src="jquery-2.1.0.min.js">
  </script>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9aGBhOrPZgE82DKXfh5qE3ipGraldw6Q&sensor=false">
    </script>
    
    <script type="text/javascript">




    // Sets the coordinates of the zoos to a variable
    var zooStLouis = new google.maps.LatLng(38.63665,-90.29251);
    var zooChicago = new google.maps.LatLng(41.97340,-87.70078);
    var zooSanDiego = new google.maps.LatLng(32.73532,-117.14905);
    var zooColumbus = new google.maps.LatLng(40.15620,-83.11834);
    var zooWoodland = new google.maps.LatLng(47.66839,-122.35087);
    var zooSmithsonian = new google.maps.LatLng(38.92982,-77.04732);
    var zooComo = new google.maps.LatLng(44.98263,-93.15423);
    var zooBronx = new google.maps.LatLng(40.85059,-73.87700);
    var zooDenver = new google.maps.LatLng(39.75045,-104.94910);
    var zooHouston = new google.maps.LatLng(29.71191,-95.39283);




    // Sets the variable for the info window
    var infowindowstlouis = new google.maps.InfoWindow();
    var infowindowchicago = new google.maps.InfoWindow();
    var infowindowsandiego = new google.maps.InfoWindow();
    var infowindowcolumbus = new google.maps.InfoWindow();
    var infowindowwoodland = new google.maps.InfoWindow();
    var infowindowsmithsonian = new google.maps.InfoWindow();
    var infowindowcomo = new google.maps.InfoWindow();
    var infowindowbronx = new google.maps.InfoWindow();
    var infowindowdenver = new google.maps.InfoWindow();
    var infowindowhouston = new google.maps.InfoWindow();




    // This function initializes the map
    function initialize() {
      var mapOptions = {
        center: new google.maps.LatLng(37.5, -100),
        zoom: 5
      };




      var map = new google.maps.Map(document.getElementById("map-canvas"),
        mapOptions);
         
      // Creates the St Louis zoo marker
      var markerStLouis = new google.maps.Marker({
        animation:google.maps.Animation.DROP,
        position:zooStLouis,
      });
      
      // Creates the Chicago zoo marker  
      var markerChicago = new google.maps.Marker({
        animation:google.maps.Animation.DROP,
        position:zooChicago,
      });




      var markerSanDiego = new google.maps.Marker({
        animation:google.maps.Animation.DROP,
        position:zooSanDiego,
      });




      var markerColumbus = new google.maps.Marker({
        animation:google.maps.Animation.DROP,
        position:zooColumbus,
      });




      var markerWoodland = new google.maps.Marker({
        animation:google.maps.Animation.DROP,
        position:zooWoodland,
      });




      var markerSmithsonian = new google.maps.Marker({
        animation:google.maps.Animation.DROP,
        position:zooSmithsonian,
      });




      var markerComo = new google.maps.Marker({
        animation:google.maps.Animation.DROP,
        position:zooComo,
      });




      var markerBronx = new google.maps.Marker({
        animation:google.maps.Animation.DROP,
        position:zooBronx,
      });




      var markerDenver = new google.maps.Marker({
        animation:google.maps.Animation.DROP,
        position:zooDenver,
      });




      var markerHouston = new google.maps.Marker({
        animation:google.maps.Animation.DROP,
        position:zooHouston,
      });




      // Assigning content to the contentString variables
      var contentStLouis = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div id="bodyContent">'+
      '<p><b>St. Louis Zoo</b></p>'+
      '<p><a href="http://www.stlzoo.org">'+
      'Visit Site</a> '+
      '<p><a href="https://www.google.com/maps/place/Saint+Louis+Zoo/@38.636645,-90.292514,17z/data=!3m1!4b1!4m2!3m1!1s0x87d8b55ccc04062d:0x6075080197e8e830">'+
      'Directions</a> '
      '</div>'+
      '</div>';




      var contentChicago = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div id="bodyContent">'+
      '<p><b>Chicago</b></p>'+
      '<p><a href="http://www.lpzoo.org">'+
      'Lincoln Park Zoo</a> '+
      '<p><a href="https://www.google.com/maps/place/Lincoln+Park+Zoo/@41.92089,-87.632917,17z/data=!3m1!4b1!4m2!3m1!1s0x880fd36b093a9a07:0x940cc06f90294db">'+
      'Directions</a> '
      '</div>'+
      '</div>';




      var contentSanDiego = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div id="bodyContent">'+
      '<p><b>San Diego</b></p>'+
      '<p><a href="http://zoo.sandiegozoo.org/">'+
      'San Diego Zoo</a> '+
      '<p><a href="https://www.google.com/maps/place/San+Diego+Zoo/@32.735316,-117.149046,17z/data=!3m1!4b1!4m2!3m1!1s0x80d95495497f80c9:0x5df0f4372635e247">'+
      'Directions</a> '
      '</div>'+
      '</div>';




      var contentColumbus = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div id="bodyContent">'+
      '<p><b>Columbus</b></p>'+
      '<p><a href="http://www.colszoo.org/default.aspx">'+
      'Columbus Zoo</a> '+
      '<p><a href="https://www.google.com/maps/place/Columbus+Zoo+and+Aquarium/@40.156198,-83.118336,17z/data=!3m1!4b1!4m2!3m1!1s0x8838f44068353097:0x7663cfee91b602a9">'+
      'Directions</a> '
      '</div>'+
      '</div>';




      var contentWoodland = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div id="bodyContent">'+
      '<p><b>Woodland</b></p>'+
      '<p><a href="https://www.zoo.org/">'+
      'Woodland Park Zoo</a> '+
      '<p><a href="https://www.google.com/maps/place/Woodland+Park+Zoo/@47.668518,-122.350696,17z/data=!3m1!4b1!4m2!3m1!1s0x549014494aaed4c9:0x7c622dc1f941a8b2">'+
      'Directions</a> '
      '</div>'+
      '</div>';




      var contentSmithsonian = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div id="bodyContent">'+
      '<p><b>Smithsonian</b></p>'+
      '<p><a href="http://nationalzoo.si.edu/">'+
      'Smithsonian Zoo</a> '+
      '<p><a href="https://www.google.com/maps/place/Smithsonian+National+Zoological+Park/@38.929616,-77.049784,17z/data=!3m1!4b1!4m2!3m1!1s0x89b7b7d61dc7f0df:0x9e68ac204b0c1be4">'+
      'Directions</a> '
      '</div>'+
      '</div>';




      var contentComo = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div id="bodyContent">'+
      '<p><b>Como</b></p>'+
      '<p><a href="http://www.comozooconservatory.org/">'+
      'Como Zoo</a> '+
      '<p><a href="https://www.google.com/maps/place/Como+Park+Zoo+%26+Conservatory/@44.982631,-93.154232,17z/data=!3m1!4b1!4m2!3m1!1s0x52b32b10dbc7cde5:0x45abc97da82f5f5a">'+
      'Directions</a> '
      '</div>'+
      '</div>';




      var contentBronx = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div id="bodyContent">'+
      '<p><b>Bronx</b></p>'+
      '<p><a href="http://www.bronxzoo.com/">'+
      'Bronx Zoo</a> '+
      '<p><a href="https://www.google.com/maps/place/Bronx+Zoo/@40.850595,-73.876998,17z/data=!3m1!4b1!4m2!3m1!1s0x89c2f483516ad28b:0x56eb41c9795102e">'+
      'Directions</a> '
      '</div>'+
      '</div>';




      var contentDenver = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div id="bodyContent">'+
      '<p><b>Denver</b></p>'+
      '<p><a href="http://www.denverzoo.org/">'+
      'Denver Zoo</a> '+
      '<p><a href="https://www.google.com/maps/place/Denver+Zoo/@39.750448,-104.949099,17z/data=!3m1!4b1!4m2!3m1!1s0x876c794e20258f71:0x53fd0ed23d876c29">'+
      'Directions</a> '
      '</div>'+
      '</div>';




      var contentHouston = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<div id="bodyContent">'+
      '<p><b>Houston</b></p>'+
      '<p><a href="http://www.houstonzoo.org/">'+
      'Houston Zoo</a> '+
      '<p><a href="https://www.google.com/maps/place/The+Houston+Zoo/@29.71191,-95.392828,17z/data=!3m1!4b1!4m2!3m1!1s0x8640bf8610513213:0x61f408cc441069f8">'+
      'Directions</a> '
      '</div>'+
      '</div>';




      // Calling the function for the info window
      makeInfoWindowEvent(map, infowindowstlouis, contentStLouis, markerStLouis);
      makeInfoWindowEvent(map, infowindowchicago, contentChicago, markerChicago);
      makeInfoWindowEvent(map, infowindowsandiego, contentSanDiego, markerSanDiego);
      makeInfoWindowEvent(map, infowindowcolumbus, contentColumbus, markerColumbus);
      makeInfoWindowEvent(map, infowindowwoodland, contentWoodland, markerWoodland);
      makeInfoWindowEvent(map, infowindowsmithsonian, contentSmithsonian, markerSmithsonian);
      makeInfoWindowEvent(map, infowindowcomo, contentComo, markerComo);
      makeInfoWindowEvent(map, infowindowbronx, contentBronx, markerBronx);
      makeInfoWindowEvent(map, infowindowdenver, contentDenver, markerDenver);
      makeInfoWindowEvent(map, infowindowhouston, contentHouston, markerHouston);

	  <?php if(mysqli_num_rows($results) >= 1) : ?>
		markerStLouis.setMap(map);
	  <?php endif; ?>
	  <?php if(mysqli_num_rows($results2) >= 1) : ?>
		markerChicago.setMap(map);
	  <?php endif; ?>
	  <?php if(mysqli_num_rows($results3) >= 1) : ?>
		markerSanDiego.setMap(map);
	  <?php endif; ?>
	  <?php if(mysqli_num_rows($results4) >= 1) : ?>
		markerColumbus.setMap(map);
	  <?php endif; ?>
	  <?php if(mysqli_num_rows($results5) >= 1) : ?>
		markerWoodland.setMap(map);
	  <?php endif; ?>
	  <?php if(mysqli_num_rows($results6) >= 1) : ?>
		markerSmithsonian.setMap(map);
	  <?php endif; ?>
	  <?php if(mysqli_num_rows($results7) >= 1) : ?>
		markerComo.setMap(map);
	  <?php endif; ?>
	  <?php if(mysqli_num_rows($results8) >= 1) : ?>
		markerBronx.setMap(map);
	  <?php endif; ?>
	  <?php if(mysqli_num_rows($results9) >= 1) : ?>
		markerDenver.setMap(map);
	  <?php endif; ?>
	  <?php if(mysqli_num_rows($results10) >= 1) : ?>
		markerHouston.setMap(map);
	  <?php endif; ?>


    }




    google.maps.event.addDomListener(window, 'load', initialize);




    // This function handles the clicks for the info windows
    function makeInfoWindowEvent(map, infowindow, contentString, marker) {
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString);
        infowindow.open(map, marker);
      });
    }




    function toggleBounce() {
      if (markerStLouis.getAnimation() != null) {
        markerStLouis.setAnimation(null);
      } else {
        markerStLouis.setAnimation(google.maps.Animation.BOUNCE);
      }
    }




    function toggleBounce() {
      if (markerChicago.getAnimation() != null) {
        markerChicago.setAnimation(null);
      } else {
        markerChicago.setAnimation(google.maps.Animation.BOUNCE);
      }
    }




    function toggleBounce() {
      if (markerSanDiego.getAnimation() != null) {
        markerSanDiego.setAnimation(null);
      } else {
        markerSanDiego.setAnimation(google.maps.Animation.BOUNCE);
      }
    }




    function toggleBounce() {
      if (markerColumbus.getAnimation() != null) {
        markerColumbus.setAnimation(null);
      } else {
        markerColumbus.setAnimation(google.maps.Animation.BOUNCE);
      }
    }




    function toggleBounce() {
      if (markerWoodland.getAnimation() != null) {
        markerWoodland.setAnimation(null);
      } else {
        markerWoodland.setAnimation(google.maps.Animation.BOUNCE);
      }
    }




    function toggleBounce() {
      if (markerSmithsonian.getAnimation() != null) {
        markerSmithsonian.setAnimation(null);
      } else {
        markerSmithsonian.setAnimation(google.maps.Animation.BOUNCE);
      }
    }




    function toggleBounce() {
      if (markerComo.getAnimation() != null) {
        markerComo.setAnimation(null);
      } else {
        markerComo.setAnimation(google.maps.Animation.BOUNCE);
      }
    }




    function toggleBounce() {
      if (markerBronx.getAnimation() != null) {
        markerBronx.setAnimation(null);
      } else {
        markerBronx.setAnimation(google.maps.Animation.BOUNCE);
      }
    }




    function toggleBounce() {
      if (markerDenver.getAnimation() != null) {
        markerDenver.setAnimation(null);
      } else {
        markerDenver.setAnimation(google.maps.Animation.BOUNCE);
      }
    }




    function toggleBounce() {
      if (markerHouston.getAnimation() != null) {
        markerHouston.setAnimation(null);
      } else {
        markerHouston.setAnimation(google.maps.Animation.BOUNCE);
      }
    }




    </script>




    




  </head>
  <meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />




  <!-- Search bar -->
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="navbar-header">
        <a href="AtoZoo.html" class="navbar-brand">A to Zoo</a>
      </div>




      <ul class="nav navbar-nav">
        <li class="active"><a href="AtoZoo.html">Home</a></li>
        <li class=""><a href="about.html">About</a></li>
      </ul>
    </nav>




    <div class="container" align="center">
		<h1><FONT FACE="palatino">A to Zoo</h1>
      <h2><FONT FACE="palatino">Enter an animal you want to search for:</FONT></h2>
    </div>




    <div class="row">
      <div class="col-md-2 col-md-offset-5">
        <form class="navbar-form navbar-left" role="search"action="search.php" method="get">
          <div class="form-group">
            <input type="text" name="keyname" class="form-control" placeholder="Ex: Monkey">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
      </div>
    </div>




    <br/>








  <div id="map-canvas" style="height:100%"></div>
    
  <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>


