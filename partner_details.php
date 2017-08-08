<?php
ob_start();
session_start();
$id=$_SESSION['user_id'];
if(isset($_POST['next']))
{
    $db=mysqli_connect("localhost","root","","soulmate");
    $build=$_POST['build'];
    $hair=$_POST['hair-color'];
    $tatoo=$_POST['tatto'];
    $glasses=$_POST['glasses'];
    $piercing=$_POST['piercing'];
    $query="insert into `preference` values($id,'$build','$hair',$tatoo,$glasses,$piercing)";
    $result=mysqli_query($db,$query) or die(mysqli_error($db));
    header("location:mapdemo.php");
    $query2="CREATE TABLE blind_date_".$id."(
        bl_id INT(6) UNSIGNED PRIMARY KEY,
        visibility INT(2) UNSIGNED,
        bl_date_started TIMESTAMP,
        bl_dating_whom INT(5) NOT NULL,
        bl_dates_code VARCHAR(100) NOT NULL,
        bl_date_ended TIMESTAMP
        )";
        mysqli_query($db,$query2) or die(mysqli_error($db));
    header("location:mapdemo.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/Croppie-master/Croppie-master/croppie.css">
        <script type="text/javascript" src="Croppie-master/Croppie-master/croppie.js"></script>
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
    </head>
    <body>
        <div class="wrapper">
            
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="image-section">
                </div>
                <div class="details-section">
                
                 <div class="form-group">
                 <label for="build">What type of bodybuild you would like your partner to have?</label>
                <select name="build" class="form-control">
                <option value="-1">--Select--</option>
                <option value="overweight">Overweight</option>
                <option value="average">Average</option>
                <option value="slim">Slim</option>
                <option value="athletic">Athletic</option>
                </select>
                </div>
                    <div class="form-group">
                        <label for="hair-color">Preferred Hair Color:</label>
                        <select name="hair-color" class="form-control">
                            <option value="black">Black</option>
                            <option value="brown">Brown</option>
                            <option value="red">Red</option>
                            <option value="blonde">Blonde</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tatto">Are you ok with your partner having tatto?</label>
                        Yes<input type="radio" name="tatto" value="1" >
                        No<input type="radio" name="tatto" value="0" >
                    </div>
                    <div class="form-group">
                        <label for="glasses">Are you ok with your partner having glasses?</label>
                        Yes<input type="radio" name="glasses" value="1" >
                        No<input type="radio" name="glasses" value="0" >
                    </div>
                    <div class="form-group">
                        <label for="glasses">Are you ok with your partner having piercing?</label>
                        Yes<input type="radio" name="piercing" value="1" >
                        No<input type="radio" name="piercing" value="0" >
                    </div>
                        
                    <input type="submit" name="next" value="next" class="btn btn-lg btn-primary">
                </div>
            </form>
        </div>
    </body>
</html>
