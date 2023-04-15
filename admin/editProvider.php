<?php
include "../db.php";
if(isset($_POST['update-btn'])){
    $providerid = $_POST["providerid"];
    $username = $_POST["username"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $password = $_POST["password"];

    //hash the password 
    // $password2 = md5($password); 

    $sql = "UPDATE provider SET username = '$username', lastname = '$lastname', email = '$email', telephone = '$telephone', password = '$password' WHERE provider_id = '$providerid'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['msg'] = "Updated Successfully";
        header("Location: provider.php");
        die();
    }else{
        $_SESSION['error'] = "Something went wrong";
        header("Location: provider.php");
        die();
    }
}
 
?>