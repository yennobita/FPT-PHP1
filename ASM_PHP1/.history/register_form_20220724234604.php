<?php
@include "config.php";
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass = md5($conn, $_POST["password"]);
    $cpass = md5($conn, $_POST["cpassword"]);
    $user_type = $_POST["user_type"];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0) {
        $error[] = "user allready exist!";
    }else {
        if($pass != $cpass){
            $error[] = "password not matched";
        }else {
            $insert = "INSERT INTO user_form(name, email, password, user_type ) VALUES ('$name', '$email', '$pass', '$user_type')";
            mysqli_query($conn, $insert);
            header("location:login_form.php");
        }
    }
};
?>

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
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        padding-bottom: 60px;
        background: #eee;

    }
    .form-container form {
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        text-align: center;
        background: #fff;
        width: 500px;
    }
    .form-container form h3 {
        font-size: 30px;
        text-transform: uppercase;
        margin-bottom: 10px;
        color: #333;

    }
    .form-container form input,
    .form-container form select {
        width: 100%;
        padding: 10px 15px;
        font-size: 15px;
        margin: 8px 0;
        background: #eee;
        border-radius: 5px;

    }
    .form-container form select option {
        background: #fff;
    }
    .form-container form .form-btn {
        background: #fbd09d;
        color: crimson;
        text-transform: capitalize;
        font-size: 18px;
        cursor: pointer;
    }
    .form-container form .form-btn:hover {
        background: crimson;
        color: #fff;
    }
    .form-container form p {
        margin-top: 10px;
        font-size: 16px;
        color: #333;
    }
    .form-container form p a {
        color: crimson;
    }
    .form-container form .error-msg {
        margin: 10px 0;
        display: block;
        background: crimson;
        color: #fff;
        border-radius: 5px;
        font-size: 18px;
        padding: 10px;

    }


    </style>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>register now</h3>
            <?php 

            if(isset($error)){
                foreach($error as $error) {
                    echo '<span class="erro-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="name" require placeholder="enter your name...">
            <input type="email" name="email" require placeholder="enter your email...">
            <input type="password" name="password" require placeholder="enter your password...">
            <input type="password" name="password" require placeholder="confirm enter your password...">
            <select name="user_type" >
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>alredy have an account? <a href="login_form.php">login now</a></p>
        </form>
    </div>
</body>
</html>