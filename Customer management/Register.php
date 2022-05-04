<?php
include 'cusdbconnection.php';
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$nic = $_POST['nic'];
	$email = $_POST['email'];
	$cpass = $_POST['cpass'];
	$pass = $_POST['pass'];
	$contactNo = $_POST['conNo'];

	if($cpass == $pass){

		$sql = "INSERT INTO `cusregister`(`cusId`, `Name`, `Address`, `NIC`, `Email`, `password`, `contactNum`) VALUES ('','$name','$address','$nic','$email','$pass','$contactNo')";

		$result = mysqli_query($con, $sql);


		if($result){
			echo  '<script language="javascript">alert("Successfuly registered");</script>';
		}else{
			echo  '<script language="javascript">alert("Registration failed!");</script>';
		}
	}
	else{
		echo  '<script language="javascript">alert("No matching password found");</script>';
	}

}

if(isset($_POST['singIn'])){
	$uname = $_POST['uName'];
	$upass = $_POST['uPass'];	
	$res = mysqli_query($con, "SELECT * FROM `cusregister` WHERE Name = '$uname' AND password = '$upass'");
	if (!$res) {
    	echo 'Could not run query: ' . mysql_error();
    exit;
	}
	$row = mysqli_fetch_row($res);
	
	if($row > 0){
		if($row[1] == $uname && $row[5] == $upass){
			header('location:home.php?userID='.$row[0]);
		}
		else{
			echo '<script language="javascript">alert("Invalid username or password");</script>';
		}
	}
	else{
		echo '<script language="javascript">alert("Invalid username or password");</script>';
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="../css1/registerCSS.css">
    <title>Moments.lk</title>
  </head>
  <body>
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<form method="post">
				<div class="sign-in-htm">
					<div class="group">
						<label for="user" class="label">Username</label>
						<input id="user" type="text" class="input" name="uName" Required>
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="pass" type="password" class="input" data-type="password" name="uPass" Required>
					</div>
					<div class="group">
						<input id="check" type="checkbox" class="check" checked>
						<label for="check"><span class="icon"></span> Keep me Signed in</label>
					</div>
					<div class="group">
						<button class="button button4" type="submit" name="singIn">Sign in</button>
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						
					</div>
				</div>
			</form>
			<form method="post">
				<div class="sign-up-htm">
					<div class="group">
						<label for="user" class="label">Username</label>
						<input id="user" type="text" class="input" name="name" Required>
					</div>
					<div class="group">
						<label for="user" class="label">Address</label>
						<input id="user" type="text" class="input" name="address" Required>
					</div>
					<div class="group">
						<label for="user" class="label">NIC</label>
						<input id="user" type="text" class="input" name="nic" pattern="[0-9]{9}[Vv]|[0-9]{12}" Required>
					</div>
					<div class="group">
						<label for="pass" class="label">Email Address</label>
						<input id="pass" type="email" class="input" name="email" Required>
					</div>
					<div class="group">
						<label for="pass" class="label">Password</label>
						<input id="pass" type="password" class="input" data-type="password" name="cpass" Required>
					</div>
					<div class="group">
						<label for="pass" class="label">Confirm Password</label>
						<input id="pass" type="password" class="input" data-type="password" name="pass" Required>
					</div>
					<div class="group">
						<label for="user" class="label">Contact Number</label>
						<input id="user" type="tel" class="input" name="conNo" pattern="[0]{1}[7]{1}[0-9]{8}" Required>
					</div>
					
					<div class="group">
						<button  class="button button4" type="submit" name="submit">Sign up</button>
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<label for="tab-1">Already Member?</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
  </body>
</html>