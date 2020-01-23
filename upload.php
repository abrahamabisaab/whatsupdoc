<!DOCTYPE html>
<?php
include 'topbar.php';
include 'navbar.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload a File</title>
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
    margin-left: 32%;
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
    margin-left: 24%;
}

.browse{
margin-left:27%;
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
    <div class=fieldset>
    <form method=post action="uploadphp.php" enctype="multipart/form-data">
      <h1 class="h1" align=center>Upload A File<h1>
    		<span class =text>Choose A File: </span><input class=browse type="file" name="fileToUpload"><br><br>
    		<input class=input1 type="submit" name="submit" value="Upload File">
        <input type="button" class="input2" value="Back" onclick="history.back()">
    	</form>
    </div>
  </body>
</html>
