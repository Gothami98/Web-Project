<!DOCTYPE html>
<html>
<head>
    <title>Assign</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e3e6e9;
            margin: 0;
            padding: 0;
            background-image: url('789.jpg'); 
            background-repeat: no-repeat;
            background-position: center bottom;
            background-attachment: fixed;
            background-size: cover;
        }

        h1 {
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            font-size: 75px;

        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgb(85, 179, 222);
            border: 1px solid black;
            border-radius: 5px;
            padding: 20px;
            box-sizing: border-box;
        }

        table {
            width: 100%;
        }

        td {
            padding: 5px;
            font-family: 'Times New Roman', Times, serif;
            font-style: normal;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #fff;
        }

        input[type="submit"] {
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        a:link, a:visited {
            background-color: blue;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            }
            a:hover, a:active {
            background-color: red;
            }

        @media (max-width: 768px) {
            form {
                padding: 10px;
            }
        }

    </style>
</head>
<body>
    <h1>Assign Table</h1>
    <br>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Employee ID</td>
                <td>
                <select name="EmpID" id="EmpID">

<?php
$dbname="project";

$conn=mysqli_connect("localhost","root" , "" , "project");

if(!$conn){
  die ("Connection faild:" . mysqli_connect_error());
  }


    $sql = "SELECT Eid FROM employee";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
     echo "<option value='" . $row['Eid'] . "'>" . $row['Eid'] . "</option>";
    }
} else {
echo "<option value=''>No Task IDs found</option>";
  }

$conn->close();

?>


</select>
                </td>
            </tr>
            <tr>
                <td>Task ID</td>
                <td>
                        <select name="Tasktid" id="Tasktid">

                            <?php
                        $dbname="project";

                            $conn=mysqli_connect("localhost","root" , "" , "project");

                        if(!$conn){
                              die ("Connection faild:" . mysqli_connect_error());
                              }
                        

                                $sql = "SELECT Tid FROM task";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {

                                    while($row = $result->fetch_assoc()) {
                                 echo "<option value='" . $row['Tid'] . "'>" . $row['Tid'] . "</option>";
                                }
                            } else {
                            echo "<option value=''>No Task IDs found</option>";
                              }

                        $conn->close();

                            ?>
                            
                           
                        </select>
                    </td>
            </tr>
            <tr>
                <td>Assign Date</td>
                <td><input type="date" name="name1" required>
                </td>
            </tr>
            <tr>
                <td>Activity ID</td>
                <td>
                        <select name="actId" id="actId" autocomplete="off">

                            <?php
                        $dbname="project";

                            $conn=mysqli_connect("localhost","root" , "" , "project");

                        if(!$conn){
                              die ("Connection faild:" . mysqli_connect_error());
                              }
                        

                                $sql = "SELECT ActivityID FROM takactivitites";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {

                                    while($row = $result->fetch_assoc()) {
                                 echo "<option value='" . $row['ActivityID'] . "'>" . $row['ActivityID'] . "</option>";
                                }
                            } else {
                            echo "<option value=''>No Task IDs found</option>";
                              }

                        $conn->close();

                            ?>
                            
                           
                        </select>
                    </td>
            </tr>
            <tr>
                <td>Remarks</td>
                <td><input type="text" name="Rema" required></td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="submit" value="Submit">
                </td>
            </tr>
           

        </table>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $employeeId = $_POST["EmpID"];
        $taskId = $_POST["Tasktid"];
        $assignDate = $_POST["name1"];
        $activityId = $_POST["actId"];
        $remarks = $_POST["Rema"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO assign 
                VALUES ('$employeeId', '$taskId', '$assignDate','$activityId', '$remarks')";

        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
    <div style="text-align: center; margin-top: 10px;">
        <a href="admin.php">Back to Previous Page</a></div>
             
</body>
</html>
