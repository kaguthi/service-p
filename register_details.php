<?php
session_start();
// import the connection file
include_once "db.php";
if (isset($_POST['username'])){
    // collect the data
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

    // hash the password
    // $password2 = md5($password);

    // check the email
    $check_email = "SELECT user_id FROM users where email = '$email' LIMIT 1";
    $check_query = mysqli_query($conn, $check_email);
    $count_email = mysqli_num_rows($check_query);
    if ($count_email > 0){
        $_SESSION['message'] = "email address already exist";
        header("Location: register.php");
        die();
    }
    // put to the database
    else{
        $sql = "INSERT INTO users (user_id, username, lastname, email, telephone, password) VALUES (NULL, '$username', '$lastname', '$email', '$telephone', '$password')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            $_SESSION['message'] = "failed to register";
            header("Location: register.php");
            die();
        }
        else{
            // echo "registered successfully";
            header("Location: login.php");
            die();
        }
    }
}
?>