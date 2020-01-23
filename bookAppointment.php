<!DOCTYPE html>
<?php
session_start();
include('Connection.php');
include 'topbar.php';
include 'navbar.php';
 ?>
<html>
<style media="screen">
.fieldset{
  padding-bottom: 15px;
  padding-top: 5px;
  border-radius: 1.5em;
  box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
  height: auto;
  width: 430px;
  margin-left: 36%;
  margin-top: 8%;
  margin-bottom: 6%;
  background-color: white;
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
  margin-left: 26%;
}
.text{
  font-size: 19px;
  font-family: Arial, Helvetica, sans-serif;
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
    <head>
        <title>Book Appointment</title>
    </head>
    <body>
        <div class="fieldset">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                  <h1 class="h1" align=center>Book An Appointment</h2>
				<span class=text>Choose Doctor: </span><select class=inputs id="drp" name=doc>
				<?php
					$query= "SELECT * FROM `doctor` d, `user` u where u.userID = d.userID";
					$result = mysqli_query($con,$query);
					while($row = mysqli_fetch_array($result)) {
						echo "<option value=".$row['doctorID'].">" . $row['name'] . "</option>";
					}
				?>
      </select><br><br>
				<span class= text>Choose Date: </span><input class= inputs type=date name=date><br><br>
				<span class= text>Choose Start Time: </span><input class=inputs type=time name=Stime><br><br>
				<span class= text>Choose End Time: </span><input class=inputs type=time name=Etime><br><br>
                <input type="submit"class=input1 name="submit" value="Reserve"/>
                <input type="button" class="input2" value="Back" onclick="history.back()">

            </div>

        </div>
</form>
    </body>
</html>

<?php
	if (isset($_POST['submit'])){

    $did = $_POST["doc"];
		$Date = $_POST["date"];
		$STime = $_POST["Stime"];
		$ETime = $_POST["Etime"];
		$ok = false;
		$reservable = true;
		$starttime;
		$endtime;
		if(isset($Date) && isset($STime) && isset($ETime)){
			if(!empty($Date) && !empty($STime) && !empty($ETime)){
				$ok = true;
			}else echo"All fields required!";
		}else echo"Invaild Input Data!";

		if($ok){
			$query = "SELECT * FROM `reserve` WHERE doctorID='$did' AND Date='$Date'";
			$result=mysqli_query($con, $query);
			$nbrows=mysqli_num_rows($result);
			if ($nbrows > 0){
				while($row = mysqli_fetch_array($result)){
					$starttime = strtotime($row['StartTime']);
					$endtime = strtotime($row['EndTime']);
					$s=strtotime($STime);
					$e=strtotime($ETime);
					if((($e >= $starttime) && ($e <= $endtime))
					|| (($s >= $starttime) && ($s <= $endtime)))
					{
						echo "This Doctor is not available at this time";
						$reservable = false;
					}
				}
			}
		}
    else $reservable = false;
    $userID = $_SESSION['userID'];
    $q= "SELECT * FROM `patient` WHERE userID = '$userID'";
    $result =mysqli_query($con,$q);
    $row = mysqli_fetch_array($result);
    $pid = $row['patientID'];

		if($reservable){
      $query="INSERT INTO `reserve` (`appointmentID`, `patientID`, `doctorID`, `Date`, `StartTime`, `EndTime`) VALUES (NULL, '$pid', '$did', '$Date', '$STime', '$ETime')";
			if(!$result=mysqli_query($con, $query)) echo mysqli_error($con);
			else echo "Reserved Successfully";
		}
}
?>
