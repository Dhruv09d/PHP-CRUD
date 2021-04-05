<!DOCTYPE html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <?php 
            include 'db_conn.php';
            if(isset($_POST['submit'])) {
                $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
                $lastname  = mysqli_real_escape_string($conn,$_POST['lname']);
                $email     = mysqli_real_escape_string($conn, $_POST['email']);
                $age       = mysqli_real_escape_string($conn, $_POST['age']);
                //echo $firstname . $lastname . $email . $age;
                $sql_email_check = "SELECT * FROM pinfo where email='$email';";
                $email_count = $conn->query($sql_email_check);

                if($email_count->num_rows > 0) {
                    ?>
                    <script>
                        alert("Email already exist");  
                    </script>
                    <?php
                
                } else {
                    if($age > 0) {
                        $sql_insert = "INSERT INTO pinfo (fname, lname, email, age) VALUES ('$firstname', '$lastname', '$email', '$age');";
                        $conn->query($sql_insert);

                        ?>
                        <script>
                            alert("Insertion successful");  
                        </script>
                        <?php
                        $conn->close();

                    } else {
                        ?>
                        <script>
                            alert("Age must be greater than zero");  
                        </script>
                        <?php
                    }
                }

                
            }
        ?>
        <center>
        <h1>Input Data - Create</h1>
        <a href="main.php"><button class="home-btn">Home</button></a>
            <form action="create.php" method="POST">
                <table>
                    <tr>
                        <td><label for="fname">First name</label></td>
                        <td><input type="text" name="fname" id="fname"></td>
                    </tr>

                    <tr>
                        <td><label for="lname">Last name</label></td>
                        <td><input type="text" name="lname" id="lname"></td>
                    </tr>

                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" name="email" id="email"></td>
                    </tr>
                    <tr>
                        <td><label for="age">Age</label></td>
                        <td><input type="number" name="age" id="age"></td>
                    </tr>
                    <tr>
                        <td><input class="action-btn" type="submit" name="submit" value="Submit"></td>
                        <td  style="text-align:center"><input class="action-btn" type="reset" name="reset" value="Reset" ></td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>