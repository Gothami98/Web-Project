<!DOCTYPE html>
<html lang="en">

<head>
    <title>Assign Details</title>

    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #e3e6e9;
            margin: 0;
            padding: 0;
            background-image: url('1111.jpg'); 
            background-repeat: no-repeat;
            background-position: center bottom;
            background-attachment: fixed;
            background-size: cover;
        }

        h2 {
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            font-size: 50px;
            color: #fff;

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
            background-color: #e3e6e9;
        }

        td {
            padding: 5px;
            font-family: 'Times New Roman', Times, serif;
            font-style: normal;
        }

        input[type="text"] {
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
<div id="left-side">
<h2>Assign Details</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $eid = $_POST["eid"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM assign WHERE Eid = $eid";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border=''>";
            echo "<tr><th>Eid</th><th>Tid</th><th>Date Assigned</th><th>Activity ID</th><th>Remark</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['Eid']}</td><td>{$row['TId']}</td><td>{$row['Assigndate']}</td><td>{$row['ActivityID']}</td><td>{$row['Remarks']}</td></tr>";
            }

            echo "</table>";
        } else {
            echo "No records found for Eid: $eid";
        }

        $conn->close();
    } else {
        header("Location: index.html");
    }
    ?>


<br>
<br>
<div id="right-side">

    <h2>Your Task and Activity Details</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $eid = $_POST["eid"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT a.Eid, a.TId, t.Name, ta.Activity
                FROM assign a
                INNER JOIN task t ON a.TId = t.TId
                INNER JOIN takactivitites ta ON a.ActivityID = ta.ActivityID
                WHERE a.Eid = $eid";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Eid</th><th>Tid</th><th>Name</th><th>Activity</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['Eid']}</td><td>{$row['TId']}</td><td>{$row['Name']}</td><td>{$row['Activity']}</td></tr>";
            }

            echo "</table>";
        } else {
            echo "No records found for Eid: $eid";
        }

        $conn->close();
    } else {
        header("Location: index.html");
    }
    ?>
    <br>
    <div style="text-align: center; margin-top: 10px;">
    <a href="employee.php">Back to Previous Page</a></div>

</body>

</html>