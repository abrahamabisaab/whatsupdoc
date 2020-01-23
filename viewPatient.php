<!DOCTYPE html>
<?php
include 'topbar.php';
include 'Connection.php';
include 'navbar.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Patients</title>
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
    margin-left: 32%;
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
  margin-top: 4%;
  color: #0066cc;
  font-family: 'Aclonica';
  font-size: 40px;
  font-weight: bold;
  text-align: center;
}
  </style>
  <body>
    <h1 class="h1">List Of Patients</h1>
    <table class="steelBlueCols">
    <thead>
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Date of Brith</th>
    <th>Gender</th>
    <th>Cell Number</th>
    </tr>
    </thead>
    <?php
    $query="SELECT * FROM `user` WHERE roleID='2'";
        $result =mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result)){
            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['dob']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['cellNB']."</td>";
            echo "</tbody>";
            echo "</tr>";
        }
        mysqli_close($con);
    ?>
    </table>
  </body>
</html>
