<!DOCTYPE html>
<?php
include 'Connection.php';
include 'topbar.php';
include 'navbar.php';

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Choose Account</title>
  </head>
  <style media="screen">
  .fieldsetPatient{
    padding-bottom: 15px;
    padding-top: 5px;
    border-radius: 1.5em;
    box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    height: 450px;
    width: 470px;
    float: left;
    margin-top: 10%;
    margin-bottom: 6%;
    background-color: white;

  }

  .fieldsetDoctor{
    padding-bottom: 15px;
    padding-top: 5px;
    border-radius: 1.5em;
    box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    height: 450px;
    width: 470px;
    float: right;
    margin-top: 10%;
    margin-bottom: 6%;
    background-color: white;

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
    width: auto;
    transition: all 0.5s;
    cursor: pointer;
    margin-left: 27%;
}
.sign {
            padding-top: 40px;
            color: #0066cc;
            font-family: 'Aclonica';
            font-size: 40px;
            font-weight: bold;

      }
      .text{
        font-size: 19px;
        font-family: Arial, Helvetica, sans-serif;
        margin-left: 8%;
      }
  </style>
  <body>
    <div class="fieldsetPatient">

    <h2 class=sign align=center>Patient Account</h2>
    <p class=text>Looking for a doctor? Want to book an appointment? Sign up as a patient and use these features among others.</p>
    <br>
<a class="input1" href="signupPatient.php">Sign Up As Pateint</a>

</div>
<div class="fieldsetDoctor">
    <h2 class=sign align=center>Doctor Account</h2>
    <p class=text>Looking to join the community and find patients? Sign up as a doctor for more features!</p>
<br>
<a class="input1" href="signupDoctor.php">Sign Up As Doctor</a>
  </div></body>
</html>
