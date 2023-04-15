<?php
session_start();
include "../db.php";
if(isset($_POST['submit-btn'])){
    $category_name = $_POST['category-name'];
    
    $target_dir = "images/";
    // $uploadOk = 1;
    $target_file = $_FILES['category-image']['name'];
    $image_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // $check = getimagesize($_FILES["category-image"]["tmp_name"]);
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

    $sql = "INSERT INTO category (category_id, category_name, category_image) VALUES (NULL, '$category_name', '$target_file')";
    $result = mysqli_query($conn, $sql);
    if($result){
        move_uploaded_file($_FILES["category-image"]["tmp_name"], $target_dir."/".$target_file);
        $_SESSION['msg'] = "Uploaded successfully";
        header("Location: addcategory.php");
        die();
    }else{
        $_SESSION['error'] = "Something wrong occurred";
        header("Location: addcategory.php");
        die();
    }
}
else if(isset($_POST['edit-btn']))
{
    $cid = $_POST['category-id'];
    $category_name = $_POST['category-name'];
    
    $target_dir = "images/";
    // $uploadOk = 1;
    $new_image = $_FILES['category-image']['name'];
    $image_file = strtolower(pathinfo($new_image, PATHINFO_EXTENSION));
    $old_image = $_POST['old-image'];

    if($new_image != ""){
        $update_filename = $new_image;
    }else{
        $update_filename = $old_image;
    }
    
    $update_query = "UPDATE category SET category_name = '$category_name', category_image = '$update_filename' WHERE category_id = '$cid'";
    $update_query_run = mysqli_query($conn, $update_query);
    if($update_query_run){
        if($_FILES['category-image']['name'] != ''){
            move_uploaded_file($_FILES["category-image"]["tmp_name"], $target_dir.''.$new_image);
            if(file_exists($target_dir.''.$old_image)){
                unlink($target_dir.''.$old_image);
            }
        }
        // echo $update_filename;
        $_SESSION['mess'] = "Updated Successfully";
        header("Location: editCategory.php?id=$cid");
        die();
    }else{
        $_SESSION['error'] = "Something Went Wrong";
        header("Location: editCategory.php?id=$cid");
        die();
    }
}
?>
