<?php
include "db.php";
include "function/function.php";
$text = $_POST["text"];
$output = "";
$sql_query = "SELECT * FROM category WHERE category_name LIKE'%$text%'";
$sql_run = mysqli_query($conn, $sql_query);
if (mysqli_num_rows($sql_run) < 1){
    $output .= "<h3 class='text-center my-3'>No Results</h3>";
}
while($row = mysqli_fetch_array($sql_run)){
    $output .= search($row["category_image"], $row["category_name"]);
}
?>