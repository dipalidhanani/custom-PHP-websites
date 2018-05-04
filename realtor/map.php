
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<?php 


 $address= $city_name.','.$street_name.',Ontario,Canada';
    // We define our address
    $address =  $address;
    // We get the JSON results from this request
    $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
    // We convert the JSON to an array
    $geo = json_decode($geo, true);
    // If everything is cool
    if ($geo['status'] = 'OK') {
    // We set our values
    $latitude = $geo['results'][0]['geometry']['location']['lat'];
    $longitude = $geo['results'][0]['geometry']['location']['lng'];
    }
    // And we give Google the time to breath if another request is coming
    sleep(.72);


/*echo $latitude."<br>";

echo $longitude;*/

?>
   <div id="map" style="width: 680px; height: 600px" align="center"> </div> 

   <script type="text/javascript"> 
      var myOptions = {
         zoom: 14,
         center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
         mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      var map = new google.maps.Map(document.getElementById("map"), myOptions);
   </script> 
