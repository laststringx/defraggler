<?php
 require_once('connection.php');
if($mysqli->connect_errno){

printf("failed to connect to the database");
exit();
}
$stmt1=$mysqli->prepare("INSERT INTO MEMBER(username,password,fname,lname) VALUES (?,?,?,?)");
$stmt1->bind_param('ssss',$_POST['username'],$_POST['password'],$_POST['fname'],$_POST['lname']);

if($stmt1->execute()){
session_start();
$_SESSION['username']=$_POST['username'];
header('Location:home.php');

}
else
{
echo "sign up failed";

}

?>

