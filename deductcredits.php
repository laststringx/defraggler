<?php
require_once('connection.php');
session_start();
$team_name=$_SESSION['team_name'];
$credits=$_GET['credits'];
//echo $credits;

$result=$mysqli->query("SELECT total FROM `result` WHERE team_name='$team_name'") or die ("databse fetch problem");
while($row=mysqli_fetch_array($result))
{
$total=$row['total'];
}
if($credits<=$total)
{
$total=$total-$credits;
$stmt1=$mysqli->prepare("UPDATE result SET total=? WHERE team_name=?");
	$stmt1->bind_param('ds',$total,$team_name);
	if($stmt1->execute()){
		echo 'You have been awarded '.$credits.' moves&'.$total.'&'.$credits;
	}
	else echo "not done due to errors";
}else 
echo "you don't have enough credits to buy moves &".$total."&0";
?>