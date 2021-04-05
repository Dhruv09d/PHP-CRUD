<?php

//assign credentials

$servername = "localhost";
$username = "root";
$password = "Lastofus@2020";
$dbname = "newinfo";


$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
    die("Connection failed ". $conn->connect_error);
} else {
    ?>
        <script>
            alert("Connection successful");  
        </script>
    <?php
}

?>