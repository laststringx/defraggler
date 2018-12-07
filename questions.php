<?php
require_once('connection.php');
session_start();
if(!isset($_SESSION['team_name'])){
header('Location:index.php');
}	
$team_name=$_SESSION['team_name'];


$result=$mysqli->query("SELECT points_1,points_2,points_3,points_4,points_5,points_6,points_7,points_8,points_9,points_10,total FROM `result` WHERE team_name='$team_name'") or die ("databse fetch problem in result fetch");
while($row=mysqli_fetch_array($result))
{
	$points_1=$row['points_1'];
	$points_2=$row['points_2'];
	$points_3=$row['points_3'];
	$points_4=$row['points_4'];
	$points_5=$row['points_5'];
	$points_6=$row['points_6'];
	$points_7=$row['points_7'];
	$points_8=$row['points_8'];
	$points_9=$row['points_9'];
	$points_10=$row['points_10'];
	
	$total=$row['total'];

}
  $res=$mysqli->query("SELECT * from members where team_name='$team_name'");
while($ro=mysqli_fetch_array($res))  
    {
	   $m1=$ro['member_1'];
	   $m2=$ro['member_2'];
	   $clg=$ro['college_name']; 
	}
?>

<html><title>Questions || Defraggler</title><head>


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
<div id="nav">
<table border="2px solid green"
cellspacing="8"
cellpadding="9" 
style="width:80%">
  <tr>
    <th>SCORECARD</th>
  </tr>
  <tr>
    <td style=background-color:white>que.1 : <?php if($points_1<0) echo "0"; else echo $points_1?></td>
  </tr>
  <tr>
    <td style=background-color:white>que.2 : <?php if($points_2<0) echo "0"; else echo $points_2?></td>
   </tr>
  <tr>
    <td style=background-color:white>que.3 : <?php if($points_3<0) echo "0"; else echo $points_3?></td>
     </tr>
  <tr>
   <td style=background-color:white>que.4 : <?php if($points_4<0) echo "0"; else echo $points_4?></td>
</tr>
 <tr>
    <td style=background-color:white>que.5 : <?php if($points_5<0) echo "0"; else echo $points_5?></td>
  </tr>
   <tr>
    <td style=background-color:white>que.6 : <?php if($points_6<0) echo "0"; else echo $points_6?></td>
  </tr>
   <tr>
    <td style=background-color:white>que.7 : <?php if($points_7<0) echo "0"; else echo $points_7?></td>
  </tr>
   <tr>
    <td style=background-color:white>que.8 : <?php if($points_8<0) echo "0"; else echo $points_8?></td>
  </tr>
   <tr>
    <td style=background-color:white>que.9 : <?php if($points_9<0) echo "0"; else echo $points_9?></td>
  </tr>
   <tr>
    <td style=background-color:white>que.10 : <?php if($points_10<0) echo "0"; else echo $points_10?></td>
  </tr>
     <tr>
    <td style=background-color:white>total : <?=$total?></td>
  </tr>
</table>
</div>
<div id="section">
<table cellpadding="10" style="font-size:55px;text-align:center;" ><tr><td >
<div id="d1" style="background:#01A9DB;"><?php
 if($points_1>0)
	{	echo 'Que.1';
	      echo '<img src="img/tick.png">';
   }		  
	elseif($points_1==0)
		echo '<a href="1.php" style="text-decoration:none;">Que.1</a></div></td>';
	else
		{echo 'Que.1';
		  echo '<img src="img/cross.png">';
		}
		?>
<td><div id="d1" style="background:#66FF99;-webkit-transform:rotate(7deg);-moz-transform:rotate(7deg);"><?php if($points_2>0)
	{	echo 'Que.2';
		echo '<img src="img/tick.png">';
	}
	elseif($points_2==0)
		echo '<a href="2.php" style="text-decoration:none;">Que.2</a></div></td>';
	else
		{echo 'Que.2';
		  echo '<img src="img/cross.png">';
		} ?></div></td>
