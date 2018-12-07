<?php
require_once('connection.php');
session_start();
if(!isset($_SESSION['username'])){
header('Location:login.php');
}
$post=$_GET['text'];
$stmt1=$mysqli->prepare("INSERT INTO DATA VALUES (?,?)");
$stmt1->bind_param('ss',$_SESSION['username'],$post);

if($stmt1->execute()){
header('Location:home.php');

}
else
{
echo "failed";

}
?>