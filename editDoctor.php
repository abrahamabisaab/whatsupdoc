<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Doctor</title>
  </head>
  <style media="screen">
  .fieldset{
    padding-bottom: 15px;
    padding-top: 10px;
    border-radius: 1.5em;
    box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    height: auto;
    width: 430px;
    margin-left: 36%;
    margin-top: 7%;
    margin-bottom: 4%;
    background-color: white;
    z-index: auto;
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

    .text{
      font-size: 19px;
      font-family: Arial, Helvetica, sans-serif;
      margin-left: 20%;
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
      margin-left: 20%;

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
    <?php
    session_start();
    include 'topbar.php';
    include 'Connection.php';
    include 'navbar.php';
    $x=$_POST['name'];
        echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=post>";
        if(!$con) die(mysqli_connect_error());
        $q="SELECT * FROM user WHERE userID='$x'";
        $result=mysqli_query($con,$q);
        $row=mysqli_fetch_array($result);
        echo"<div class=fieldset>";
        echo "<input type=hidden name=ID value=$x>";
        echo "<span class=text>Name: </span><input type=text class=inputs name=Name value='{$row['name']}'><br><br>";
        echo "<span class=text>Date of Birth: </span><input type=date class=inputs name=dob value={$row['dob']}><br><br>";
        echo "<span class=text>Gender: </span><input type=text class=inputs name=gender value={$row['gender']}><br><br>";
        echo "<span class=text>Cell Number: </span><input type=number class=inputs name=cellnb value={$row['cellNB']}><br><br>";
        echo "<input type=submit class=submit name='edit_Doctor'>";
        echo "<input type=button class=input2 value=Back onclick=history.back()>";
        echo "</form>";
        echo"</div>";
        if(isset($_POST["edit_Doctor"])){
                $qq="UPDATE `user` SET `name`='{$_POST['Name']}',`dob`='{$_POST['dob']}',
                `gender`='{$_POST['gender']}',`cellNB`={$_POST['cellnb']} WHERE userID='{$_POST['ID']}'";
                mysqli_query($con,$qq);
    }
?>
  </body>
</html>
