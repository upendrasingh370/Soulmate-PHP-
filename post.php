<?php
$id=20;
$post=$_GET['content'];
$db=mysqli_connect("localhost","root","","soulmate");
$qry="insert into post (user_id,content,created_at,updated_at) values($id,'$post'',time(),time()";
mysqli_query($db,$qry) or die(mysqli_error($db));
echo "great";
?>