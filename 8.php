<!DOCTYPE html>
<html >
  <head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/question.css">
	<?php
	
session_start();
if(!isset($_SESSION['team_name'])){
header('Location:index.php');
}	
  require_once('connection.php');
$team_name=$_SESSION['team_name'];

// points fetch
$result=$mysqli->query("SELECT points_8,total FROM `result` WHERE team_name='$team_name'") or die ("databse fetch problem");
while($row=mysqli_fetch_array($result))
{
	$points_8=$row['points_8'];
	$total=$row['total'];
}
	?>
	<script type="text/javascript">
	var offsetYInsertDiv = -3; // Y offset for the little arrow indicating where the node should be inserted.
	if(!document.all)offsetYInsertDiv = offsetYInsertDiv - 7; 	// No IE


	var arrParent = false;
	var arrMoveCont = false;
	var arrMoveCounter = -1;
	var arrTarget = false;
	var arrNextSibling = false;
	var leftPosArrangableNodes = false;
	var widthArrangableNodes = false;
	var nodePositionsY = new Array();
	var nodeHeights = new Array();
	var arrInsertDiv = false;
	var insertAsFirstNode = false;
	var arrNodesDestination = false;
	
	function cancelEvent()
	{
		return false;
	}
	function getTopPos(inputObj)
	{
		
	  var returnValue = inputObj.offsetTop;
	  while((inputObj = inputObj.offsetParent) != null){
	  	returnValue += inputObj.offsetTop;
	  }
	  return returnValue;
	}
	
	function getLeftPos(inputObj)
	{
	  var returnValue = inputObj.offsetLeft;
	  while((inputObj = inputObj.offsetParent) != null)returnValue += inputObj.offsetLeft;
	  return returnValue;
	}
		
	function clearMovableDiv()
	{
		if(arrMoveCont.getElementsByTagName('LI').length>0){
			if(arrNextSibling)arrParent.insertBefore(arrTarget,arrNextSibling); else arrParent.appendChild(arrTarget);			
		}
		
	}
function clickCounter()
{
localStorage.total8=Number(localStorage.total8)+1;
  if (localStorage.clickcount8>0)  //sessionStorage say tab close karnay prr reset hojayga
    {
    localStorage.clickcount8=Number(localStorage.clickcount8)-1;
	 document.getElementById("result").innerHTML="optimal number of initial moves(for full credits): "+localStorage.clickcount8;
    }
   else
    {
	if(localStorage.extra8>0)
	{
	 localStorage.extra8=Number(localStorage.extra8)-1;
document.getElementById("result").innerHTML="extra number of moves(less credits) "+localStorage.extra8;
}
if(localStorage.extra8<=0)
 {


}
}
}
	
	var request;
function creditsDeduct(v)
{
//var v=document.getElementById("buy1").value;
var url="deductcredits.php?credits="+v;

if(window.XMLHttpRequest){
request=new XMLHttpRequest();
}
else if(window.ActiveXObject){
request=new ActiveXObject("Microsoft.XMLHTTP");
}

try{
request.onreadystatechange=getInfo;
request.open("GET",url,true);
request.send();
}catch(e){alert("Unable to connect to server");}
}

