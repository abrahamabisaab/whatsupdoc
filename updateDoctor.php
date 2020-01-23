<!DOCTYPE html>
<?php
include 'Connection.php';
include 'topbar.php';
include 'navbar.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Doctor</title>
  </head>
  <style media="screen">
  .fieldset{
  padding-bottom: 15px;
  padding-top: 10px;
  border-radius: 1.5em;
  box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
  height: auto;
  width: 45%;
  margin-left: 30%;
  margin-top: 9%;
  background-color: white;
            }

  .inputs{
              width: 35%;
              padding: 6px 10px;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
              margin-left: 56%;

            }

  .text{
              position: absolute;
              margin-top: 5px;
              font-size: 19px;
              font-family: Arial, Helvetica, sans-serif;
              margin-left: 5%;

        }
        .submit{
          display: inline-block;
          border-radius: 4px;
          background-color: dodgerblue;
          border: none;
          color: #FFFFFF;
          text-align: center;
          font-size: 20px;
          padding: 10px;
          width: 100px;
          transition: all 0.5s;
          cursor: pointer;
          margin-left: 29%;
}
.input2{
  display: inline-block;
  border-radius: 4px;
  background-color: grey;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin-left: 7%;

}
 </style>
  <body>
    <form action=editDoctor.php method=post>
    <?php
session_start();
echo "<div class=fieldset>";
  echo '<span class=text>Select the Name of the Doctor: </span><select class=inputs name="name">';
  echo"</div>";
        if(!$con) die(mysqli_connect_error());
        $q="SELECT * FROM user WHERE roleID='3'";
        $result=mysqli_query($con,$q);
        while($row=mysqli_fetch_array($result)){
            echo '<option value="'.$row['userID'].'">'.$row['name'].'</option>';
          }

echo "</select><br><br>";
    echo '<input type=submit class=submit name="name_selected" value="Submit">';
    echo '<input class="input2" type=button onclick="history.back()" value=Back></input>';
echo "</form>";



?>
  </body>
</html>
