<?php
require 'config.php';
if(isset($_POST["login"])){
   $email = $_POST["email"];
   $password = $_POST["password"];
   $result = mysqli_query($conn, "SELECT * FROM user_login WHERE email = '$email' ");
   $row = mysqli_fetch_assoc($result);
   if(mysqli_num_rows($result)>0){
      if($password== $row["password"]){
         // if (!isset($_SESSION['login'])){
         $_SESSION["login"] = true;
         $_SESSION["id"]= $row["id"];
         $_SESSION["email"] = $email;
         $_SESSION["usertype"]=$row["usertype"];
         
         header("Location: index.php");
      }
      else{
         echo
         "<script> alert('wrong password')</script>";
      }

   }
   else{
      echo
      "<script> alert('User not registered')</script>";
   }
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
</head>
<body>
   <form method="post" action="" name="loginForm">
   <label for="email"> email:</label>
   <input type="text" id="email" name="email" required><br><br>

   <label for="password"> password:</label>
   <input type="password" id="password" name="password" required><br><br>

   <button type="login" name= "login" value="login"> Login</button>
   
   </form>
   <a href="registration.php"> Register </a>
</body>
</html>