<!DOCTYPE html>
<?php
session_start();
$userID = $_SESSION['userID'];
include 'topbar.php';
include 'Connection.php';
include 'navbar.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Comment</title>
  </head>
  <style media="screen">
  .fieldset{
    padding-bottom: 15px;
    padding-top: 5px;
    border-radius: 1.5em;
    box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    height: auto;
    width: 430px;
    margin-left: 36%;
    margin-top: 6%;
    margin-bottom: 6%;
    background-color: white;
}

  .text{
    font-size: 19px;
    font-family: Arial, Helvetica, sans-serif;
    margin-left: 13%;
  }

.inputs{
  width: 35%;
  padding: 6px 10px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.input1{
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
  margin-left: 27%;
}
.desc{
margin-left: 13%;

}
.h1{
  color: #0066cc;
  font-family: 'Aclonica';
  font-size: 40px;
  font-weight: bold;

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
    <br><br><br>
    <form method="post">
      <div class=fieldset>
        <h1 class='h1' align=center>Add Comment</h1>
      <span class=text>Select Doctor Username: </span>

      <select class="inputs" name="sel" id="sel" required>
                              <?php


                    if(!$con){
                          die("Connection Error: ".mysqli_connnect_error());
                                  }
                      $qquery="SELECT * FROM `user` u, `doctor` d WHERE u.userID = d.userID";
                      $result =mysqli_query($con,$qquery);
      while($row=mysqli_fetch_array($result)){
      echo '<option value="'.$row['doctorID'].'">'.$row['name'].'</option>';
      }
                  //mysqli_close($con);

      ?>

                          </select>

      <br>
<br>
      <span class=text>Title: </span><input class="inputs" type=text name=title placeholder="Title"><br><br></input>
      <span class=text>Description: </span><br><br><textarea class="desc" type=text name=description placeholder="Description"></textarea><br><br>
      <input class="input1" type=submit name=save value=Publish></input>
      <input type="button" value="Back" class="input2" onclick="history.back()">
</div>

      <?php

        if(isset($_POST['save'])){
          $q= "SELECT * FROM `patient` WHERE userID = '$userID'";
          $result =mysqli_query($con,$q);
          $row = mysqli_fetch_array($result);
          $patientID = $row['patientID'];
          $sql="INSERT INTO `comment` (`commentID`, `patientID`, `doctorID`, `commentTitle`, `commentDescription`) VALUES (NULL, '$patientID', '{$_POST['sel']}', '{$_POST['title']}', '{$_POST['description']}')";
          mysqli_query($con,$sql);
          }
        ?>
  </body>
</html>
