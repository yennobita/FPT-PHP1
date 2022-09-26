<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user.css">
    
    <title>user</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");
    * { 
       font-family: "Poppins", sans-serif;
       margin: 0;
       padding: 0;
       box-sizing: border-box;
       outline: none;
       border: none;
       text-decoration: none;
    }
    .container {
        min-height: 100vh;
        display: inline-block;
        align-items: center;
        justify-content: center;
        padding: 20px;
        padding-bottom: 60px;
    }
    .container .content {
        margin-bottom: 20px;
        text-align: center;
        
    }
    .container .content h3 {
        font-size: 30px;
        color: #333;

    }
    .container .content span {
        background: #0045fe;
        color: #fff;
        border-radius: 10px;
        font-size: 30px;
        margin: 0px 5px;


    }
    .btn {

        padding: 20px 30px;
        display: inline-block;
        background: #333;
        color: #fff;
        margin: 0px 5px;
    }
    .btn:hover {
    background: #fb9a00;
    color: #333;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>Hi,<span>user</span></h3>
        </div>
        <a href="login_form.php" class="btn">Login</a>
        <a href="register_form.php" class="btn">Register</a>
        <a href="logout.php" class="btn">Logout</a>
    </div>
    
</body>
</html>