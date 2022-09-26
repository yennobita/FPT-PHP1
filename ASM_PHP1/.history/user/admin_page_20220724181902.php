<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>admin</title>
    <style>
    .container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        padding-bottom: 60px;
    }
    .container .content {
        text-align: center;
    }
    .container .content h3 {
        font-size: 30px;
        color: #333;

    }
    .container .content a {
        padding: 10px 30px;

    }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>hi <span>admin</span></h3>
        </div>
        <a href="/user/login_form.php" class="btn">Login</a>
        <a href="/user/register_form.php" class="btn">Register</a>
        <a href="/user/logout.php" class="btn">Logout</a>
    </div>
    
</body>
</html>