function getInfo(){
if(request.readyState==4){
var val=request.responseText;
var vall=val.split("&");
var v=parseInt(vall[2]);
//buy localstorage
localStorage.extra8=Number(localStorage.extra8)+v;


alert(vall[0]);
document.getElementById('numberofcredits').innerHTML="You have "+vall[1]+" credits";
document.getElementById('numberofcredits1').innerHTML="You have "+vall[1]+" credits";


	var optimal = localStorage.getItem('clickcount8');
	document.getElementById("optimal").value=optimal;
	var extra = localStorage.getItem('extra8');
	document.getElementById("extra").value=extra;
	if(optimal>0)
		document.getElementById("result").innerHTML="opimal number of initial moves\(for full credits\): "+optimal;
		else 
		document.getElementById("result").innerHTML="extra number of moves\(less credits\): "+extra;

if(extra>0) 
{
$("#credit").hide();
}


}
}
	function initMoveNode(e)
	{
		clearMovableDiv();
		if(document.all)e = event;
		arrMoveCounter = 0;
		arrTarget = this;
		if(this.nextSibling)arrNextSibling = this.nextSibling; else arrNextSibling = false;
		timerMoveNode();
		arrMoveCont.parentNode.style.left = e.clientX + 'px';
		arrMoveCont.parentNode.style.top = e.clientY + 'px';
		
	return false;
		
	}
	function timerMoveNode()
	{
		if(arrMoveCounter>=0 && arrMoveCounter<10){
			arrMoveCounter = arrMoveCounter +1;
			setTimeout('timerMoveNode()',20);
		}
		if(arrMoveCounter>=10){
			arrMoveCont.appendChild(arrTarget);
		}
		
	}
		
	function arrangeNodeMove(e)
	{
	var extra = localStorage.getItem('extra8');
	
		if(extra<=0)
		{
		//button display 
		document.getElementById("credit").style.display='block';
		
		return;//enter the function
		}
		
		if(document.all)e = event;
		if(arrMoveCounter<10)return;
		if(document.all && arrMoveCounter>=10 && e.button!=1 && navigator.userAgent.indexOf('Opera')==-1){
			arrangeNodeStopMove();
		}
		
		arrMoveCont.parentNode.style.left = e.clientX + 'px';
		arrMoveCont.parentNode.style.top = e.clientY + 'px';	
		
		var tmpY = e.clientY;
		arrInsertDiv.style.display='none';
		arrNodesDestination = false;
		

		if(e.clientX<leftPosArrangableNodes || e.clientX>leftPosArrangableNodes + widthArrangableNodes)return; 
			
		var subs = arrParent.getElementsByTagName('LI');
		for(var no=0;no<subs.length;no++){
			var topPos =getTopPos(subs[no]);
			var tmpHeight = subs[no].offsetHeight;
			
			if(no==0){
				if(tmpY<=topPos && tmpY>=topPos-5){
					arrInsertDiv.style.top = (topPos + offsetYInsertDiv) + 'px';
					arrInsertDiv.style.display = 'block';				
					arrNodesDestination = subs[no];	
					insertAsFirstNode = true;
					return;
				}				
			}
			
			if(tmpY>=topPos && tmpY<=(topPos+tmpHeight)){
				arrInsertDiv.style.top = (topPos+tmpHeight + offsetYInsertDiv) + 'px';
				arrInsertDiv.style.display = 'block';				
				arrNodesDestination = subs[no];
				insertAsFirstNode = false;
				return;
			}				
		}
		
	}
	
	function arrangeNodeStopMove()
	{
	
		arrMoveCounter = -1; 
		arrInsertDiv.style.display='none';
		
		if(arrNodesDestination){
			var subs = arrParent.getElementsByTagName('LI');
			if(arrNodesDestination==subs[0] && insertAsFirstNode){
				arrParent.insertBefore(arrTarget,arrNodesDestination);		
			}else{
				if(arrNodesDestination.nextSibling){
					arrParent.insertBefore(arrTarget,arrNodesDestination.nextSibling);
				}else{
					arrParent.appendChild(arrTarget);
				}
			}
			clickCounter();
		}		
		
		arrNodesDestination = false;
		clearMovableDiv();
	}		
	
	function saveArrangableNodes()
	{
	
	var total = localStorage.getItem('total8');
	document.getElementById("totalmoves").value=total;
	var optimal = localStorage.getItem('clickcount8');
	document.getElementById("optimal").value=optimal;
	var extra = localStorage.getItem('extra8');
	document.getElementById("extra").value=extra;
	
	
	
		var nodes = arrParent.getElementsByTagName('LI');
		var string = "";
		for(var no=0;no<nodes.length;no++){
			//if(string.length>0)string = string;
			string = string + nodes[no].id;		
		}
		
		document.forms[0].hiddenNodeIds.value = string;
		
		// Just for testing
		//document.getElementById('arrDebug').innerHTML = 'Ready to save these nodes:<br>' + string.replace(/,/g,',<BR>');	
		
		// document.forms[0].submit(); // Remove the comment in front of this line when you have set an action to the form.
		
	}
	
	function initArrangableNodes()
	{
	document.getElementById("credit").style.display='none';
	
	
		arrParent = document.getElementById('arrangableNodes');
		arrMoveCont = document.getElementById('movableNode').getElementsByTagName('UL')[0];
		arrInsertDiv = document.getElementById('arrDestInditcator');
		
		document.getElementById("A").innerHTML='<div id="box"><img src="images/8/A.png"></div>';
		document.getElementById("B").innerHTML='<div id="box"><img src="images/8/B.png"></div>';
		document.getElementById("C").innerHTML='<div id="box"><img src="images/8/C.png"></div>';
		document.getElementById("D").innerHTML='<div id="box"><img src="images/8/D.png"></div>';
		document.getElementById("E").innerHTML='<div id="box"><img src="images/8/E.png"></div>';
		document.getElementById("F").innerHTML='<div id="box"><img src="images/8/F.png"></div>';
		document.getElementById("G").innerHTML='<div id="box"><img src="images/8/G.png"></div>';
		document.getElementById("H").innerHTML='<div id="box"><img src="images/8/H.png"></div>';
		
		
	var optimal = localStorage.getItem('clickcount8');
	document.getElementById("optimal").value=optimal;
	var extra = localStorage.getItem('extra8');
	document.getElementById("extra").value=extra;
	if(optimal>0)
		document.getElementById("result").innerHTML="opimal number of initial moves\(for full credits\): "+optimal;
		else 
		document.getElementById("result").innerHTML="extra number of moves\(less credits\): "+extra;

		
		leftPosArrangableNodes = getLeftPos(arrParent);
		arrInsertDiv.style.left = leftPosArrangableNodes - 5 + 'px';
		widthArrangableNodes = arrParent.offsetWidth;
		
		var subs = arrParent.getElementsByTagName('LI');
		for(var no=0;no<subs.length;no++){
			subs[no].onmousedown = initMoveNode;
			subs[no].onselectstart = cancelEvent;	
		}
	
		document.documentElement.onmouseup = arrangeNodeStopMove;
		document.documentElement.onmousemove = arrangeNodeMove;
		document.documentElement.onselectstart = cancelEvent;
		
	}	
	
	
	window.onload = initArrangableNodes;
	
	</script>
  
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Question.8 || Defraggler</title>
    
    
   
