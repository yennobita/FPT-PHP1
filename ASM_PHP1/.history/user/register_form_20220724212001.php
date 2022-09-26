<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form-container</title>
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
    .form-container {
        min-height: 100vh;
        display: inline-block;
        align-items: center;
        justify-content: center;
        padding: 20px;
        padding-bottom: 60px;
    }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <input type="text" name="name" require placeholder="enter your name...">
            <input type="email" name="email" require placeholder="enter your email...">
            <input type="password" name="password" require placeholder="enter your password...">
            <input type="password" name="password" require placeholder="confirm enter your password...">
            <select name="user_type" >
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>alredy have an account? <a href="/user/login_form.php">login now</a></p>
        </form>
    </div>
</body>
</html>