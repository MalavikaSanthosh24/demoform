
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION["username"])){
  echo "welcome" . $_SESSION["username"];
  
}
else{
  header("location:loginmain.php");
}

?>
<a href="logout.php">logout</a> 
    <!-- <h1>Login successfull, welcome to home page <?php  echo $_SESSION["username"];?></h1>
    <a href="logout.php">logout</a> -->
    <?php
    include('connection.php');
    $name =$_SESSION["username"];
    $query = "select * from register where user= :name";
    $statement=$pdodbcon->prepare($query);
    
    $data=[':name' => $name];
    $statement->execute($data);
     $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if($result)
    {
      foreach($result as $row){

      ?>
       
     
  
        <td><?php echo $row['emailid'];?> </td>
        <td><b><?php echo $row['phone'];?> </td>
        <h4><b><?php echo $row['user'];?> </b></h4> 
        <h4><b><?php echo $row['password'];?> </b></h4> 
        <?php
        
         
         }  
    }
     
     
      ?>
</body>
</html>