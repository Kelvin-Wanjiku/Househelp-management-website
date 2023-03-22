<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>registration</title>
   <style>
    .register {
        border: 1px solid #ccc; 
        padding: 20px; 
        width: 500px; 
        margin: 0 auto;
        margin-top: 100px;
        
    }
    
    h1 {
        font-size: 36px; 
        text-align: center; 
    }
    
    a {
        display: block; 
        margin: 10px 0; 
        font-size: 24px; 
        text-align: center; 
        text-decoration: none; 
    }
    
    a:hover {
        background-color: #f2f2f2; 
    }
   </style>
</head>
<body>
   <div class= "register">
   <p> 
      do you want to register as a client or workers?
   </p>
   <a href="client_registration.php"> client </a>
   <br>
   <a href="worker_registration.php"> worker </a>
   </div>
</body>
</html>