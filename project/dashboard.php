<?php
    session_start();
    $dbservername="localhost";
    $username="root";
    $password="aniket";
    $dbname="test";
    $conn=mysqli_connect($dbservername,$username,$password,$dbname);
    if(isset($_SESSION['u_id']))
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Home</title>
            <link rel="stylesheet" href="css/style2.css">
        </head>
        <body>
        <?php
            $details=$_SESSION['u_id'];
            $sql="SELECT * FROM login WHERE id='$details'";
            $data = mysqli_query($conn,$sql);
            $userDetails = mysqli_fetch_assoc($data);?>
            
            <div class="dash-header">
                <h4 class="user"><?php echo "Welcome ".$userDetails['user_name'];?></h4>
                <a class="logout"  href="logout.php">Logout</a>
            </div>
            
        </body>
        </html>
        <?php
    }
    else {
        ?>    
        <script>
            	window.location.href='index.php';
        </script>
        <?php
    }

?>

