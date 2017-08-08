<?php
Ob_start();
$db=mysqli_connect("localhost","root","","soulmate");
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $pass=$_POST['pass'];
     $query="select * from `user` where email='$email' and pass='$pass'";
     $result=mysqli_query($db,$query) or die(mysqli_error($db));
     $row=mysqli_fetch_array($result);
     $count_user=mysqli_num_rows($result);
     var_dump($row['id']);
    if($count_user!=0)
    {
        session_start();
        $_SESSION['user_name']=$row['fname'];
        $_SESSION['user_id']=$row['id'];
        var_dump($_SESSION['user_name']);
        header("location:newhome.php");
    }
    else
    {
        ?>
<h1>
    Your Login credentials appear to be wrong. 
</h1>
<?php
    }
    
}
?>
<html>
    <head>
    </head>
    <body>
        <form method="post">
            <input type="text" name="email">
            <input type="password" name="pass">
            <input type="submit" value="submit" name="submit">
        </form>
    </body>
</html>

