<!DOCTYPE html>
<?php
session_start();
include 'topbar.php';
include 'Connection.php';
include 'navbar.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Patient</title>
  </head>
  <style media="screen">
  .fieldset{
  padding-bottom: 15px;
  padding-top: 20px;
  border-radius: 1.5em;
  box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
  height: auto;
  width: 430px;
  margin-left: 36%;
  margin-top: 9%;
  background-color: white;
            }

  .inputs{
              width: auto;
              padding: 6px 10px;
              margin: 10px;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
              margin-left: 56%;
              margin:0
            }

  .text{
              padding-top: 50px;
              font-size: 19px;
              font-family: Arial, Helvetica, sans-serif;
              margin-left: 20%;

        }
        .del{
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
          margin-left: 25%;
          margin-top: 15px;
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
    <form action=deletePatient.php method=POST>
      <div class="fieldset">
<span class=text>Select Patient: </span>

    <select class="inputs" name="sel" id="sel"required>
                            <?php
                  if(!$con){
                        die("Connection Error: ".mysqli_connnect_error());
                                }
                    $query="SELECT * FROM `user` u,`patient` p WHERE roleID='2' AND p.userID=u.userID";
                    $result =mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
echo '<option value="'.$row['userID'].'">'.$row['name'].'</option>';
}
?>
                        </select>
<input type="submit" class="del" value="Confirm" name="del">
<input type="button" class="input2" value="Back" onclick="history.back()">
</div>
</form>
</body>
<?php

if(isset($_POST['del'])){
                  if(!$con){
                        die("Connection Error: ".mysqli_connnect_error());
                                }
                                $userID = $_POST['sel'];
                                $q= "SELECT * FROM `patient` WHERE userID = '$userID'";
                                $result =mysqli_query($con,$q);
                                $row = mysqli_fetch_array($result);
                                $pid = $row['patientID'];
                                $query="DELETE FROM `comment` WHERE patientID = '$pid'";
                                mysqli_query($con,$query);
                                $query="DELETE FROM `reserve` WHERE patientID = '$pid'";
                                mysqli_query($con,$query);
                                $query="DELETE FROM `patient` WHERE userID ='$userID'";
                                mysqli_query($con,$query);
                                $query="DELETE FROM `user` WHERE userID ='$userID'";
                                mysqli_query($con,$query);
                                $query="DELETE FROM `report` WHERE patientID = '$pid'";
                                mysqli_query($con,$query);
                                $query="DELETE FROM `uploads` WHERE patientID = '$pid'";
                                mysqli_query($con,$query);

}
?>
  </body>
</html>
