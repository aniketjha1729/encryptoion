<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assests/button1.css">
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
    <div style="margin-left:15%;margin-right:60%;width:70%">
      <h2>Encryption Page</h2>
    </div>
    <div class="input" style="margin-right:10%;margin-left:10%">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Name: <input type="text" name="name" size="18" value="<?php echo '$_post['name']';?>">
        <br><br>
        Key:<input type="number" name="email" value="<?php echo '$_post['email']';?>" >
        <br><br>
        Result:
        <?php
        $ans="";
          if (isset($_POST['encrypt'])){
            if(strlen($name)!=0){
              for ($x = 0; $x <strlen($name); $x++) {
                if((ord($name[$x])+$email)>122){
                  $ans=$ans.chr((ord($name[$x])+$email)-122+96);
                }
                else if(ord($name[$x])==32){
                  $ans= $ans.chr(ord($name[$x]));
                }
                else{
                  $ans=$ans.chr(ord($name[$x])+$email);
                }
              }
            }
            echo "<input type='text' value='$ans'/>";
          }
        ?>
        <div class="mycontainer">
          <button class="btne" name="encrypt">Encrypt</button>
          <button class="btnc" name="clear">Clear</button>
        </div>
      </form>
     </div> 
  </div>
</body>
</html>