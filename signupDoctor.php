<?php
session_start();
include("Connection.php");
include 'topbar.php';
include 'navbar.php';
?>
<html lang="en">
<head>
    <title>Sign Up</title>
</head>
<style media="screen">
.fieldset{
  padding-bottom: 15px;
  padding-top: 5px;
  border-radius: 1.5em;
  box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
  height: auto;
  width: 470px;
  margin-left: 34%;
  margin-top: 8%;
  margin-bottom: 6%;
  background-color: white;

}
.inputs{
  width: 60%;
  padding: 6px 10px;
  margin-left: 21%;
  height: 40px;
margin-bottom: 8px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.text{
  font-size: 19px;
  font-family: Arial, Helvetica, sans-serif;
}
.sign {
            padding-top: 40px;
            color: #0066cc;
            font-family: 'Aclonica';
            font-size: 40px;
            font-weight: bold;

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
        margin-left: 37%;
      }
      .check{
margin-left: 7%;
      }
</style>
<body>
<div class=fieldset>
                    <form method="POST" id="signup-form" class="signup-form">
<h2 class=sign align=center>Sign Up </h2>
                            <input type="text" class="inputs" name="name" id="name" placeholder="Your Name/ Username"/><br><br>
                            <input type="text" class="inputs" name="username" id="username" placeholder="username"/><br><br>

                            <input type="Number" class="inputs" name="phonenumber" id="phonenumber" placeholder="Phone Number"/><br><br>

                        <input type="date" class="inputs" name="dob" id="date"/><br><br>
                        <select class="inputs" name=gender id=gender ><br><br>
                          <option value=0>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Not Specified">Not Specified</option>
                    </select><br><br>
                    <input type="text" class="inputs" name="spec" id="spec" placeholder="Speciality"/><br><br>
                    <select class="inputs" name=region id=region >
                      <option value=0>Select Region</option>
                    <option value="Tripoli">Tripoli</option>
                    <option value="Koura">Koura</option>
    </select><br><br>
                            <input type="password" class="inputs" minlength="6" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span><br><br>

                            <input type="password" class="inputs" minlength="6" name="re_password" id="re_password" placeholder="Repeat your password"/><br><br>

                            <input type="checkbox" name="agree-term" id="agree-term" class= check required="true" />
                            <label for="agree-term" class="text">I agree all statements in Terms of Service</label><br><br>

                            <input type="submit" name="submit" id="submit" class="input1" value="Sign up"/>
                    </form>
                    <div>
    <?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username=$_POST["username"];
    $name=$_POST["name"];
		$password=$_POST["password"];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $re_password=$_POST["re_password"];
    $phonenumber=$_POST["phonenumber"];
    $spec=$_POST['spec'];
    $region=$_POST['region'];
		$roleID=3;
	  $count=0;
        foreach($_POST as $key => $value){
        if(empty($value)){
         $messages[] = "Hey you forgot to fill this field: $key";
            $count++;
    }
}

if($count==0){
  $query="INSERT INTO `user`(`userID`, `name`, `username`, `password`, `dob`, `gender`, `cellNB`, `roleID`) VALUES (NULL,'$name','$username',  '$password','$dob','$gender','$phonenumber', '$roleID')";
  mysqli_query($con, $query);
  $user_id = mysqli_insert_id($con);
  $sql2="INSERT INTO `doctor` VALUES('','$user_id','$spec','$region')";
  mysqli_query($con,$sql2);
}
        if($password!=$re_password){
            echo "Passwords don't match";
            $count=1234;
            }

        if($count>=1)
        print_r($messages);

            $q="SELECT username FROM `user` ";
             $res = mysqli_query($con,$q);
         while($row=mysqli_fetch_array($res)){
             if($row['username']==$username)
                   echo "Username Exsisted Before";
                   return ;
         }
    }
    ?>

</body>
</html
