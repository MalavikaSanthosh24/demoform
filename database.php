<?php
session_start();
include 'connection.php';


// if(isset($_POST['dbbt'])){
//   $name= $_POST['fname'];
//   $emailid= $_POST['mail'];
//   $phone= $_POST['mob'];
//   $user= $_POST['personname'];
//   $password= $_POST['word'];

//   $pdoQuery ="INSERT INTO  register (name ,emailid , phone, user, password) VALUES(?,?,?,?,?)";
//   $pdoQuery_run= $pdodbcon->prepare($pdoQuery);
//   $pdoQuery_exec=$pdoQuery_run-> execute([$name,$emailid,$phone,$user,$password]);

//   print_r($pdoQuery_exec);
   
// }

if(isset($_POST['dbbt'])){
    
    
$_SESSION['fname']=($_POST['fname']);
$_SESSION['mail']=($_POST['mail']);
$_SESSION['mob'] =($_POST['mob']);
$_SESSION['personname']=($_POST['personname']);
$_SESSION['word']=($_POST['word']);
$_SESSION['conform'] =($_POST['conform']);
    $upper = preg_match('@[A-Z]@',$_SESSION['word']);
    $lower = preg_match('@[a-z]@', $_SESSION['word']);
    $number    = preg_match('@[0-9]@', $_SESSION['word']);
    $special = preg_match('@[^\w]@', $_SESSION['word']);
    $numberspho     =preg_match('/^[0-9]{10}+$/',   $_SESSION['mob'] );


    if(empty($_SESSION['fname'])){
        header("location:registera.php ? error=*name is required");
     }
     elseif(empty($_SESSION['mail'])){
        header("location:registera.php ? error=*email is required");
     }
     elseif(empty($_SESSION['mob'])){
      header("location:registera.php ? error= *phone number is required");
    }
    elseif(!$numberspho){
      header("location:registera.php ? error= *enter digit");
    }
    elseif(empty($_SESSION['personname'])){
        header("location:registera.php ? error=username is required");
     }
     elseif(strlen($_SESSION['personname'])<5){
      header("location:registera.php ? error=username length is short");
     }
   
    elseif(!$upper || !$lower || !$number || !$special || strlen($_SESSION['word']) < 5){
        header("location:registera.php ? error=Password should be at least 5 characters in length and should include at least one upper case letter, one number, and one special character.");

      }
      
     elseif(($_SESSION['word']) != $_SESSION['conform'] ){
      header("location:registera.php ? error=password does not match");
   }
      else{

      
  $name= $_POST['fname'];
  $emailid= $_POST['mail'];
  $phone= $_POST['mob'];
  $user= $_POST['personname'];
  $password= $_POST['word'];

  $pdoQuery ="INSERT INTO  register (name ,emailid , phone, user, password) VALUES(?,?,?,?,?)";
  $pdoQuery_run= $pdodbcon->prepare($pdoQuery);
  $pdoQuery=$pdoQuery_run-> execute([$name,$emailid,$phone,$user,$password]);



}
}


 











?>