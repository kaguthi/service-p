<?php
include "db.php";
include "function/function.php";
$text = $_POST["text"];
$output = "";
// $cname = $_GET['category'];
$sql_query = "SELECT * FROM services WHERE service_name LIKE'%$text%'";
$sql_run = mysqli_query($conn, $sql_query);
if (mysqli_num_rows($sql_run) < 1){
    $output .= "<h3 class='text-center my-3'>No Results</h3>";
}
while($row = mysqli_fetch_array($sql_run)){
    $output .= searchService($row["service_id"], $row["service_name"], $row["service_image"],$row["service_price"], $row["createdAt"],);
}

?>