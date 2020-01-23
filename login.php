
<!DOCTYPE html>
<?php
session_start();
include('Connection.php');
 ?>
<html>
<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
<style>
body{
            background-image: url("living_room_furniture_eg_blue_tone_wallpaper_80113_1366x768.jpg");
            font-family: 'Ubuntu', sans-serif;
}

.login {
            background-color: #f3f3f3;
            padding-top: 40px;
            padding-bottom: 49px;
            width: 430px;
            height: 430px;
            margin: 7em 29em;
            border-radius: 1.5em;
            box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
}

.username {
            width: 76%;
            color: rgb(38, 50, 56);
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 1px;
            background: rgba(136, 126, 126, 0.04);
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            outline: none;
            box-sizing: border-box;
            border: 2px solid rgba(0, 0, 0, 0.02);
            margin-bottom: 50px;
            margin-left: 46px;
            text-align: center;
            margin-bottom: 27px;
            font-family: 'Ubuntu', sans-serif;

}

.password{

            width: 76%;
            color: rgb(38, 50, 56);
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 1px;
            background: rgba(136, 126, 126, 0.04);
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            outline: none;
            box-sizing: border-box;
            border: 2px solid rgba(0, 0, 0, 0.02);
            margin-bottom: 50px;
            margin-left: 46px;
            text-align: center;
            margin-bottom: 27px;
            font-family: 'Ubuntu', sans-serif;
    }

.submit{
            cursor: pointer;
            border-radius: 5em;
            color: #fff;
            background: linear-gradient(to right, #0066cc, #00ccff);
            border: 0;
            padding-left: 40px;
            padding-right: 40px;
            padding-bottom: 10px;
            padding-top: 10px;
            font-family: 'Ubuntu', sans-serif;
            font-size: 16px;
            margin-left: 35%;
            margin-top: auto;
            box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
        }

a {
            text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
            color: #333;
            text-decoration: none
        }

.sign {
            padding-top: 30px;
            color: #0066cc;
            font-family: 'Aclonica';
            font-size: 40px;
            font-weight: bold;

      }

.forgot{
            text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
            color: #333;
            padding-top: 10px;
            font-size: 15px;
}

.rememberme{
            margin-left: 15%;
            margin-top: auto;
}

.remembertext{
            font-family: 'Ubuntu', sans-serif;
            font-size: 16px;


}
.logo{
height: 200px;
width: 230px;
margin-left: 23%;
margin-bottom: 3%;
}

</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="login.php" />
<title>Login Page</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="login">
  <img class="logo" src="logosmall.png">
    <input class="username" type="username" name="username" placeholder="Username" id="inputEmail">
    <input class="password" type="password" name="password" placeholder="Password" id="inputPassword">
    <input class="rememberme" name="rememberme" value="remember" type="checkbox" id="rememberme"><span class="remembertext"> Remember Me</span>
    <br><br>
    <button class="submit" type="submit" name="submit" align="center">Sign In</button>
    <p class= "forgot" align=center>Don't Have an Account? <a href=signup.php><u>Sign Up</u></p>

</div>
</form>
<?php
   if(isset($_COOKIE["username"])&&isset($_COOKIE["password"])){
    if(!$con){
            die("Connection Error: ".mysqli_connnect_error());
        }
            $sql="select * from user where password='{$_COOKIE['password']}'
            AND username='{$_COOKIE['username']}'";
            $result=mysqli_query($con,$sql);//execute the query
            $nbrows=mysqli_num_rows($result);//return the number of rows
    if ($nbrows == 1) {
            $res = mysqli_fetch_array($result);
    if($res['roleID'] ==1){//admin
            header("location: admin.php"); // Redirecting To Other Page
}
    else if('roleID'==2)
            header("location: patient.php"); // Redirecting To Other Page
   }
    else if ('roleID'==3){
            header("location: doctor.php");
          }
   }
   else{
     if (isset($_POST['submit'])) {
       if (empty($_POST['username']) || empty($_POST['password']))
            echo '<h2 style="color:red" >Username or Password is empty</h2>';
   else{
            $username=$_POST['username'];
            $password=$_POST['password'];
   if(isset($_POST['rememberme'])){
            setcookie('username',$username,time()+60*60*24*7,'/senior');
            setcookie('password',$password,time()+60*60*24*7,'/senior');
        }

            $username = stripslashes($username);
            $password = stripslashes($password);
   if(!$con){
            die("Connection Error: ".mysqli_connnect_error());
        }

            $sql="select * from user where password='$password'
            AND username='$username'";
            $_SESSION['password']=$password;
            $result=mysqli_query($con,$sql);//execute the query
            $nbrows=mysqli_num_rows($result);//return the number of rows
  if ($nbrows == 1) {
            $res = mysqli_fetch_array($result);
            $_SESSION['userID']=$res['userID'];
      //session_start();
    //  $_SESSION['un'] = $username;
  if($res['roleID'] ==1){//admin
            header("location: admin.php"); // Redirecting To Other Page
}
  else if($res['roleID']==2)
            header("location: patient.php"); // Redirecting To Other Page

  else if ($res['roleID']==3){
            header("location: doctor.php");
   }
 }

            mysqli_close($con); // Closing Connection
  }
}

    }


?>
</body>
</html>