<td><div id="d1" style="background:#F5DA81;-webkit-transform:rotate(-11deg);-moz-transform:rotate(-11deg);"><?php if($points_3>0)
      {		echo 'Que.3';
	     echo '<img src="img/tick.png">';
	}
	elseif($points_3==0)
		echo '<a href="3.php" style="text-decoration:none;">Que.3</a></div></td>';
	else
		{echo 'Que.3';
		  echo '<img src="img/cross.png">';
		}
		?></div></td></tr>
<tr><td><div id="d1" style="background:#F78181;-webkit-transform:rotate(11deg);-moz-transform:rotate(11deg);"><?php if($points_4>0)
	{	echo 'Que.4';
       echo '<img src="img/tick.png">';
	}
	elseif($points_4==0)
		echo '<a href="4.php" style="text-decoration:none;">Que.4</a></div></td>';
	else
		{echo 'Que.4';
		  echo '<img src="img/cross.png">';
		}
		?></td></div>
<td><div id="d1" style="background:#CEF6F5;-webkit-transform:rotate(-5deg);-moz-transform:rotate(-5deg);"><?php if($points_5>0)
		{echo 'Que.5';
     	echo '<img src="img/tick.png">';
	}
	elseif($points_5==0)
		echo '<a href="5.php" style="text-decoration:none;">Que.5</a></div></td>';
	else
		{echo 'Que.5';
		  echo '<img src="img/cross.png">';
		}
		?></div></td>
<td><div id="d1" style="background:#F79F81;-webkit-transform:rotate(8deg);-moz-transform:rotate(8deg);"><?php if($points_6>0)
	{	echo 'Que.6';
	      echo '<img src="img/tick.png">';
	}
	elseif($points_6==0)
		echo '<a href="6.php" style="text-decoration:none;">Que.6</a></div></td>';
	else
		{echo 'Que.6';
		  echo '<img src="img/cross.png">';
		}
		?></div></td></tr>
<tr><td><div id="d1" style="background:#F5D0A9;"><?php if($points_7>0)
	{	echo 'Que.7';
	echo '<img src="img/tick.png">';
	}
	elseif($points_7==0)
		echo '<a href="7.php" style="text-decoration:none;">Que.7</a></div></td>';
	else
		{echo 'Que.7';
		  echo '<img src="img/cross.png">';
		}?></td></div>
<td><div id="d1"  style="background:#F781F3;-webkit-transform:rotate(11deg);-moz-transform:rotate(11deg);"><?php if($points_8>0)
	{	echo 'Que.8';
	echo '<img src="img/tick.png">';
	}
	elseif($points_8==0)
		echo '<a href="8.php" style="text-decoration:none;">Que.8</a></div></td>';
	else
		{echo 'Que.8';
		  echo '<img src="img/cross.png">';
		}?></div></td>
<td><div id="d1" style="background:#81F7D8"><?php if($points_9>0)
	{	echo 'Que.9';
	echo '<img src="img/tick.png">';
	}
	elseif($points_9==0)
		echo '<a href="9.php" style="text-decoration:none;">Que.9</a></div></td>';
	else
		{echo 'Que.9';
		  echo '<img src="img/cross.png">';
		}?></div></td></tr>
<tr><td></td></div><td><div id="d1" style="background:#8181F7"><?php if($points_10>0)
     {		echo 'Que.10';
	echo '<img src="img/tick.png">';
	}
	elseif($points_10==0)
		echo '<a href="10.php" style="text-decoration:none;">Que.10</a></div></td>';
	else
		{echo 'Que.10';
		  echo '<img src="img/cross.png">';
		}?></div></td><td></td></tr>


</table>
</div>
<div style="float:right;color:#FFF;margin-right:30px;">
<h2>Team Name :<?php echo $_SESSION['team_name'];?></h2>
<h2>First Member:<?=$m1?></h2>
<h2>Second Member:<?=$m2?></h2>
<h2>College Name:<?=$clg?></h2>
<h2>Total Points:<?=$total?></h2>
<a href="logout.php"><button style="border-radius:2px;background:blue;color:#FFF;height:40px;">LOG ME OUT</button> </a>
<a href="final.php" ><button style="border-radius:2px;background:blue;color:#FFF;height:40px;">FINAL SUBMITION</button> </a>

</div>
</body></html>

