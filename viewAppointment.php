<!DOCTYPE html>
<?php
session_start();
include 'topbar.php';
include 'Connection.php';
include 'navbar.php';
$userID = $_SESSION['userID'];
 ?>
 <style media="screen">
 table.steelBlueCols {
   font-family: Arial, Helvetica, sans-serif;
   border: 0px solid #555555;
   background-color: #bbb;
   width: auto;
   height: auto;
   text-align: center;
   border-collapse: collapse;
   margin-top: 10%;
   margin-left: 37%;
 }
 table.steelBlueCols td, table.steelBlueCols th {
   border: 1px solid #ccc;
   padding: 7px 10px;
 }
 table.steelBlueCols tbody td {
   font-size: 14px;
   font-weight: bold;
   color: #FFFFFF;
 }
 table.steelBlueCols tr:nth-child(even) {
   background: #CCCCCC;
 }
 table.steelBlueCols thead {
   background: dodgerblue;
   border-bottom: 1px solid #CCCCCC;
 }
 table.steelBlueCols thead th {
   font-size: 15px;
   font-weight: bold;
   color: #FFFFFF;
   text-align: center;
   border-left: 1px solid #CCCCCC;
 }
 table.steelBlueCols thead th:first-child {
   border-left: none;
 }
 .h1{
   color: #0066cc;
   font-family: 'Aclonica';
   font-size: 40px;
   font-weight: bold;
   margin-top: 5%;
 }
 </style>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1 class="h1" align=center>My Appointments</h1>
    <table class="steelBlueCols">
    <thead>
    <tr>
    <th>Doctor Name</th>
    <th>Date</th>
    <th>Start Time</th>
    <th>End Time</th>
    </tr>
    </thead>
    <?php
    $q= "SELECT * FROM `patient` WHERE userID = '$userID'";
    $result =mysqli_query($con,$q);
    $row = mysqli_fetch_array($result);
    $patientID = $row['patientID'];
    $query="SELECT r.*, u.name FROM `reserve` r, `user` u, `patient` p, `doctor` d WHERE p.patientID = '$patientID' and r.patientID='$patientID'and d.userID = u.userID AND r.doctorID = d.doctorID";
        $result =mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result)){
            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['Date']."</td>";
            echo "<td>".$row['StartTime']."</td>";
            echo "<td>".$row['EndTime']."</td>";
            echo "</tbody>";
            echo "</tr>";
        }
        mysqli_close($con);
    ?>
    </table>
  </body>
</html>
