<?php
Ob_start();
session_start();
$db=mysqli_connect("localhost","root","","soulmate");
$name=$_SESSION['user_name'];
$id=$_SESSION['user_id'];
$query1="select * from `user` where id=$id";
$result1=mysqli_query($db,$query1) or die(mysqli_error($db));
$row=mysqli_fetch_assoc($result1);
$user_gender=$row['sex'];
?>
<!DOCTYPE HTML>
<html>
<head>
	 <title>BlindDate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
         <link rel="stylesheet" href="style(2).css">
         <link rel='stylesheet prefetch' href='jquery-ui-1.11.2/jquery-ui.css'>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="css/bootstrap.min.js"></script>
  <style>
  h2
  {
    color: burlywood;
  }
  body
  {
    background-color: #f0f0f0;
  }
  .dropdown:hover .dropdown-menu {
display: block;
}
.thumbnail
{
    height: 235px;
}

  </style>
</head>

<body>
<div class="container">
  <div class="row" >
    <div class="col-lg-1"></div>
    <div class="col-lg-1" style="padding-top:10px;">
           <a href="#" class="btn btn-info btn-group-sm">
           <span class="glyphicon glyphicon-home"></span> Home
           </a>
    </div>
    <div class="col-lg-1" style="padding-top:10px;">
           <a href="#" class="btn btn-info btn-group-sm">
           <span class="glyphicon glyphicon-envelope"></span> Message
           </a>
    </div>
    <div class="col-lg-2" style="padding-top:10px;">
           <a href="#" class="btn btn-info btn-group-sm">
           <span class="glyphicon glyphicon-exclamation-sign"></span> Notifications
           </a>
    </div>
    <div class="col-lg-4">
           <form class="navbar-form navbar-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Soulmate">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
     </div>
     <div class="col-lg-1" style="padding-top:10px;">
        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Settings
            <span class="caret"></span></button>
          <ul class="dropdown-menu">
              <li><a href="#"><b><?php echo $name; ?></b><br>View Profile </a></li>
              <li><a href="#">Profile Settings</a></li>
              <li><a href="#">Blind Date</a></li>
              <li><a href="#">Logout</a></li>
              </ul>
        </div>
     </div>
     <div class="col-lg-2"></div>
  </div>

  
  <div class="row" style="height:180px; background-color: white;" >
   <div class="well" style="height: 50px;">
    <div class="col-md-2" style="padding-top:10px;"> <img src="2.jpg" class="img-circle" alt="dp" width="120" height="120" /></div>
    <div class="col-md-10"  style="color:#000;padding-top:10px;"  > <div class="page-header"><span><?php echo $name; ?></span></div> <p><div class="row"><div class="col-sm-2"><p>21 yrs | <?php echo $user_gender; ?></p></div ><div class="col-sm-10"><p>The only thing lower than my standards is my self-esteem</p></div></div></p> </div>
  </div>
  </div>
 
  <div class="row">
   <div class="col-md-3" style="background-color: #fff;margin-top:50px;">
   <ul class="nav nav-pills nav-stacked">
    <li ><a href="#">Home</a></li>
    <li><a href="my_profile-2.html">Profile</a></li>
    <li><a href="#">Connections</a></li>
    <li class="active"><a href="#">Blind Date</a></li>
    <li><a href="datebait.htm">Date Bait</a></li>
  </ul>
  </div>
  
  
    <div class="col-md-1">
    </div>
    <div class="col-md-8" style="background-color:#fff; height:400px; margin-top:50px; margin-left:50px;">
    
      <form role="form">
      <div class="wrapper">
       <div class="form-group" style="padding-top: 10px;padding-left: 650px;">
        <label for="sel1">Blind Dates</label><!--
          <select class="form-control" id="sel1" style="width: 100px;">
        
           <option>Male</option>
           <option>Female</option>
       
           </select> --></div>
            <div class="row" >
            <?php
               $query="select * from `user` where id<>$id AND sex<>'$user_gender'";
               $result=mysqli_query($db,$query) or die(mysqli_error($db));
               while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
               {


            ?>
        <div class="col-md-3">
            <div class="thumbnail" >
                <img src="6.jpg" class="img-circle img-thumbnail" />
                <div class="caption">
                     <h4 class=""><?php echo $row['secret_id']; ?></h4>

                    <p class="about">Wanna know me more? Show interest!
                        </p>   <a href="#" class="btn btn-default btn-xs" role="button">More Info</a>

                </div>
            </div>
        </div>
        <?php
      }
        ?>
    </div>
      
        </div>
       </form>
    
    </div>
  </div>
</div>


</body>
</html>