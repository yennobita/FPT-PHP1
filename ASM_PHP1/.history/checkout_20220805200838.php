<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $address = $_POST['address'];

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `khachhang`(TenKhachHang, Sodienthoai, Email, DiaChi) VALUES('$name','$number','$email','$address')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='container'           
        <table class='table table-bordered mt-5'>
            <thead>
               <tr>
                  <th>Customer Name</th>
                  <th>Customer Phone Number</th>
                  <th>Customer Address</th>
                  <th>Customer Email</th>
               </tr>
            </thead>
      <tbody>
         <tr>
            <td><?= ucfirst($name); ?></td>
            <td><?= $number; ?></td>
            <td><?= ucfirst($address); ?></td>
            <td><?= $Email; ?></td>
        </tr>
      </tbody>
    </table>
    <p class='text-end'>
      <a href='' class='btn btn-secondary'>&laquo; Go back</a>
    </p>
      </div>
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
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>



<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">
      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="Enter your name..." name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="Enter your number..." name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="Enter your email..." name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash payment" selected>Cash payment</option>
               <option value="momo wallet">momo</option>
               <option value="paypal wallet">paypal</option>
            </select>
         </div>
         <div class="inputbx">
            <select class="contry" name="contry">
               <option value="" selected>The City</option>
               <option value="">Hue</option>
               <option value="">Da Nang</option>
            </select>
            <select class="contry" name="contry">
               <option value="" selected>County, District, Town</option>
               <option value="">Cam Le</option>
               <option value="">Thanh Khe</option>
               <option value="">Lien Chieu</option>
               <option value="">Ngu Hanh Son</option>
               <option value="">Hai Chau</option>
            </select>
            <select class="contry" name="contry">
               <option value="" selected>Ward, Commune</option>
               <option value="">Hoa Minh</option>
               <option value="">Hoa Khanh Bac</option>
               <option value="">Chinh Gian</option>
               <option value="">Hai Chau I</option>
               <option value="">Hai Chau II</option>
            </select>
            <input type="name" placeholder="specific address..." name="specific" class="">
         </div>
         <div class="inputBox">
            <span>Note</span>
            <textarea name="note"  rows="5" placeholder="Enter your note..."></textarea>
         </div>
        
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>