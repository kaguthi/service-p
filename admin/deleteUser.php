<?php
include "../db.php";
$delete_id = $_POST['id'];
$sql = "DELETE FROM users WHERE user_id = '$delete_id'";
$result = mysqli_query($conn, $sql);
if($result){
    echo 200;
}else{
    echo 500;
}
?>