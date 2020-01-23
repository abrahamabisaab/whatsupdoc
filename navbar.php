<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    .navbar {
    background-color: #303841;
    position: absolute;
    top: 5;
    left: 5;
    z-index: 9999;
    width: 100%;
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
.navbar a.activelog{
  background-color: red;
  color: white;
  float: right;

}

    </style>
  </head>
  <body>
    <div class="navbar">
      <a class="activelog" href="index.php">Logout</a>
  </body>
</html>
