<!DOCTYPE html>
<?php
session_start();
include 'topbar.php';
include 'navbar.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
  .inputs{
    width: 35%;
    height: 35px;
    padding: 6px 10px;
    margin: 7%;
    margin-left: 34%;
    display: inline-block;
    border: 2px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  </style>
  <script>
  function showHint(str)
  {
  	if (str.length==0)	{
  		document.getElementById("txtHint").innerHTML="";
  		return;
  	}
  	xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200)   {
  			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
  		}
  	}
  	xmlhttp.open("GET","hintDoctor.php?q="+str,true);
  	xmlhttp.send();
  }
  </script>
  <body>
  <a href="bookAppointment.php">Book Appointment</a>
  <a href="viewAppointment.php">View My Appointments</a>
  <a href="addComment.php">Add Comment</a>
  <a href="readCommentPatient.php">Read My Comments</a>
  <a href="readComment.php">Read All Comments</a>
  <a href="upload.php">Upload File</a>
  <a href="viewReport.php">My Medical Reports</a>

  <br><br>
  <input class=inputs type="text" onkeyup="showHint(this.value)" placeholder="Search Doctor by Name">
  <div id="txtHint"></div>
  </body>


</html>
