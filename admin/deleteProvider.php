<?php
include "../db.php";

$delete_id = $_POST['id'];
// fetch the image
$sql_query = "SELECT * FROM provider WHERE provider_id = '$delete_id'";
$sql_run = mysqli_query($conn, $sql_query);
$provider_data = mysqli_fetch_array($sql_run);
$image = $provider_data['profile_pic'];
$sql = "DELETE FROM provider WHERE provider_id = '$delete_id'";
$result = mysqli_query($conn, $sql);
if($result){
    if(file_exists("../provider/".$image)){
        unlink("../provider/".$image);
    }
   echo 200;
}else{
   echo 500;
}
?>