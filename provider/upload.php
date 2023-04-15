<?php
session_start();
include_once "../db.php";
if (isset($_POST['submit-btn'])){
    $service_name = $_POST['service-name'];
    $service_price = $_POST['service-price'];
    $description = $_POST['description'];   
    $category_name = $_POST['category-name'];   
    $user_id = $_SESSION['uid'];
    $target_dir = "uploads/";
    // $uploadOk = 1;
    $target_file = $_FILES['service-image']['name'];
    $image_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if($image_file != "jpg" && $image_file != "jpeg" && $image_file != "png"){
        $_SESSION['error'] = "Sorry, only PNG, JPG, JPEG allowed";
        header("Location: addcategory.php");
        die();
    }
    if(file_exists($target_dir."/".$target_file)){
        $_SESSION['error'] = "File already exists";
        header("Location: addcategory.php");
        die();
    }
    $sql = "INSERT INTO services (service_id, service_name, service_price, service_image, description, provider_id, category_name) VALUES (NULL, '$service_name', '$service_price', '$target_file', '$description','$user_id', '$category_name')";
    $result = mysqli_query($conn, $sql);
    if($result){
        move_uploaded_file($_FILES["service-image"]["tmp_name"], $target_dir."/".$target_file);
        $_SESSION['msg'] = "Uploaded successfully";
        header("Location: addservice.php");
        die();
    }else{
        $_SESSION['error'] = "Something wrong occurred";
        header("Location: addservice.php");
        die();

    }
}else if(isset($_POST['edit-btn'])){
    $service_id = $_POST['service-id'];
    $service_name = $_POST['service-name'];
    $service_price = $_POST['service-price'];
    $description = $_POST['description'];   
    $category_name = $_POST['category-name'];   
    $user_id = $_SESSION['uid'];
    $target_dir = "uploads/";

    $new_image = $_FILES['service-image']['name'];
    $old_image = $_POST['old-image'];

    // check if image is empty
    if($new_image != ""){
        $update_image = $new_image;
    }else{
        $update_image = $old_image;
    }

    $update_query = "UPDATE services SET service_name = '$service_name', service_price = '$service_price', service_image = '$update_image', description = '$description', provider_id ='$user_id', category_name = '$category_name' WHERE service_id = '$service_id'";
    $update_query_run = mysqli_query($conn, $update_query);
    if($update_query_run){
        if($_FILES['service-image']['name'] != ""){
            move_uploaded_file($_FILES['service-image']['tmp_name'], $target_dir."/".$new_image);
            if(file_exists($target_dir."/".$old_image)){
                unlink($target_dir."/".$old_image);
            }
        }
        $_SESSION['msg'] = "Uploaded successfully";
        header("Location: editService.php?id=$service_id");
        die();
    }else{
        $_SESSION['error'] = "Something Went Wrong";
        header("Location: editService.php?=$service_id");
        die();
    }
}
?>