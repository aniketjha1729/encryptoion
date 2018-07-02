<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="button1.css">
</head>
<body>
  <div class="main" style="margin-top:10%;margin-left:38%;margin-right:50%;width: 50%">
    <?php
      $name = $email = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
    <div style="margin-left:15%;margin-right:60% width:50%">
      <h2>Encryption Page</h2>
    </div>
    <div class="input" style="margin-right:10%;margin-left:10%">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Name: <input type="text" name="name">
        <br><br>
        Key: <input type="number" name="email">
        <br><br>
        <div class="mycontainer">
          <button class="btn">Button</button>
          <button class="btn">Button</button>
        </div>
      </form>
     </div> 
     <?php
       

        if(strlen($name)!=0){
          for ($x = 0; $x <strlen($name); $x++) {
            if((ord($name[$x])+$email)>122)
              echo (chr((ord($name[$x])+$email)-122+96));
            elseif(ord($name[$x])==32)
              echo (chr(ord($name[$x])));
            else
              echo (chr(ord($name[$x])+$email));
          }
        }
      ?>
  </div>
</body>
</html>