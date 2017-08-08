<html>
<head>
<script language="javascript" type="text/javascript">
function ajaxFunction()
{
var ajaxRequest;
try{
	ajaxRequest=new XMLHttpRequest();
}
catch(e)
{
	try{ 
	ajaxRequest=new ActiveXObject("Msxml2.XMLHTTP");
	}
catch(e)
{
	try{
		ajaxRequest=new ActiveXObject("Microsoft.XMLHTTP");
}
catch(e)
{
	alert("some error occur!");
	return False;
}
}
}
ajaxRequest.onreadystatechange=function()
{
	if(ajaxRequest.readyState==4)
	{
		var ajaxDisplay=document.getElementById('DisplayDiv');
		ajaxDisplay.innerHTML=ajaxRequest.responseText;
}
else
	ajaxDisplay.innerHTML="Error:"+ajaxRequest.statusText;
}
var id=document.getElementById('id').value;
var querystring ="?id="+id;
ajaxRequest.open("GET","getdata.php"+querystring,true);
ajaxRequest.send(null);
}
</script>
</head>
<body>
<form method="GET" name="ajax">
<input type="text" onkeyup="ajaxFunction()" id="id" style="width:32%;">
<input type="submit" onClick="ajaxFunction()" value="search">
</form>
<div id="DisplayDiv" style="margin-top:-14px; border:1px solid #CCC; width:32%;">
</div>
</body>
</html>