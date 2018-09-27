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
            <link rel="stylesheet" href="css/dashboardstyle2.css">
        </head>
        <body>
        <?php
            $details=$_SESSION['u_id'];
            $sql="SELECT * FROM login WHERE id='$details'";
            $data = mysqli_query($conn,$sql);
            $userDetails = mysqli_fetch_assoc($data);?>
            <div class="header">            
                <a class="logout"  href="logout.php">Logout</a>
                <h4 class="h-4"><?php echo "Welcome ".$userDetails['user_name'];?></h4>              
            </div>
            <div class="container">
               <div class="hello-left">
                    <center>
                   <textarea rows="29" cols="30" style="border-radius:10px"></textarea>
                    </center>

               </div>
               <div class="hello-right">
                   <center>
                    <form action="todo.php" method="post"> 
                        <input type="text" class="inp" name="todo1"> <br>
                        <input type="text" class="inp" name="todo2"> <br>
                        <input type="text" class="inp" name="todo3"> <br>
                        <input type="text" class="inp" name="todo4"> <br>
                        <input type="text" class="inp" name="todo5"> <br>
                        <input type="text" class="inp" name="todo6"> <br>
                        <input type="submit" class="btn-submit" name="btn-submit" value="submit">
                    </form>
                    <form action="del.php" style="margin-top:2%">
                        <input type="submit" class="btn-del" name="btn-del" value="delete">
                    </form>
                </div>
                    </center>  
               </div>
            </div>        
            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                <script  src="js/index.js"></script>
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

