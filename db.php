<?php
$server = "localhost";
$user = "root";
$passwd = "";
$database = "service_provider";

// connection to the database
$conn = mysqli_connect($server, $user, $passwd, $database);
if (!$conn){
    echo "error". mysqli_error();
}
?>