<!DOCTYPE html>
<?php
include 'topbar.php';
session_start();

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.navbar {
  background-color: #333;
  overflow: hidden;
  height: 48px;
}

/* Style the links inside the navigation bar */
.navbar a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.navbar a.active {
  background-color: dodgerblue;
  color: white;
}
	.dropdown {
	  float: left;
	  overflow: hidden;
	}

	.dropdown .dropbtn {
	  font-size: 16px;
	  border: none;
	  outline: none;
	  color: white;
	  padding: 14px 16px;
	  background-color: inherit;
	  font-family: inherit;
	  margin: 0;
	}

	.dropdown:hover .dropbtn {
	  background-color: #bbb;
	}

	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f9f9f9;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a {
	  float: none;
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	  text-align: left;
	}

	.dropdown-content a:hover {
	  background-color: #ddd;
	}

	.dropdown:hover .dropdown-content {
	  display: block;
	}
.logout{
  background-color: red;
  color: white;
  float: right;
  margin-left: 1011px;
}
body{
background-image: url("living_room_furniture_eg_blue_tone_wallpaper_80113_1366x768.jpg");
}

</style>
</head>
<body>


<div class="navbar">
  <div class="dropdown">
    <button class="dropbtn">Patient
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="addPatient.php">Add Patient</a>
      <a href="viewPatient.php">View Patient(s)</a>
      <a href="updatePatient.php">Update Patient</a>
      <a href="deletePatient.php">Delete Patient</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Doctor
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="addDoctor.php">Add Doctor</a>
      <a href="viewDoctor.php">View Doctor(s)</a>
      <a href="updateDoctor.php">Update Doctor</a>
      <a href="deleteDoctor.php">Delete Doctor</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Comments
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="deleteComment.php">Delete Comment</a>
      <a href="readComment.php">View All Comment(s)</a>
    </div>
  </div>

  <a href="login.php" class= logout>Logout</a>
</div>
