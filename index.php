<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>What's Up Doc? | Home Page</title>
  </head>
  <style media="screen">
.logo{
float: left;
height: 200px;
width: 250px;
}
.header{
position: absolute;
top: 0;
left: 0;
z-index: 999;
background-color: #f3f3f3;
width: 100%;
overflow: hidden;
height: 200px;
}
.navbar {
font-family: Arial, Helvetica, sans-serif;
background: rgba(255,255,255,0.2);
left: 0;
margin-top: 192px;
position: absolute;
z-index: 9999;
width: 100%;
height: 48px;
}
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
.navbar a.float{
float: right;

}
body{
background-image: url("living_room_furniture_eg_blue_tone_wallpaper_80113_1366x768.jpg");
}

.text{
  padding-top: 270px;
  margin-left: 60%;
  color: #303841;
  font-family: Arial, Helvetica, sans-serif;

}

.text a{
  background-color: #ddd;
  color: #FFF;
  border: none;
  color: #303841;
  text-align: center;
  font-size: 20px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  margin-left: 29%;
  border-radius: 4px;
}
.text a:hover{
color: #3c6aa5;
}
  </style>
  <body>
    <div class="header">
        <img class="logo" src="logosmall.png">
    </div>
        <div class="navbar">
          <a class=active href="index.php">Home</a>
          <a class="float" href="login.php">Sign In</a>
        </div>
<div class="text">
  <h1>Looking For An Appointment?</h1>
  <p>Feel free to create an account and instantly book appointments with<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; any doctor on the site!</p>
  <br><a href="signup.php">Sign Up Now!</a>
</div>

  </body>
</html>
