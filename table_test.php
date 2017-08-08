
<?php
$id=2;
$db=mysqli_connect("localhost","root","","soulmate");
 $query2="CREATE TABLE date_".$id."(
        id INT(6) UNSIGNED PRIMARY KEY,
        date_started TIMESTAMP,
        dating_whom INT(5) NOT NULL,
        dates_name VARCHAR(100) NOT NULL,
        date_ended TIMESTAMP
        )";
        mysqli_query($db,$query2) or die(mysqli_error($db));
?>