<?php
session_start();
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
	if (isset($_POST['uid'])) {
		$uid=mysqli_real_escape_string($conn,$_POST['uid']);
		$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

		if(test($uid)||test($pwd)){
			header("Location: index.php?login=empty");
					exit();
		}else{
			$resultCheck=0;
			$sql="SELECT * FROM login WHERE user_name='$uid'";
			$result=mysqli_query($conn,$sql);
			$resultCheck=mysqli_num_rows($result);
			if($resultCheck<1){
				header("Location: index.php?login=no account found");
					exit();
			}else{
				if($row=mysqli_fetch_assoc($result)){
					$hashedPwdCheck=password_verify($pwd,$row['user_pwd']);
					if($hashedPwdCheck==false){?>
						
						<script>
							alert("Wrong password");
							window.location.href='index.php';
						</script>
						<?php
						exit();
					}elseif ($hashedPwdCheck==true) {
						$_SESSION['u_id']=$row['user_id'];
						$_SESSION['u_email']=$row['user_email'];
						$_SESSION['u_uid']=$row['user_name'];?>
						<script>
            				window.location.href='dashboard.php';
        				</script>
						<?php
						exit();

					}
				}
			}
		}
	}else{
			header("Location: ../login.php?login=error");
					exit();
		}
?>