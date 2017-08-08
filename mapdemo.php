<?php
Ob_start();
session_start();
$name=$_SESSION['user_name'];
$id=$_SESSION['user_id'];
if(isset($_POST['submit'])){
$db=mysqli_connect("localhost","root","","soulmate");
$add = urlencode($_POST['address']);
$city = urlencode($_POST['city']);
$state = urlencode($_POST['state']);
$country = urlencode($_POST['country']);
$zip = $_POST['zip'];

$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$add.',+'.$city.',+'.$state.',+'.$country.'&sensor=false');

$output= json_decode($geocode); //Store values in variable
 // print_r($output);
if($output->status == 'OK'){ // Check if address is available or not
echo "<div class=\"display_map_details\">";
echo "<br/>";
echo "Latitude : ".$lat = $output->results[0]->geometry->location->lat; //Returns Latitude
echo "<br/>";
echo "Longitude : ".$long = $output->results[0]->geometry->location->lng; // Returns Longitude
echo "<br/>";
echo "Address : ".$loc=$output->results[0]->formatted_address;
echo "</div>";
    $query="insert into `markers` values('$id','$name','$loc',$lat,$long)";
    $result=mysqli_query($db,$query);
    header("location:newhome.php");
}
}
?>
<html>
    <head>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
      <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <script src="js/bootstrap.min.js"></script>
        <style>
            .wrapper 
                {
                    width:70%;
                    
                    height: auto;
                    margin-left: 10%;
                    margin-top: 10%;
                    background-color: #fff;
                    padding: 2%;
        
                }
            body
            {
                background-color: #EFEFEF;
            }
            .map-section
            {
                width: 45%;
            }
            #mapform
            {
                width: 50%;
            }

        </style>
        
    </head>
    <body>
        <div class="wrapper">
            <div class="map-section">
            </div>
    <div id="mapform" class="form-group">
<form class="mapinfo" method="POST" action="#">
<label>Address</label>
<input type="text" id="address" name="address" class="form-control" />
</br>
<label>city</label>
<input type="text" id="city" name="city" class="form-control" />
</br><label>state</label>
<input type="text" id="state" name="state" class="form-control" />
</br><label>country</label>
<input type="text" id="country" name="country" class="form-control" />
</br><label>zip</label>
<input type="text" id="zip" name="zip" class="form-control" />
</br>
<input class="btn btn-primary" type="submit" id="submit" name="submit" />
</form>
</div>
</div>
</body>
</html>

