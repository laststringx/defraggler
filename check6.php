
<?php
require_once('connection.php');
session_start();
$optimum=8;
$team_name=$_SESSION['team_name'];
	$totalmoves=$_POST['totalmoves'];
	
	$extra=$_POST['extra'];
	$optimal=$_POST['optimal'];
	
echo $totalmoves." ".$extra." ".$optimal;
if ($_POST['action'] == 'submit') {
	$result=$mysqli->query("SELECT string_6 FROM `answer` WHERE id=1") or die ("databse fetch problem");
	while($row=mysqli_fetch_array($result))
	{
		$string=$row['string_6'];
	}
	$result1=$mysqli->query("SELECT total FROM `result` WHERE team_name='$team_name'") or die ("databse fetch problem in result");
	while($row=mysqli_fetch_array($result1))
	{
		$total=$row['total'];
		//echo $string;
	}
	if($string==$_POST['hiddenNodeIds'])
	{
	echo "wow correct";
	//code for points according to number of moves
	$totalmoves=$totalmoves-$optimum;
	if($totalmoves<=0){$points_6=50;}
	else $points_6=50-$totalmoves;
	
	$total+=$points_6;
	$stmt1=$mysqli->prepare("UPDATE result SET points_6=?,total=? WHERE team_name=?");
	$stmt1->bind_param('dds',$points_6,$total,$team_name);
	if($stmt1->execute()){
		echo "rows updated successfully: ".$stmt1->affected_rows;
	}
	
	header('Location:questions.php');
	
// use session variable and question number and number of moves to update database

}
else
	{
	echo "incorrect";
	$points_6=-25;
	
	$stmt1=$mysqli->prepare("UPDATE result SET points_6=? WHERE team_name=?");
	$stmt1->bind_param('ds',$points_6,$team_name);
	if($stmt1->execute()){
		echo "rows updated successfully: ".$stmt1->affected_rows;
	}
	
	header('Location:questions.php');
	}
	
} else if ($_POST['action'] == 'skip') {
    //action for delete

	$tem=$_POST['hiddenNodeIds'];
	

	$stmt1=$mysqli->prepare("UPDATE `match` SET temp_6=? WHERE team_name =?");
	$stmt1->bind_param('ss',$_POST['hiddenNodeIds'],$_SESSION['team_name']);

	if($stmt1->execute()){
	//echo "rows updated successfully: ".$stmt1->affected_rows;
	header('Location:questions.php');
	} 
	else
	{
	echo "update failed";

	}
}

?>