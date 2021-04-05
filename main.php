<?php include_once "db_conn.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>
        <?php
            if(isset($_GET['del'])) {
                $id = $_GET['id'];
                $sql_del = "DELETE FROM pinfo WHERE id='$id';";
                echo "<script>confirm('Do you want to delete record: $id?')</script>";
                if($conn->query($sql_del)) {
                    echo "<script>alert('Successfully delted record: $id')</script>";
                    header("location: main.php");
                } else {
                    echo "<script>alert('Error in executing query')</script>";
                    header("location: main.php");
                }
            }
        ?>
        <center>
            <h1>Say Hello To Mr.CRUD</h1>
            <a href="create.php"><button class="home-btn">+New</button></a>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Registration date</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php 
                    $sql_fetch_all = "SELECT * FROM pinfo;";
                    if($result = $conn->query($sql_fetch_all)) {
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>". $row['id']. "</td>";
                                echo "<td>". $row['fname']. " " . $row['lname'] . "</td>";
                                echo "<td>". $row['email']. "</td>";
                                echo "<td>". $row['age']. "</td>";
                                echo "<td>". $row['reg_date']. "</td>";
                                echo "<td><a href="."update.php?id=$row[id]&fname=$row[fname]&lname=$row[lname]&email=$row[email]&age=$row[age]><button class=" . "action-btn" . ">Update</button></a></td>";
                                echo "<td><a href='main.php?id=$row[id]&del=del'><button class='del-btn' >Delete</button></a></td>";
                                echo "</tr>";
                            }
                        }
                    }
                ?>
            </table>
        </center>
    </body>
</html>
