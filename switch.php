<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .user{
            margin-right: 30px;
        }
        .user a, .developer a{
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <center><h2>Sign up</h2></center>
    <div class="container">
        <div class="user">
            <a href="register.php">Sign up as user</a>
        </div>
        <div class="developer">
            <a href="provider/register.php">Sign up as service provider</a>
        </div>
    </div>
</body>
</html>