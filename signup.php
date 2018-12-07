<?php
 require_once('connection.php');
if($mysqli->connect_errno){

printf("failed to connect to the database");
exit();
}
$stmt1=$mysqli->prepare("INSERT INTO MEMBERS(team_name,college_name,member_1,member_2,password) VALUES (?,?,?,?,?)");
$stmt1->bind_param('sssss',$_POST['team_name'],$_POST['college_name'],$_POST['member_1'],$_POST['member_2'],$_POST['password']);

if($stmt1->execute()){
/*session_start();
$_SESSION['team_name']=$_POST['team_name'];
*/
header('Location:index.php');

}
else
{
echo "sign up failed";

}

?>

