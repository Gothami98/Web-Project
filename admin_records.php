<!DOCTYPE html>

<head>
    
    <title>Employee and Their Assign Task Record View</title>
    <style>

        body{
            font-family: 'Times New Roman', Times, serif;
            background-color: #e3e6e9;
            margin: 0;
            padding: 0;
            background-image: url('empl.jpg'); 
            background-repeat: no-repeat;
            background-position: center bottom;
            background-attachment: fixed;
            background-size: cover;
              
            }

        h1 {
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            font-size: 50px;
        }
            
        table {
            width: 100%;
        }
        td {
            padding: 5px;
            font-family: 'Times New Roman', Times, serif;
            font-style: normal;
            text-align: center;
            background-color: aqua;
        }
        th{
            padding: 5px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            background-color: blue;

        }
                </style>
                </head>
                <body>
                <h1>Employee and Their Assign Task Record View</h1>

               
                <table>
                <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Task ID</th>
                <th>Task Name</th>

                </tr>
        <?php
       $dbname="project";

       $conn=mysqli_connect("localhost","root" , "" , "project");


   if(!$conn){
         die ("Connection faild:" . mysqli_connect_error());
         }
        

$sql = "SELECT employee.Eid, employee.Name as EmployeeName, task.TId, task.Name as TaskName
                FROM employee
                INNER JOIN assign ON employee.Eid = assign.Eid
                INNER JOIN task ON assign.TId = task.TId";
        
        $result = $conn->query($sql);
  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["Eid"]."</td>
                        <td>".$row["EmployeeName"]."</td>
                        <td>".$row["TId"]."</td>
                        <td>".$row["TaskName"]."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data available</td></tr>";
        }
        
        $conn->close();
        ?>

 
    </table>
    <div style="text-align: center; margin-top: 10px;">
    <a href="admin.php">Back to Previous Page</a></div>
   
                </body>
             
</html>