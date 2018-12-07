<!DOCTYPE html>
<html lang="en">
<?php

$initial_point=100;

?>
<head><link rel="icon" href="favicon.ico" type="image/ico" sizes="48x48">
<script>
function checkTeamName()
{
var xmlhttp;
var k=document.getElementById("team_name").value;
var urls="checkname.php?team_name="+k;
 
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4)
    {
        //document.getElementById("err").style.color="red";
       // document.getElementById("chec").innerHTML=xmlhttp.responseText;
	   var ale=xmlhttp.responseText.toString();
	   if(!ale=='')
 alert(xmlhttp.responseText);
    }
  }
xmlhttp.open("GET",urls,true);
xmlhttp.send();
}
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Code Defraggler</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery.min.js"></script>
	
    <!-- Custom CSS -->
    <link href="css/grayscale.css" rel="stylesheet">
	
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="fonts/font2.css" rel="stylesheet" type="text/css">
    <link href="fonts/font2.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <img src="img/logo.png" height="220" width="220" style="margin-left:5px"></img>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li>
                        <a class="page-scroll" href="#about">Rules</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#download">Registration</a>
                    </li>
                    <li>
						<a class="page-scroll" data-toggle="modal" href="#signin">Sign In</a>
                    </li>
                </ul>

<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><font color=black><center>Log In</center></font></h4>
      </div>
      <div class="modal-body">
        <form action="login_exec.php" method="POST">
          <?php session_start();
		  if(isset($_SESSION['team_name'])){
		  header('Location:questions.php');
		  echo "you are already logged in";
          echo '</div>';
        
      ;}
		
	else {echo '<div class="form-group">
            <label for="team_name" class="control-label"><font color=black><center>Team Name</center></font></label>
            <input type="text" name="team_name" class="form-control" id="message-text">
          </div>
          <div class="form-group">
            <label for="password" class="control-label"><font color=black><center>Password</center></font></label>
            <input type="password" name="password"class="form-control" id="message-text">
          </div>
        
      </div>';}
		  ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">LogIn</button>
      </div></form>
    </div>
  </div>
</div>
</div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
					   <img src="img/neon1.png">
                        <h1 class="brand-heading">EFFULGENCE</h1>
                        <h2> Code Defraggler</h2>
                        <a href="#about" class="btn btn-circle page-scroll">
					
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="sect1 text-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>RULES</h2>
                <ul style="font-size:25px;font-family:verdana;">
				<li>According to problem statement, you will have to arrange the code modules in minimum number of moves to get correct sequence.</li>
                <li>At each problem,You will be provided some optimal moves, submitting before it ends will give you full marks.</li>
				<li>Some extra moves will be given automatically if optimal moves gets over.1 credit point will be deducted on every 1 extra move.</li>
				<li>You can buy moves after consuming all the moves- 10 moves per 10 credits.</li>
				<li>Participant can skip any question,any number of times.</li>
				<li>Do not refresh your page . Doing so,will change code modules arrangement and you may lose your credit points.</li> 
                </ul>
			<a href="#download" class="btn btn-circle page-scroll">
					
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
			</div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="sect text-center">
        <div class="download-section">
            <div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h2>Registration Form</h2>                      
							<form method="post" action="index.php">
<font color="text">
<label for="full_name">Team Name: </label> <input type="text" id="team_name" name="team_name" onblur="checkTeamName()" placeholder="Team name" required/>

<br><br>
<label for="college_name">College Name: </label> <input type="text" name="college_name" placeholder="College Name" required/>
<br><br>
<label for="email">Member1 Name: </label> <input type="text" name="member_1" placeholder="Member1 Name" required/>
<br><br>
<label for="mobile">Member2 Name</label> <input type="text" name="member_2" placeholder="Member2 Name"/>
<br><br>
<label for="password">Password: </label> <input type="password" placeholder="Password" name="password" required/>
<br><br>
<button type="submit" value="submit" class="btn btn-primary" data-toggle="modal" href="#sign_in">Sign Up</button>
</font>
</form>
<?php
 require_once('connection.php');
if($mysqli->connect_errno){

printf("failed to connect to the database");
exit();
}

//inserting members

$stmt1=$mysqli->prepare("INSERT INTO MEMBERS(team_name,college_name,member_1,member_2,password) VALUES (?,?,?,?,?)");
$stmt1->bind_param('sssss',$_POST['team_name'],$_POST['college_name'],$_POST['member_1'],$_POST['member_2'],$_POST['password']);

//inserting row in result

$stmt2=$mysqli->prepare("INSERT INTO result(team_name,total) VALUES (?,?)");
$stmt2->bind_param('sd',$_POST['team_name'],$initial_point);

//inserting row in match
$stmt3=$mysqli->prepare("INSERT INTO `match` (team_name) VALUES (?)");
$stmt3->bind_param('s',$_POST['team_name']);

if($stmt1->execute()&&$stmt2->execute()&&$stmt3->execute()){
require('declare.html');
/*session_start();
$_SESSION['team_name']=$_POST['team_name'];
*/
//header('Location:index.php');
echo '<script>
alert("Registration successful Now you can sign in");
</script>';
}

?>


					</div>
                </div>
            </div>
        </div>
    </section>




    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; Effulgence 2015- Code Defraggler Team</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>
