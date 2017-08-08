<?php
Ob_start();
@session_start();
$id=$_SESSION['user_id'];
$db=mysqli_connect("localhost","root","","soulmate");
if(isset($_POST['next']))
{
   // $name=$_SESSION['user_name'];
    $gender=$_POST['interest_gender'];
    $body_build=$_POST['build'];
    $feet=$_POST['feet'];
    $inch=$_POST['inch'];
    $hair_color=$_POST['hair-color'];
    $tatoo=$_POST['tatto'];
    $glasses=$_POST['glasses'];
    $piercing=$_POST['piercing'];
    $employement=$_POST['employement'];
    $food=$_POST['food'];
    $code=$_POST['bdate_id'];
    $query="insert into `user_details` values($id, '$gender','$body_build',$feet,$inch,'$hair_color',$tatoo,$glasses,$piercing,'$employement','$food')";
    $result=mysqli_query($db,$query) or die(mysqli_error($db));
    $query1="UPDATE `user` set secret_id='$code' where id=$id";
    $result1=mysqli_query($db,$query1) or die(mysqli_error($db));
    $query2="CREATE TABLE date_".$id."(
        id INT(6) UNSIGNED PRIMARY KEY,
        date_started TIMESTAMP,
        dating_whom INT(5) NOT NULL,
        dates_name VARCHAR(100) NOT NULL,
        date_ended TIMESTAMP
        )";
        mysqli_query($db,$query2) or die(mysqli_error($db));
        header("location:partner_details.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet prefetch" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/Croppie-master/Croppie-master/croppie.css">
        <script type="text/javascript" src="Croppie-master/Croppie-master/croppie.js"></script>
        	<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<meta name="description" content="Learn how to resize images using JavaScript and the HTML5 Canvas element using controls, commonly seen in photo editing applications." />
		<meta name="keywords" content="canvas, javascript, HTML5, resizing, images" />
		<meta name="author" content="Codrops" />
	
        <style>
            body
            {
                background: #ECECEC;
            }
            .wrapper
                {
                    background-color: #fff;
                    width:80%;
                    height:auto;
                    margin-left:10%;
                    margin-top: 10%;
                }
            .image-section
            {
                margin-top: 5%;
                width:40%;
                height: auto;
            }
            .details-section
            {
                padding-top: 3%;
                margin-top: 5%;
                width: 60%;
                height: auto;
                margin-left: 5%;
                padding-bottom: 2%;
            }
            .height
            {
                width: 10%;
                border-radius: 2px;
                height: 4%;
            }
        </style>
        <script>
            $('#item').croppie(opts);
// call a method via jquery
$('#item').croppie(method, args);
        </script>
    </head>
    <body>
        <div class="wrapper">
            
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="image-section">
                    <!-- the image crop section -->
                    
                  
                    
                    <!-- the end of image crop section -->
                </div>
                <div class="details-section">
                <div class="form-group">
                <label for="interest_gender">Interested In:</label>
                <select name="interest_gender" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
                </select>
                </div>
                
                 <div class="form-group">
                 <label for="build">Body Build:</label>
                <select name="build" class="form-control">
                <option value="-1">--Select--</option>
                <option value="overweight">Overweight</option>
                <option value="average">Average</option>
                <option value="slim">Slim</option>
                <option value="athletic">Athletic</option>
                </select>
                </div>
                    <div class="form-group">
                        <label>Height:</label>
                        <input type="number" name="feet" class="height">
                        <input type="number" name="inch" class="height">
                    </div>
                    <div class="form-group">
                        <label for="hair-color">Hair Color</label>
                        <select name="hair-color" class="form-control">
                            <option value="black">Black</option>
                            <option value="brown">Brown</option>
                            <option value="red">Red</option>
                            <option value="blonde">Blonde</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tatto">Tatto</label>
                        Yes<input type="radio" name="tatto" value="1" >
                        No<input type="radio" name="tatto" value="0" >
                    </div>
                    <div class="form-group">
                        <label for="glasses">Glasses?</label>
                        Yes<input type="radio" name="glasses" value="1" >
                        No<input type="radio" name="glasses" value="0" >
                    </div>
                    <div class="form-group">
                        <label for="glasses">Piercing?</label>
                        Yes<input type="radio" name="piercing" value="1" >
                        No<input type="radio" name="piercing" value="0" >
                    </div>
                    <div class="form-group">
                        <label for="employment">Employement:</label>
                        <select name="employement" class="form-control">
                            <option value="-1">--Select--</option>
                            <option value="student">Student</option>
                            <option value="unemployed">Unemployed</option>
                            <option value="arts">Arts</option>
                            <option value="self employed">Self Employed</option>
                            <option value="technology">Technology</option>
                            <option value="finance">Finance</option>
                            <option value="lawyer">Lawyer</option>
                            <option value="doctor">Doctor</option>
                            <option value="banking">Banking</option>
                            <option value="marketing">Marketing</option>
                           
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="food">Favourate food:</label>
                            <select name="food" class="form-control">
                                <option value="-1">--Select--</option>
                                <option value="chinese">Chinese</option>
                                <option value="continental">Continental</option>
                                <option value="south indian">South Indian</option>
                                <option value="north indian">North Indian</option>
                                <option value="italian">Italian</option>
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="bdate_id">
                           What would you like to be called for your blind date? 
                        </label>
                        <input type="text" name="bdate_id" class="form-control">
                    </div>
                    <input type="submit" name="next" value="next" class="btn btn-lg btn-primary">
                </div>
            </form>
        </div>
    </body>
</html>
