<?php
	//Start session

 
	//Include database connection details
	require_once('connection.php');
 $result1=$mysqli->query("SELECT timestamp FROM result WHERE team_name='{$_POST['team_name']}'") or die ("databse fetch problem");
while($row=mysqli_fetch_array($result1))
{
$timestamp=$row['timestamp'];
}
$team_name=$_POST["team_name"];
if($timestamp!=null){
header('Location:already.php?q='.$team_name);
exit();
}
	//Create query

	$result=$mysqli->query("SELECT team_name,password FROM MEMBERS WHERE team_name='{$_POST['team_name']}'") or die ("databse fetch problem");
while($row=mysqli_fetch_array($result)){
if($row['team_name']==$_POST['team_name']&&$row['password']==$_POST['password']){
 //set the user session

	session_start();
	$_SESSION['team_name']=$_POST['team_name'];
            //redirect to home
            header('Location: questions.php');}
else {echo '<script>alert("Login failed");
window.location = "/defrag2/index.php";
</script>';




}
		}

?>