<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assests/button1.css">
  <script>
    function change(){
    document.getElementById('name').value = "";
    document.getElementById('email').value = "";
}

  </script>
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
        Name:<input type="text"  name="name" size="18" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" >
        <br><br>
        Key:<input type="number" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
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
            //echo "<input type='text' value='$ans'/>";
          }
        ?>
        <input value=<?php if (isset($ans)) echo $ans ?>>
        <div class="mycontainer">
          <button class="btne" name="encrypt">Encrypt</button>
          <button  class="btnc" name="clear"  onclick="change()">Clear</button>
        </div>
      </form>
    </div> 
  </div>
</body>
</html>