<?php
include "../db.php";
$delete_id = $_POST['id'];
// fetch the image
$sql_query = "SELECT * FROM category WHERE category_id = '$delete_id'";
$sql_run = mysqli_query($conn, $sql_query);
$category_data = mysqli_fetch_array($sql_run);
$image = $category_data['category_image'];
$sql = "DELETE FROM category WHERE category_id = '$delete_id'";
$result = mysqli_query($conn, $sql);
if ($result){
    // check if the image exists
    if(file_exists($image)){
        unlink($image);
    }
    echo 200;
}else{
    echo 500;
}

?>