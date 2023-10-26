<?php

$eid = $_POST["eid"];
$tel = $_POST["tel"];
$name1 = $_POST["name1"];
$ema = $_POST["ema"];
$desig = $_POST["desig"];

$conn=mysqli_connect('localhost','root','','project');

$sql = "INSERT INTO employee(Eid,Telephone,Name,Email,Designation) VALUES('$eid','$tel','$name1','$ema','$desig')";

if(mysqli_query($conn,$sql)){
    echo "New Record Create Successfully!";

}else
echo "Error:".$sql."<br>".mysqli_error($conn);
mysqli_close($conn)


?>