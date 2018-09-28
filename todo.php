<?php
    session_start();
    $id=$_SESSION['u_id'];
$dbservername="localhost";
$username="root";
$password="aniket";
$dbname="test";
$conn=mysqli_connect($dbservername,$username,$password,$dbname);
    if(isset($_POST['btn-submit'])){
        $todo1=$_POST['todo1'];
        $todo2=$_POST['todo2'];
        $todo3=$_POST['todo3'];
        $todo4=$_POST['todo4'];
        $todo5=$_POST['todo5'];
        $todo6=$_POST['todo6'];
    }
    $sql="INSERT INTO todo(todo1,todo2,todo3,todo4,todo5,todo6,user_id) VALUES('$todo1','$todo2','$todo3','$todo4','$todo5','$todo6','$id')";
    if(mysqli_query($conn,$sql)){
        // $_SESSION['id']=$row['id'];
        ?>
        <script>
			alert("Succefully created Your Todos");
            window.location.href="dashboard.php";
        </script>
       <?php 
    }
    ?>
		<?php
	exit();
?>