<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin.php');

      }elseif($row['user_type'] == 'employee'){

         $_SESSION['user_name'] = $row['name'];
         header('location:employee.php');

      }elseif($row['user_type'] == 'Manager'){

         $_SESSION['user_name'] = $row['name'];
         header('location:records.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
   <title>login form</title>

   <style>
        body{
         background-image: url('leadspace.png'); 
            background-repeat: no-repeat;
            background-position: center bottom;
            background-attachment: fixed;
            background-size: cover;
      }
      .header {
    position: fixed;
    top: 5px;
    left: 0;
    right: 0;
    background-color: whitesmoke;
    height: 60px;
}

.header a {
   position: absolute;
    top: 10px;
    right: 10px;
    text-decoration: none;
    padding: 5px 10px;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: darkblue;
}
      .header a:hover {
            background-color: black;
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
            font-family: 'Times New Roman', Times, serif;
        }

        .form-btn:hover {
            background-color: #2980b9;
        }

        .error-msg {
            color: #e74c3c;
        }

        .form-container {
            border-radius: 5px;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgb(85, 179, 222);
            border: 1px solid black;
        }

        h2 {
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

   </style>

</head>
<body>
<div class="header">
    <a href="index.html">Back To Home</a>
</div>
<br><br><br>
   
<h2>login now</h2>
   
<div class="form-container">

   <form action="" method="post">
      
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <label>Enter your Email</label><br>
      <input type="email" name="email" required ><br><br>
      <label>Enter password</label><br>
      <input type="password" name="password" >
      <input type="submit" name="submit" value="login " class="form-btn">
      <p>don't have an account? <a href="register_form.php">Sign-up</a></p>
   </form>

</div>

</body>
</html>