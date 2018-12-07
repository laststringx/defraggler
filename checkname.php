<?php
require_once('connection.php');

$team_name=$_GET['team_name'];
$a=0;
$result=$mysqli->query("SELECT * FROM `members` where team_name='$team_name'") or die ("databse fetch problem");
if($result->num_rows)
{
echo 'team name is unavailable';
}

?>