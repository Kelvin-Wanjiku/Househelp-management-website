<?php
require 'config.php';
if(isset($_POST["submit"])){
   $title = $_POST["title"];
   $content = $_POST["content"];
   if($_SESSION["login"]){
      $id_ = $_SESSION["id"];
      $search = mysqli_query($conn, "SELECT * FROM user_login WHERE id = '$id_'");
      if(mysqli_num_rows($search)>0){
         $query = "INSERT INTO feedback VALUES('','$id_', '$title', '$content' )";
         mysqli_query($conn, $query);
         echo
         "<script> alert('feedback is sent successfully'); </script>";
      }
      else{
         echo"<script> alert('id doesnt exist in the database'); </script>";
      }
     
   }
   else{
      echo
      "<script> alert('You must be logged in to provide feedback');</script>";
   }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>HOME</title>
   <link rel="stylesheet" href="./home.css">
   <script src="https://kit.fontawesome.com/3f3b37584c.js" crossorigin="anonymous"></script>
</head>
<body>
   <div class="wrapper">
      <div class="sidebar">
         <h2> <i class="fa-solid fa-bars"></i>MENU </h2>
         <br> <br>
         <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="./OurMaids.php"><i class="fa-thin fa-magnifying-glass"></i>Our maids/profile</a></li>
            
            <li><a href="./OurServices.php"><i class="fa-regular fa-bell-concierge"></i>Our services</a></li>

            <li><a href="./howItWorks.php"><i class="fa-solid fa-circle-question"></i>How it works</a></li>
            <li><a href="feedback.php"><i class="fa-solid fa-circle-question"></i>Feedback</a></li>
            
            <li><a href="#"><i class="fa-regular fa-commentcontent</a></li>
            <li> <a href="#">Rate Us</a></li>
         <br>
         <div class="reachOut">
          <a href=" https://wa.me/707429670"><img src="./whatsapp.avif" style="width: 50px;height:60px"> </a> 
          <a href="www.facebook.com"><img src="./facebook.png" style="width: 60px;height:60px"></a> 
         </div>
            <div class="sign-up">
               <ul>
               <li><a href="logout.php"><i class="fa-duotone fa-right-to-bracket"></i>Logout</a></li>
                  <li><a href="login.php"><i class="fa-duotone fa-right-to-bracket"></i>Login</a></li>
                  <li><a href="registration.php"><i class="fa-light fa-user-plus"></i>Sign up</a></li>
               </ul>
            </div>
            
         </ul>
      </div>
      <div class="main-content">
         <div class="header"><h2>Homly website</h2> <p><i> your one-stop solution for finding reliable and trustworthy househelp services.</i></p>   </div>
         <h1>Feedback</h1>
    <p> <b>We appreciate your feedback! Please fill out the form below:</b> </p>
    <form action="" method="POST">

      <label for="title">Title:</label>
      <input type="text" id="title" name="title" required><br>


      <label for="content">Feedback:</label><br>
      <textarea id="content" name="content" rows="5" cols="40" required></textarea><br>

      <button type="submit" name= "submit" value="Submit"> Submit</button>
         
      </div>
   </div>
   
</body>
</html>