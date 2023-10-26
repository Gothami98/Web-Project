<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   
   <title>Sign-Up form</title>
   <style>
      body{
         background-image: url('leadspace.jpeg'); 
            background-repeat: no-repeat;
            background-position: center bottom;
            background-attachment: fixed;
            background-size: cover;
      }
    .form-container {
        background-color: rgb(85, 179, 222);
        border: 1px solid black;
        border-radius: 5px;
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        box-sizing: border-box;
        margin-top: 50px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    input[type="password"] {
        width: 50%;
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #fff;
    }

    input[type="email"] {
        width: 50%;
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #fff;
    }

    .form-btn {
        background-color: blue;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        display: block;
        margin: 0 auto;
    }

    .form-btn:hover {
        background-color: #2980b9;
    }

    .error-msg {
        color: #e74c3c;
    }

    h3 {
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        font-size: 50px;
        color: aliceblue;
    }

    p {
        text-align: center;
    }

    a {
        text-decoration: none;
        color: blue;
    }
</style>


</head>
<body>
<h3>Sign-Up</h3>
<div class="form-container">

   <form action="" method="post">
      
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <label>Enter your Name</label><br>
      <input type="text" name="name" required><br><br>
      <label>Enter your Email</label><br>
      <input type="email" name="email" required><br><br>
      <label>Enter Password</label><br>
      <input type="password" name="password" required><br><br>
      <label>confirm your password</label><br>
      <input type="password" name="cpassword" required><br><br>
      <label>Your Role</label><br>
      <select name="user_type">
         <option value="employee">Employee</option>
         <option value="Manager">other</option>
         
      </select>
      <input type="submit" name="submit" value="Sing-Up now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>