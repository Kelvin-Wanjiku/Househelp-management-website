<?php
  require 'config.php';
  if(isset($_POST["submit"])){
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $phoneNo = $_POST["phoneNo"];
    $service = $_POST["service"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $gender = $_POST["gender"];
    $location = $_POST["location"];

    
    $duplicate = mysqli_query($conn, "SELECT * FROM user_login WHERE email = '$email'");
    if(mysqli_num_rows($duplicate)> 0){
        echo("<script> alert('email has already been taken'); </script>");
    }
    else{
        if($password == $confirmPassword){
          $query = "INSERT INTO user_login VALUES('', '$email','$password', 'c')";
          mysqli_query($conn, $query);
          $query = "INSERT INTO client VALUES('', '$firstName', '$middleName', '$surname', '$email', '$phoneNo', '$service', '$gender', '$location' )";
          mysqli_query($conn, $query);
          
          $_SESSION["login"] = true;
          $query = "SELECT id FROM user_login WHERE email='$email'";
          $u_id = mysqli_query($conn, $query);
          $_SESSION["id"]= $u_id;
          $_SESSION["email"] = $email;
          $_SESSION["usertype"]='c';

          header("location:index.php");

        }
        else{
          echo
          "<script> alert('Password does not match'); </script>";
        }

      }
      
  }
    
    // $query = "DELETE FROM client WHERE email = '$email'";
    // mysqli_query($conn, $query);
    //  echo("<script> alert('Registration failed') ");
    // header ("location: logout.php");

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Client registration</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   <style>
    h2{
        text-align: center;
    }
    form {
  max-width: 600px;
  margin: auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-family: Arial, sans-serif;
}

label {
  display: inline-block;
  width: 150px;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="phoneNo"],
select {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 10px;
  font-size: 16px;
}

input[type="radio"] {
  display: inline-block;
  margin-right: 10px;
}

button[type="submit"],
button[type="reset"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-right: 10px;
}

button[type="submit"]:hover,
button[type="reset"]:hover {
  background-color: #45a049;
}

.error {
  color: red;
  margin-bottom: 10px;
}

</style>
</head>
<body>
<h2>Client Registration Form</h2>

<form method="post" id="registration-form" action="" name="registrationForm" onsubmit="return validateForm()">
   
   <label for="firstName">First Name:</label>
   <input type="text" id="firstName" name="firstName" required><br><br>

   <label for="middleName">Middle Name:</label>
   <input type="text" id="middleName" name="middleName" required><br><br>

   <label for="Surname"> Surname:</label>
   <input type="text" id="surname" name="surname" required><br><br>

   <label for="email">Email:</label>
   <input type="email" id="email" name="email" required><br><br>

   <label for="phoneNo">Phone number:</label>
   <input type="phoneNo" id="phoneNo" name="phoneNo" required><br><br>


   <label for="Service">Service needed:</label>
		<select id="service" name="service"  required>
			
			<option name="service" value="h">househelp</option>
			<option name="service" value="c">caregiver</option>
			<option name="service" value="n">Nanny</option>
			
		</select><br><br>
     
   <label for="password">Password:</label>
   <input type="password" id="password" name="password" required><br><br>

   <label for="confirmPassword">Confirm Password:</label>
   <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>

   <label for="gender">Gender:</label>
   <input type="radio" id="male" name="gender" value="m" required>
   <label for="male">Male</label>
   <input type="radio" id="female" name="gender" value="f" required>
   <label for="female">Female</label>
   <input type="radio" id="other" name="gender" value="o" required>
   <label for="other">Other</label><br><br>

   <label for="location">location:</label>
   <input type="text" id="location" name="location" required><br><br>
   <input type="checkbox" required>
   <label for= "terms"><a href="clientTerms.php">I agree to terms & conditions</a> </label> <br><br> 

   

   <button type="submit"  name= "submit" value="Submit" > Submit</button>
   <button type="reset" name="reset" value="Reset"> Reset </button>

</form>

 

<!-- <script>
  
//   // get the registration form
// const regForm = document.getElementById("registration-form");

// add event listener to the form's submit button
regForm.addEventListener("submit", (e) => {
  // prevent the form from submitting
  e.preventDefault();

  // display the terms and conditions modal
  const modal = document.getElementById("terms-modal");
  modal.style.display = "block";

  // add event listener to the "accept" button
  const acceptBtn = document.getElementById("accept-terms-btn");
  acceptBtn.addEventListener("click", () => {
    // redirect to home page
    window.location.href ="index.php";
  });
});
function rejectTerms(){
    $query = "DELETE FROM client WHERE email = $email";
    mysqli_query($conn, $query);
    // echo("<script> alert('Registration failed') ");
    header ("location: logout.php"); -->

//   }
<!-- // const rejectBtn = document.getElementById("rejectTerms");
//   acceptBtn.addEventListener("click", () => {
//     // redirect to home page
//     window.location.href ="logout.php";
//   }); -->


</script> -->
</body>
</html>