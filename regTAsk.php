<?php

$Tid = $_POST["tid"];
$N = $_POST["name1"];
$sd = $_POST["stdate"];
$ed = $_POST["endd"];
$nat = $_POST["acc"];

$conn=mysqli_connect('localhost','root','','project');

$sql = "INSERT INTO task(TId,Name,Startdate,Enddate,Nature) VALUES('$Tid','$N','$sd','$ed','$nat')";

if(mysqli_query($conn,$sql)){
    echo "New Record Create Successfully!";

}else
echo "Error:".$sql."<br>".mysqli_error($conn);
mysqli_close($conn)


?>