<?php
@include "config.php";

session_start();
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass = (mysqli_real_escape_string($conn, $_POST["password"]));

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array(($result));
        if($row["user_type"] == "admin") {
            $_SESSION["admin_name"] = $row["name"];
            header("location:index.php");
        }elseif ($row["user_type"] == "user"){
            $_SESSION["user_name"] = $row["name"];
            header("location:user_page.php");
        }
    }else{
        $error[] = "incorrect email or passwword!";
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
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




    </style>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>login now</h3>
            <?php 

            if(isset($error)){
                foreach($error as $error) {
                    echo '<span class="erro-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="email" name="email" require placeholder="enter your email...">
            <input type="password" name="password" require placeholder="enter your password...">
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>alredy have an account? <a href="register_form.php">register</a></p>
        </form>
    </div>
</body>
</html>