<!DOCTYPE html>
<?php
session_start();
$userID = $_SESSION['userID'];
include 'topbar.php';
include 'navbar.php';
include 'Connection.php';
      ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Medical Report</title>
  </head>
  <style media="screen">
  .fieldset{
    padding-bottom: 15px;
    padding-top: 5px;
    border-radius: 1.5em;
    box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    height: auto;
    width: 700px;
    margin-left: 28%;
    margin-top: 8%;
    margin-bottom: 6%;
    background-color: white;

  }
  .text{
    font-size: 19px;
    font-family: Arial, Helvetica, sans-serif;
    margin-left: 10%;
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
  .title{
    color: #0066cc;
    font-family: 'Aclonica';
    font-size: 40px;
    font-weight: bold;
  }
  </style>
  <body>
    <br><br>
    <br>
    <form action="addReport.php" method=post>
      <div class="fieldset">
        <h1 align=center class="title">Add Report</h1>
      <span class=text>Select Patient Name: </span>
      <select class="inputs" name="sel" id="sel" required>
      <?php
    if(!$con) die(mysqli_connect_error());
        $q="SELECT DISTINCT u.name,p.patientID FROM patient p , reserve r, user u WHERE r.patientID=p.patientID AND p.userID=u.userID";
        $result =mysqli_query($con,$q);
        while($row=mysqli_fetch_array($result)){
        echo '<option value="'.$row['patientID'].'">'.$row['name'].'</option>';
}
?>
</select>
<br>
<br>
<span class=text>Date : </span><input class="inputs" type=date name=d placeholder="Date"></input>
<br>
<br>
<span class=text>Medication consumed by Patient: </span><input class="inputs" type=text name=med placeholder="Medication Description"></input><br><br>
<br>
<span class=text>Allergies?: </span><input type="text" class="inputs" placeholder="Allergies" name=all><br><br>
<span class=text>Does the patient inherit any Diseases? </span><input type="text" placeholder="Disease" class="inputs" name=check2 >
<br><br>
<span class=text>Surgery Done: </span><input class="inputs" name=surgery type=text placeholder="Surgery Description"></input><br><br>
<span class=text>Tests Done: </span><input class="inputs" name=test type=text placeholder="Test Description"></input><br>
<br>
<input class="input1" type=submit name=save value=Save></input>
<input type="button" value="Back" class="input2" onclick="history.back()">
</div>
<?php
  if(isset($_POST['save'])){
    $q= "SELECT * FROM `doctor` WHERE userID = '$userID'";
    $result =mysqli_query($con,$q);
    $row = mysqli_fetch_array($result);
    $doctorID = $row['doctorID'];
    $sql="INSERT INTO `report` (`reportID`, `patientID`, `doctorID`, `allergy`, `inherit`, `surgery`, `date`, `medication`, `tests`) VALUES (NULL, '{$_POST['sel']}', '$doctorID','{$_POST['all']}','{$_POST['check2']}','{$_POST['surgery']}','{$_POST['d']}','{$_POST['med']}','{$_POST['test']}')";
    mysqli_query($con,$sql);
echo $sql;
    }
  ?>
  </body>
</html>
