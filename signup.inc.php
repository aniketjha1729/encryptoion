<?php

$dbservername="localhost";
$username="root";
$password="aniket";
$dbname="test";
$conn=mysqli_connect($dbservername,$username,$password,$dbname);

function test($val)
{
	if (isset($val) && $val!=NULL)
		return 0;
	return 1;
}
	if(isset($_POST['submitbtn'])){
		$username=mysqli_real_escape_string($conn, $_POST['username']);
		$mobile=mysqli_real_escape_string($conn, $_POST['mobile']);
		$email=mysqli_real_escape_string($conn, $_POST['email']);
		$pwd=mysqli_real_escape_string($conn, $_POST['pwd']);
		if (test($username)||test($mobile)||test($email)||test($pwd)) {
				header("Location: index.php?signup=empty");
				exit();
			}
		else{
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				header("Location: index.php?signup=email");
				exit();
			}else{
				$sql="SELECT * FROM login WHERE user_name='$username' or user_mob='$mobile' or user_email='$email'";
				$result=mysqli_query($conn,$sql);
				$resultCheck=mysqli_num_rows($result);
				if($resultCheck>0){
					header("Location: index.php?signup=usertaken");
					exit();
				}else{
					$hashed=password_hash($pwd,PASSWORD_DEFAULT);
					$sql="INSERT INTO login(user_name,user_mob,user_email,user_pwd) VALUES('$username','$mobile','$email','$hashed')";
					$result =mysqli_query($conn,$sql);
					header("Location: index.php?signup=success");
					exit();
					}
				}
		}
	}else{
		header("Location: signup.php");
		exit();
	}