</head>
<body><font color="black">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Defraggler || Question-8</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
	  <div id="modal1" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times </button>
                    <h4 class="modal-title">Question description</h4>
                </div>
                <div class="modal-body">
				
				<p> Maximum points for correct answer : 75<br>
				<br>Number of optimal moves : 6<br><br>
				Number of extra moves : 5<br><br>
				Write the output of the question. <br><br>
				Credits will only be awarded if both the sequence and the output is correct.<br><br>
				if you want to undo the sequence that was last skipped <br>
				just refresh the page but your moves will not be refunded.<br><br>
				Attention the output is case sensitive.
				
				</p>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    
                </div>
				</div>
            </div>
        </div>

		<ul class="nav navbar-nav">
        <li><a class="page-scroll" href="#modal1" data-toggle="modal" >Description of Question</a></li>
        <li><a id="numberofcredits1"  value="<?=$total?>">You have <span class="badge"> <?=$total?> </span> credits</a></li>
		<li><a class="page-scroll" >Team name : <?=$team_name?></a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
<div >
<div style="float:left;">

<?php

if($points_8!=0)
{
echo '<script type="text/javascript">window.location.href="questions.php";</script>';
exit();
}

$result=$mysqli->query("SELECT temp_8 FROM `match` WHERE team_name='$team_name'") or die ("databse fetch problem");
while($row=mysqli_fetch_array($result))
{

	$string=$row['temp_8'];
	$arr1 = str_split($string);
//echo $string;
	}

?>
<ul id="arrangableNodes">
	<li id="<?=$arr1[0]?>"></li>
	<li id="<?=$arr1[1]?>"></li>
	<li id="<?=$arr1[2]?>"></li>
	<li id="<?=$arr1[3]?>"></li>
	<li id="<?=$arr1[4]?>"></li>
	<li id="<?=$arr1[5]?>"></li>
	<li id="<?=$arr1[6]?>"></li>
	<li id="<?=$arr1[7]?>"></li>
	
</ul>
	
<div id="movableNode"><ul></ul></div>	
<div id="arrDestInditcator"><img src="images/insert.gif"></div>
<div id="arrDebug"></div>
<form method="post" action="check8.php">
	<input type="hidden" name="hiddenNodeIds">
	<input type="hidden" name="totalmoves" id="totalmoves">
	Output : <input type="text" name="output" id="output"/>
	<input type="hidden" name="optimal" id="optimal">
<input type="hidden" name="extra" id="extra">

	<div id="result"></div>

	
	<input type="submit" class="btn btn-primary" name="action" onclick="saveArrangableNodes()" value="submit"/>
	<input type="submit" class="btn btn-primary" name="action" onclick="saveArrangableNodes()" value="skip"/>
</form>
	<div class="bs-example">
    <!-- For Credit -->
<button id="credit" class="btn btn-primary" data-toggle="modal" data-target="#largeModal">Buy Moves</button>
 
    <div id="largeModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header"><?php
				
$result=$mysqli->query("SELECT total FROM `result` WHERE team_name='$team_name'") or die ("databse fetch problem");
while($row=mysqli_fetch_array($result))
{
	$total=$row['total'];
}
				?>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                    <h4 id="numberofcredits" value="<?=$total?>" class="modal-title">You have <?=$total?> credits</h4>
                </div>
                <div class="modal-body">
				<?php 
				if($total>=10) echo '<button type="button" id="buy1" onclick="creditsDeduct(10)" class="btn btn-primary">Buy 10 moves</button>&nbsp&nbsp';
				echo '';
				
			
				?>
				
				
				
				
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div><pre id="question_css">
A palindrome is a string that can be read as same from both left and right side.
Shikha loves palindrome and requested her friend Ankum to tell whether a given 
string is a palindrome or a palindrome can be formed by the given string by 
rearranging the letters in that string.
Attention! the output is case sensitive.

input: one string 

output : YES or NO depending on the result

example: 
input : semememes

output: YES

Question : 
Tell the output of the input given below :
LNPACAPAANALMAAAMANAN
</pre>
</div>
 </div>
</body>
</html>	