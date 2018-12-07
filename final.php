

<html><title>Thank You || Defraggler</title><head>


<style>
#d1{ margin-left:30px;width:130px;height:130px;-webkit-transform:rotate(-7deg);-moz-transform:rotate(-7deg);font-size:42px;}
#center{width:900;height:500px;border:2px solid white;margin:auto;border-radius:12px;}


img {width:30%;
	height:30%;}

#header {
    background-color:blue;
    color:white;
    text-align:center;
    padding:5px;
}
#nav {
    height:600px;
    width:300px;
	margin-left:30px;
    float:left;
}
#section {
    width:400px;
    float:left;
    	 	 
}
img{width:55%;
	height:40%;}


th {
    background-color: black;
    color: white;
}
</style>
<link rel="icon" href="favicon.ico" type="image/ico" sizes="48x48">
</head><body style="background:url('img/images.jpg');" >
<div style="float:center;color:#FFF;margin-right:30px;"><center>
<h1>
Thank You for Participating. Have a nice day
</h1><br><br><img style="height:500px; width:500px;" src="img/logo.png"/></center>
</div>
<?php
session_start();
require_once('connection.php');
if(isset($_SESSION['team_name'])){
$team_name=$_SESSION['team_name'];

$timestamp=date("Y-m-d H:i:s");
$stmt1=$mysqli->prepare("UPDATE result SET timestamp=? WHERE team_name=?");
	$stmt1->bind_param('ss',$timestamp,$team_name);
	if($stmt1->execute()){
	session_destroy();
	}
}
?>


</body></html>

