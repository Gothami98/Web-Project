<?php

$Tid = $_POST["Tasktid"];
$act = $_POST["Act"];


$conn=mysqli_connect('localhost','root','','project');

$sql = "INSERT INTO takactivitites(ActivityID,TId,Activity) VALUES('','$Tid','$act')";

if(mysqli_query($conn,$sql)){
    echo "New Record Create Successfully!";

}else
echo "Error:".$sql."<br>".mysqli_error($conn);
mysqli_close($conn)


?>