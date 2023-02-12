<?php
session_start();
?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- phpvalidation -->
   <?php
   
   include "loggg.php";
   ?>

<div class="container">
    <header>login</header>
    <?php if(isset($_GET['error'])){?>
  <p class="error"><?php echo $_GET['error'];?> </p>
  <?php
  
}
  ?>
     <?php
      if(isset($message)){
        echo '<label>'. $message .'</label>';

      }

      ?>
   
 
   
    <form action="#" method="post">
    <label> Username</label> 
        <input  type="text"  class="textbox" name="user"></br> </br>
      <label>Password</label> 
      <input type="password" class="textbox" name="password"> </br></br>
      <button name="login">submit</button>


    </form>
    </div>

</body>
</html>
<!-- session_start();  -->
