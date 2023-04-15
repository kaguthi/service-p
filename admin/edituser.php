<?php
include "../db.php";
if(isset($_POST['update-btn'])){
    $user_id = $_POST["userid"];
    $username = $_POST["username"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $password = $_POST["password"];

    //hash the password 
    // $password2 = md5($password); 

    $sql = "UPDATE users SET username = '$username', lastname = '$lastname', email = '$email', telephone = '$telephone', password = '$password' WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['msg'] = "Updated Successfully";
        header("Location: user.php");
        die();
    }else{
        $_SESSION['error'] = "Something went wrong";
        header("Location: user.php");
        die();
    }
}
 
?>