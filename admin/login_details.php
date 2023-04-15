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
    $password2 = md5($pass);

    // sql query
    $sql = "SELECT * FROM admin WHERE username = '$name' AND password = '$password2'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1){
        $rows = mysqli_fetch_array($result);
        if($rows['username'] === $name && $rows['password'] === $password2){
            $_SESSION['name'] = $rows['username'];
            $_SESSION['id'] = $rows['admin_id']; 
            $_SESSION['message'] = "You're successfully logged in";
            header("Location: index.php");
            die();
        }
        else{
            // echo "Invalid username or password";
            $_SESSION['message'] = "Invalid username or password";
            header("Location: login.php");
            die();
        }
    }else{
        // echo "Invalid username or password";
        $_SESSION['message'] = "Invalid username or password";
        header("Location: login.php");
        die();
    }
}
?>