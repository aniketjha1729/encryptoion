<?php
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
    $sql="INSERT INTO todo(todo1,todo2,todo3,todo4,todo5,todo6) VALUES('$todo1','$todo2','$todo3','$todo4','$todo5','$todo6')";
    echo $sql;
    if(mysqli_query($conn,$sql)){
        ?>
        <script>
			alert("Succefully created Your Todos")
        </script>
       <?php 
    }
    ?>
		<?php
	exit();
?>