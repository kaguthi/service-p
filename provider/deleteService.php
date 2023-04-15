<?php
include "../db.php";
$sid = $_POST['id'];
// fetch the image
$sql_query = "SELECT * FROM services WHERE service_id = '$sid'";
$sql_run = mysqli_query($conn, $sql_query);
$service_data = mysqli_fetch_array($sql_run);
$image = $service_data['service_image'];

$sql = "DELETE FROM services WHERE service_id = '$sid'";
$result = mysqli_query($conn, $sql);
if($result){
    if(file_exists($image)){
        unlink($image);
    }
    echo 200;
}else{
    echo 500;
}
?>