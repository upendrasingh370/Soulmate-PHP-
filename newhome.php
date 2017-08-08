<?php
Ob_start();
session_start();
$name=$_SESSION['user_name'];
$id=$_SESSION['user_id'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="menu.js"></script>
    <script>
        function ajaxRequest()
        {
         var request = null;

   try {
     request = new XMLHttpRequest();
   } catch (trymicrosoft) {
     try {
       request = new ActiveXObject("Msxml2.XMLHTTP");
     } catch (othermicrosoft) {
       try {
         request = new ActiveXObject("Microsoft.XMLHTTP");
       } catch (failed) {
         request = null;
       }
     }
   }

   if (request == null)
     alert("Error creating request object!");
        
          ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('ajaxDiv');
         ajaxDisplay.innerHTML = ajaxRequest.responseText;
      }
          }
          
          
          var post=document.getElementById('post').value;
              
            var querystring="?content="+post;
            
            request.open("GET", "post.php"+querystring, true);
            
            request.send(null);
      }
    </script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<link rel="stylesheet prefetch" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/newhome.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
</head>
<body style="background-color: #F0F0F0">
<div class="wrapper">
	<div class="top-menu-bar-wrapper">
	<ul class="menu-nav">
		    <li><a href="#"><i class="fa fa-home"></i><span>  </span>Home</a></li>
		    <li><a href="#"><i class="fa fa-bell-o"></i><span>  </span>Notification</a></li>
		    <li><a href="#"><i class="fa fa-envelope"></i><span>  </span>Messages</a></li>
	</ul>
	<div class="top-search-bar">
	<input type="text" name="search" class="search-box" placeholder="search soulmate">
        <div class="btn btn-sm"><i class="fa fa-search"></i></div>
	</div>
        <div class="col-lg-1" style="padding-top:10px; float:right;">
        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Settings
            <span class="caret"></span></button>
          <ul class="dropdown-menu">
              <li><a href="#"><b>Upendra Singh</b><br>View Profile </a></li>
              <li><a href="#">Profile Settings</a></li>
              <li><a href="#">Blind Date</a></li>
              <li><a href="#">Logout</a></li>
              </ul>
        </div>
     </div>
	</div>

	<!--three divisions -->
	<div class="three-box-wrapper">
	
	<div class="left-wrapper">
		<div class="detail-box">
			<div class="cover">
				<img src="images/banner-3.jpg" class="cover-img">
			</div>
			<div class="lower-half-detail-box">
				<div class="dp-outer">
					<img src="profile-pic.jpg" class="dp-img">
				</div>
			
				<div class="user-details-1">
					<?php echo $name; ?>
				</div>
				<ul class="detail-box-details">
				<li>
					ONLINE&nbsp;&nbsp;&nbsp;&nbsp;
				</li>
				<li>
					DATES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</li>
				<li>
					PENDING
				</li>
				</ul>
				<ul class="detail-box-details-2">
				<li>
					12
				</li>
				<li>
					13
				</li>
				<li>
					14
				</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="middle-wrapper">
		<div class="post-box">
            <div id="ajaxDiv">
            </div>
            <div class="post">
                <textarea cols="80" rows="4" id="post"></textarea>
                <button class="btn btn-success" onClick="ajaxRequest();">Post</button>
                <button class="btn btn-primary">Share image</button>
            </div>
            
			<div class="post">
				<div class="post-owner">
					<div class="owner-image">
						<img src="images/profile-pic.jpg" width="45px" height="45px">
					</div>
					Upendra Singh
				</div>
				<img class="post-img" src="images/banner-3.jpg">
				<hr>
				<div class="post-footer">
				<ul class="detail-box-details-3">
				<li>
				<i class="fa fa-thumbs-up"></i>Like
				</li>
				<li>
				<i class="fa fa-thumbs-down"></i>Dislike
				</li>
				<li>
				<a href="#"><i class="fa fa-comment"></i>Comment</a>
				</li>
				<li>
				<i class="fa fa-share-square-o"></i>Repost
				</li>
				</ul>
                    <hr>
				<div class="footer-comment">
                    
						<img src="profile-pic.jpg" width="45px" height="46px" class="comment-image">
                        
					
				<textarea name="comment" class="comment-box"></textarea>
				</div>
				</div>
			</div>


			<div class="post">
				<div class="post-owner">
					<div class="owner-image">
						<img src="images/profile-pic.jpg" width="45px" height="45px">
                        
					</div>
                    <div style="margin-top:-20px; display:inline;">Upendra Singh</div>
					
				</div>
				<img class="post-img" src="banner-3.jpg">
				<hr>
				<div class="post-footer">
				<ul class="detail-box-details-3">
				<li>
				<i class="fa fa-thumbs-up"></i>Like
				</li>
				<li>
				<i class="fa fa-thumbs-down"></i>Dislike
				</li>
				<li>
				<a href="#"><i class="fa fa-comment"></i>Comment</a>
				</li>
				<li>
				<i class="fa fa-share-square-o"></i>Repost
				</li>
				</ul>
				<hr>
				<div class="footer-comment">
                    
						<img src="profile-pic.jpg" width="45px" height="46px" class="comment-image">
                        
					
				<textarea name="comment" class="comment-box"></textarea>
				</div>
				</div>
			</div>
		</div>
	</div>
	<div class="right-wrapper">
        <div class="right-pan">
            <div class="right-pan-box">
                <div class="header">
                    Who to date
                </div>
                <?php
                $db=mysqli_connect("localhost","root","","soulmate");
                $query1="select * from `user_details` where id=".$id;
                $result1=mysqli_query($db,$query1) or die(mysqli_error($db));
                $row=mysqli_fetch_assoc($result1);
                $user_food=$row['food'];
                $user_p_gender=$row['interest'];
                $query2="select * from `preference` where id='$id'";
                $result2=mysqli_query($db,$query2) or die(mysqli_error($db));
                $row=mysqli_fetch_array($result2);
               
                $user_p_build=$row['build'];
                $user_p_hair=$row['hair_color'];
                $user_p_tatto=$row['tatoo'];
                $user_p_glasses=$row['glasses'];
                $user_p_piercing=$row['piercing'];
                $query3="select * from `markers` where id='$id'";
                $result3=mysqli_query($db,$query3) or die(mysqli_error($db));
                $row=mysqli_fetch_array($result3);
                $user_lng=$row['lng'];
                $user_lat=$row['lat'];
                $query4="select * from `user_details` where id<>$id and interest<>'$user_p_gender'";
                $result4=mysqli_query($db,$query4) or die(mysqli_error($db));
                $score=array();
                $points=0;
                while($row=mysqli_fetch_array($result4))
                {
                    $points=0;
                    $query5="select * from `user_details` where id=".$row['id'];
                    $result5=mysqli_query($db,$query5) or die(mysqli_error($db));
                    $row5=mysqli_fetch_array($result5);
                    if($row5['food']==$user_food)
                    {
                        $points+=1;
                    }
                    if($row['build']==$user_p_build)
                    {
                        $points=$points+1;
                    }
                    if($row['hair_color']==$user_p_hair)
                    {
                        $points+=1;
                    }
                    if($row['tatto']==$user_p_tatto)
                    {
                        $points+=1;
                    }
                    if($row['glasses']==$user_p_glasses)
                    {
                        $points+=1;
                    }
                    $score[$row['id']]=$points;
                    echo "<br>";
                   
                }
                krsort($score);
               /* foreach($score as $key=>$keys)
                {
                    echo $key."<br>";
                }*/
                $keys = array_keys($score);
                $count=0;
                foreach($keys as $value)
                {
                    if($count<3)
                    {     
                        $query6="select * from `user` where id='$value'";
                        $result6=mysqli_query($db,$query6) or die(mysqli_error($db));
                        $row6=mysqli_fetch_array($result6);
                ?>
                <div class="date-suggestions">
                   <img src="images/profile-pic.jpg" width="49px"  height="50px" class="suggest-image">
                    <h5 style=" display:inline;">
                        &nbsp;<?php echo $row6['fname']; ?>
                    </h5>
                </div>
                <?php
                      
                        $count++; 
                    }
                    else
                    {
                        break;
                    }
                }
                        ?>
                <br>
                <br>
                <div class="all_suggestions"><a href="#">View All Suggestions</a></div>
            </div>
        </div>
    
        </div>
	</div>
</div>
</body>
</html>