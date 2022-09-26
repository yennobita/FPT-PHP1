<?php
require('config.php');
session_start();
// dang nhap
if(isset($_POST['login']))
{
    $query="SELECT * FROM `user_form` WHERE `email` ='$_POST[email]' OR `name` ='$_POST[email]'";
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if(password_verify($_POST['password'], $result_fetch['password']))
            {
                $_SESSION['logged_in']=true;
                $_SESSION['name']=$result_fetch['name'];
                header("location:index.php");
            }
            else
            {
                echo "
                <script>
                     alert('mat khau sai');
                    window.location.href='index.php';
                     </script>
               ";
            }
        }
        else 
        {
            echo "
        <script>
             alert('email or name chua duoc dang ki');
            window.location.href='index.php';
             </script>
       ";
        }
    }
    else
    {
        echo "
        <script>
             alert('khong the truy van');
            window.location.href='index.php';
             </script>
       ";
    }
}


//dang ky
if(isset($_POST['register']))
{
    $user_exist_query="SELECT * FROM `user_form` WHERE `name`='$_POST[name]' OR `email`='$_POST[email]'";
    $result=mysqli_query($conn, $user_exist_query);
    if($result)
    {
        if(mysqli_num_rows($result) > 0)
        {
            //kiểm tra tên hoặc email đã có sẵn chưa
           $result_fetch=mysqli_fetch_assoc($result);
           if($result_fetch['name']==$_POST['name'])
           {
            // lỗi do tên đăng kí
            echo "
              <script>
               alert('$result_fetch[name] - kiểm tra lại tên đăng kí');
               window.location.href='index.php';
               </script>
              ";
           }
           else
           {
            // lỗi do email đăng kí
            echo
             "
              <script>
               alert('$result_fetch[eamil] - kiểm tra lại email đăng kí');
               window.location.href='index.php';
               </script>
              ";
           }
        }
        else
        {
            $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
            $query="INSERT INTO `user_form`(`name`, `email`, `password`) VALUES ('$_POST[name]','$_POST[email]','$password')";
            if(mysqli_query($conn,$query))
            {
                echo"
                <script>
                    alert('dang ky tai khoan thanh cong');
                    window.location.href='index.php';
                </script>
                    ";
            }
            else
            {
                echo "
                    <script>
                    alert('Khong the truy van');
                    window.location.href='index.php';
                    </script>
                    ";
            }
        }
    }
    else
    {
        echo "
        <script>
        alert('Khong the truy van');
        window.location.href='index.php';
        </script>
        ";
    }
}
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