<?php
include_once "../db.php";
if (isset($_POST['submit-btn'])){
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // regular expression
    $name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $number = "/^[0-9]+$/";

    // validate the input
    // username
    if(!preg_match($name, $username)){
        $_SESSION['message'] = "name $username is invalid";
        header("Location: register.php");
        die();
    }
    // lastname
    if(!preg_match($name, $lastname)){
        $_SESSION['message'] = "name $lastname is invalid";
        header("Location: register.php");
        die();
    }
    // email
    if(!preg_match($emailValidation, $email)){
        $_SESSION['message'] = "email $email is invalid";
        header("Location: register.php");
        die();
    }
    // telephone
    if(!preg_match($number, $telephone)){
        $_SESSION['message'] = "$telephone is invalid";
        header("Location: register.php");
        die();
    }
    // password
    if($repassword !== $password){
        $_SESSION['message'] = "passwords don't match";
        header("Location: register.php");
        die();
    }

    $target_dir = "profile/";
    $uploadOk = 1;
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $image_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // hash the password
    // $password2 = md5($password);

    // check to see if the email exist
    $check_email = "SELECT provider_id FROM provider WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $check_email);
    $count_email = mysqli_num_rows($result);
    if ($count_email > 0){
        $_SESSION['message'] = "email address already exists";
        header("Location: register.php");
        die();
    }else{
        $submit_query = "INSERT INTO provider (provider_id, username, lastname, email, telephone, password, profile_pic) VALUES (NULL, '$username', '$lastname', '$email', '$telephone', '$password', '$target_file')";
        $query = mysqli_query($conn, $submit_query);
        if($submit_query){
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            $_SESSION['message'] = "Registered Successfully";
            header("Location: login.php");
            die();
        }
        else{
            $_SESSION['message'] = "Invalid username or password";
            header("Location: register.php");
            die();
        }
    }
}
?>