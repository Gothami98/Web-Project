<!DOCTYPE html>
<html>
    <head>
        <title>
        Activity Registration
        </title>

        <style>
            body{
            font-family: 'Times New Roman', Times, serif;
            background-color: #e3e6e9;
            margin: 0;
            padding: 0;
            background-image: url('123.jpg'); 
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
        td {
            padding: 5px;
            font-family: 'Times New Roman', Times, serif;
            font-style: normal;
        }
        
        table {
            width: 100%;
        }
        td[type="submit"] {
            background-color: blue;
            color: white;
            padding: 10px 10px;
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

    <body  >

        <h1>TASK Activities</h1>

        <form method="POST" form id="taskForm">
          
            <table >
                <tr>
                    <td for="Tasktid">Task id</td>
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
                    <td>
                        Activity
                    </td>
                    <td>
                        <input type="text" id="activity" name="Act" required/>
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td type="submit" onclick="addTask()">Add Task</td>
                                        
                </tr>

                <tr>
                    <td>  </td>
                    <td>
                    <ul id="taskList"></ul>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                   
                   
                    <td type="submit" onclick="saveToDatabase()">Save to DB</td>
                </tr>
                <tr>
              <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
           </form>
        
        </table>
       
    

        <script>
        function addTask() {
            var Tasktid = document.getElementById('Tasktid').value;
            var activity = document.getElementById('activity').value;

            var listItem = document.createElement('li');
            listItem.textContent = 'Task ID: ' + Tasktid + ', Activity: ' + activity;

            document.getElementById('taskList').appendChild(listItem);
        }

        function saveToDatabase() {
            var taskElements = document.getElementById('taskList').getElementsByTagName('li');
            for (var i = 0; i < taskElements.length; i++) {
                console.log(taskElements[i].textContent);
              
            }
            
           
            document.getElementById('taskForm').action = 'assgnTAsk.php';
            document.getElementById('taskForm').submit();
        }
    </script>
 <div style="text-align: center; margin-top: 10px;">
        <a href="admin.php">Back to Previous Page</a></div>
    </body>
</html>