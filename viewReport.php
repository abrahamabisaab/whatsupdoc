<!DOCTYPE html>
<?php
session_start();
$userID = $_SESSION['userID'];
include 'Connection.php';
include 'topbar.php';
include 'navbar.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Patient Report</title>
  </head>
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
    margin-left: 20%;
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
  .title{
    color: #0066cc;
    font-family: 'Aclonica';
    font-size: 40px;
    margin-top: 5%;
    font-weight: bold;
  }
}
  </style>
    <body>
      <h1 align=center class="title">My Medical Reports</h1>
      <table class="steelBlueCols">
      <thead>
      <tr>
      <th>Patient Name</th>
      <th>Date of Report</th>
      <th>Allergy</th>
      <th>Inherited Diseases</th>
      <th>Surgery Done</th>
      <th>Medication Prescribed</th>
      <th>Tests Done</th>
      </tr>
      </thead>
      <?php
      $q= "SELECT * FROM `patient` WHERE userID = '$userID'";
      $result =mysqli_query($con,$q);
      $row = mysqli_fetch_array($result);
      $patientID = $row['patientID'];

      $query="SELECT DISTINCT r.*,u.name FROM user u, report r, patient p, reserve res WHERE r.patientID=p.patientID AND p.userID=u.userID AND res.patientID = r.patientID AND res.patientID=$patientID ";
          $result =mysqli_query($con,$query);
          while($row=mysqli_fetch_array($result)){
              echo "<tbody>";
              echo "<tr>";
              echo "<td>".$row['name']."</td>";
              echo "<td>".$row['date']."</td>";
              echo "<td>".$row['allergy']."</td>";
              echo "<td>".$row['inherit']."</td>";
              echo "<td>".$row['surgery']."</td>";
              echo "<td>".$row['medication']."</td>";
              echo "<td>".$row['tests']."</td>";
              echo "</tbody>";
              echo "</tr>";
          }
          mysqli_close($con);
      ?>
      </table>
  </body>
</html>
