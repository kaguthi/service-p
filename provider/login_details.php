<?php
session_start();
include "../db.php";
if(isset($_POST['submit-btn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    #function to validate the inputs
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
    $name = test_input($username);
	$pass = test_input($password);

    // hash the password
    // $password2 = md5($pass);

    // sql query
    $sql = "SELECT * FROM provider WHERE username = '$name' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1){
        // check if they match
        $rows = mysqli_fetch_array($result);
        if($rows['username'] === $name && $rows['password'] === $pass){
            $_SESSION['username'] = $rows['username'];
            $_SESSION['uid'] = $rows['provider_id'];
            $_SESSION['message'] = "You're Logged in";
            header("Location: index.php");
            die();
        }
        else{
            $_SESSION['message'] = "Invalid username or password";
            header("Location: login.php");
            die();
        }
    }else{
        $_SESSION['message'] = "Invalid username or password";
        header("Location: login.php");
        die();
    }
}
?>