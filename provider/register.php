<?php
session_start();
if(isset($_SESSION['username'])){
    $_SESSION['message'] = "You're already logged in";
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body{
            background-color: lightgrey;
        }
        .card{
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        span{
            position: absolute;
            font-size: 12px;
            color: red;
            bottom: 12px;
            right: 17px;
        }
        .mb-3{
            position: relative;
        }
        input{
            outline: none;
        }
    </style>
</head>
<body>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php if(isset($_SESSION['message'])){?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>
                            <?= $_SESSION['message'];?>
                        </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['message']);
                    }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h2>Register</h2>
                        </div>
                        <div class="card-body">
                            <form action="register_details.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3 mt-3">
                                    <input type="text" name="username" id="username" placeholder="Enter first name" class="form-control" autofocus required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="lastname" id="lastname" placeholder="Enter last name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" name="email" id="email"placeholder="Enter email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <input type="tel" name="telephone" id="telephone" placeholder="Enter phone number" class="form-control" required> 
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" id="password" placeholder="Enter password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="repassword" id="repassword" placeholder="confirm password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <input type="file" name="image" id="image" placeholder="Select an image" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" value="Sign Up" class="form-control btn btn-primary" name="submit-btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</body>
</html>