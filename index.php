<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>

        <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<style>
.wrapper
{
	height:540px;
}
* {
    box-sizing: border-box;
}
.header-button
{
	color:#000;
	font-size:20px;
	margin-left:30%;
	margin-top:-3.5%;
}
table.header-button tr td
{
	padding-left:20px;
}
</style>
</head>

<body>
<div style="background:url(images/bg-header.png)" class="wrapper">
<div class="row">
<div class="col-lg-2">
</div>
<div class="col-lg-8" style="background-color:#fff; height:90px;">
<img src="../logo.png" style="padding-top:35px;">
<table class="header-button">
<tr>
<td>
<div class="btn btn-primary">
Home
</div>
</td>
<td>
<div class="btn btn-group-xs">
Profiles
</div>
</td>
<td>
<div class="btn btn-group-xs">
Stories
</div>
</td>
<td>
<div class="btn btn-group-xs">
Blog
</div>
</td>
<td>
<div class="btn btn-group-xs">
About
</div>
</td>
<td>
<div class="btn btn-primary">
<a href="login.php">Login</a>
</div>
</td>

</tr>
</table>
</div>
<div class="col-lg-2" style="background:#EDEDED;">
</div>
</div>
<img src="images/image-1.png">
<div class="login-card">
    <h1>SignUp</h1><br>
  <form method="post">
   <input type="text" name="fname" placeholder="First Name">
    <input type="text" name="lname" placeholder="Last Name">
     <input type="email" name="email" placeholder="Email">
    <input type="password" name="pass" placeholder="Password"><h4><b>I am</b>&nbsp;&nbsp;
    Male&nbsp;&nbsp;<input type="radio" value="male" name="sex">&nbsp;&nbsp;
    Female&nbsp;&nbsp;<input type="radio" value="female" name="sex"></h4>
      Birthday:<input type="date" name="dob">
    <input type="submit" name="login" class="login login-submit" value="SignUp">
  </form>
    
  <div class="login-help">
    <a href="#">Register</a> • <a href="#">Forgot Password</a>
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

</div>
</body>
</html>
<?php
ob_start();
session_start();
if(isset($_SESSION['user_id']))
{
    header("location:newhome.php");
}
$db=mysqli_connect("localhost","root","","soulmate");
if(isset($_POST['login']))
{
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $gender=$_POST['sex'];
    $dob=$_POST['dob'];
    $pass=$_POST['pass'];
    $check_query="select * from `user` where email='$email' and pass='$pass'";
    $result=mysqli_query($db,$check_query);
    $count_existing_user=mysqli_num_rows($result);
    if($count_existing_user>0)
    {
        ?>
<h1>An user with that email already exists please try with some other email</h1>
<?php
        
    }
    else
    {
    $query="insert into `user` (fname,lname,email,sex,joined_on,dob,pass) values('$fname','$lname','$email','$gender',now(),now(),'$pass')";
    mysqli_query($db,$query) or die(mysqli_error($db));
        $query="select * from `user` where email='$email' and pass='$pass'";
        $result=mysqli_query($db,$query) or die(mysqli_error($db));
        $row=mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['user_name']=$fname;
        $_SESSION['user_id']=$row['id'];
        header("location:details.php?id=".$row['id']);
    }
    
}
?>

