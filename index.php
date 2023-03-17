<?php
   require 'config.php';
   if(isset($_SESSION["usertype"])){
      $email = $_SESSION["email"];
      if($_SESSION["usertype"]== 'c'){
         $_link="./OurMaids.php";
      }
      elseif($_SESSION["usertype"]== 'w'){
         $_link="./profile.php";
      }
   }
   else{
      $_link ="login.php";
   }
   if(isset($_SESSION["login"])){
      if($_SESSION["login"]){
         $query = "SELECT first_name FROM worker WHERE email = '$email'";
         $result = mysqli_query($conn, $query);
         $name = mysqli_fetch_array($result);
         $home_msg = "Welcome ";
      }
      else{
         $home_msg = "Homly website";
      }
   }
   else{
      $home_msg = "Homly website";
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
            <li><a href= "<?php echo $_link; ?>"> <i class="fa-thin fa-magnifying-glass"></i>Our maids/profile</a></li>
            <li><a href="./OurServices.php"><i class="fa-regular fa-bell-concierge"></i>Our services</a></li>

            <li><a href="./howItWorks.php"><i class="fa-solid fa-circle-question"></i>How it works</a></li>
            
            <li><a href="feedback.php"><i class="fa-regular fa-comments"></i>Feedback</a></li>
            <li> <a href="#">Rate Us</a></li>
         <br>
         <div class="reachOut">
          <a href=" https://wa.me/707429670"><img src="./whatsapp.avif" style="width: 50px;height:60px"> </a> 
          <a href="www.facebook.com"><img src="./facebook.png" style="width: 60px;height:60px"></a> 
         </div>

            <div class="sign-up">
               <ul>
                  <li><a href="logout.php"><i class="fa-light fa-user-plus"></i>Log out</a></li>
                  <li><a href="login.php"><i class="fa-duotone fa-right-to-bracket"></i>Login</a></li>
                  <li><a href="registration.php"><i class="fa-light fa-user-plus"></i>Sign up</a></li>
                 
               </ul>
            </div>
            
         </ul>
      </div>
      <div class="main-content">
         <div class="header"><h2><?php echo "$home_msg";?></h2> <p><i> your one-stop solution for finding reliable and trustworthy househelp services.</i></p>   </div>
         <div class="info"> Welcome to Homly Househelp website, your one-stop solution for finding reliable and trustworthy househelp services.<br>
             We understand how busy life can get, and how difficult it can be to juggle work, family, and household chores all at once.
              This is where we come in, to make your life easier and more convenient. </div>
         <div class="pic1">  </div>
         <div class="pic2"></div>
         <div class="pic3"></div>
         
      </div>
   </div>
   
</body>
</html>
