<!DOCTYPE html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php 
            include 'db_conn.php';
            //$id = $_Get['id'];
            //echo $id;
            if(isset($_POST['submit']) != TRUE) {
                $id = $_GET['id'];
                $fname = $_GET['fname'];
                $lname = $_GET['lname'];
                $em = $_GET['email'];
                $a   = $_GET['age'];  
            } else {
                $id = $_GET['id'];
                $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
                $lastname  = mysqli_real_escape_string($conn,$_POST['lname']);
                $email     = mysqli_real_escape_string($conn, $_POST['email']);
                $age       = mysqli_real_escape_string($conn, $_POST['age']);
                //echo $firstname . $lastname . $email . $age;
                $sql_email_check = "SELECT * FROM pinfo where email='$email' AND id!='$id';";
                $email_count = $conn->query($sql_email_check);

                if($email_count->num_rows > 0) {
                    echo "<script>alert('Email already exist');</script>";
                } else {
                    if($age > 0) {
                        $sql_update = "UPDATE pinfo SET fname='$firstname', lname='$lastname', email='$email', age='$age' WHERE id='$id';";
                        $result = $conn->query($sql_update);
                        if($result) {
                            echo "<script>alert('Update successful');</script>";
                        }
                    } else {
                        echo "<script>alert('Age must be greater than zero');</script>";                
                    }
                }
            }
        ?>
        
        <center>
        <h1>Input Data - Update</h1>
        <a href="main.php"><button class="home-btn">Home</button></a>
            <form action="<?php echo 'update.php?id='.$_REQUEST['id'];?>" method="POST">
                <table>
                    
                    <tr>
                        <td><label for="fname">First name</label></td>
                        <td><input type="text" name="fname" id="fname" value="<?php if(isset($_POST['submit'])) {echo $firstname;} else{echo $fname;}?>"></td>
                    </tr>

                    <tr>
                        <td><label for="lname">Last name</label></td>
                        <td><input type="text" name="lname" id="lname"  value="<?php if(isset($_POST['submit'])) {echo $lastname;} else{echo $lname;}?>"></td>
                    </tr>

                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" name="email" id="email" value="<?php if(isset($_POST['submit'])) {echo $email;} else{echo $em;}?>"></td>
                    </tr>
                    <tr>
                        <td><label for="age">Age</label></td>
                        <td><input type="number" name="age" id="age" value="<?php if(isset($_POST['submit'])) {echo $age;} else{echo $a;}?>"></td>
                    </tr>
                    <tr>
                        <td><input class="action-btn" type="submit" name="submit" value="Update"></td>
                        <td style="text-align:center"><input class="del-btn" type="reset" value="Reset"  ></td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>
