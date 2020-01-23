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
   margin-left: 40%;
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
<h1 class="h1" align=center>All Comments</h1>
    <table class="steelBlueCols">
    <thead>
    <tr>
    <th>Name</th>
    <th>Title</th>
    <th>Description</th>
    </tr>
    </thead>
    <?php

    $q= "SELECT * FROM `doctor` WHERE userID = '$userID'";
    $result =mysqli_query($con,$q);
    $row = mysqli_fetch_array($result);
    $doctorID = $row['doctorID'];
    $query="SELECT DISTINCT c.*, u.name FROM `comment` c , `user` u, `patient` p, `doctor` d WHERE p.userID = u.userID AND c.patientID = p.patientID";
        $result =mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result)){
            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['commentTitle']."</td>";
            echo "<td>".$row['commentDescription']."</td>";
            echo "</tbody>";
            echo "</tr>";
        }
        mysqli_close($con);
    ?>
    </table>
  </body>
</html>
