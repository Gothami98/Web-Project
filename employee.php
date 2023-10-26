<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   
   <title>Employee Page</title>
   <style>
      body {
         display: flex;

         align-items: center;
         justify-content: space-between;
         height: 100vh;
         margin: 0;
         background-image: url('1998123.jpg'); 
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
      #left-side {
         background-color: #f1f1f1;
         padding: 20px;
         width: 50%;
         text-align: center;
      }
      #right-side {
         display: flex;
         flex-direction: column;
         align-items: center;
         width: 50%;
      }
      a {
         background-color: #2a1ee0;
         color: #fff;
         padding: 10px 100px;
         margin: 10px;
         border-width: 5px;
         border-radius: 15px;
         text-align: center;
         cursor: pointer;
         font-size: 20px;
      }
      a:hover {
            background-color: #3be6d2;
        }
      
     
   </style>
</head>
<body>
<div class="header">
    <a href="logout.php">Logout</a>
</div>
   <div id="left-side">
      <h1>Welcome <br>              to our Employee page!</h1>
   </div>
   <div id="right-side">

      <a href="emp.html" target="_blank">Registration</a><br><br>
      <a href="empdisplay.html" target="_blank">View your assign Task</a>
      
   
</body>
</html>
