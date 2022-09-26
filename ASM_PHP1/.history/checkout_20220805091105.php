<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $address = $_POST['address'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `khachhang`(TenKhachHang, Sodienthoai, Email, DiaChi) VALUES('$name','$number','$email','$address')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='index.php' class='btn'>continue shopping</a>
         </div>
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

   <!-- <div class="display-order"> -->
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            // $grand_total = $total += $total_price;
      ?>
      <!-- <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span> -->
      <?php
         }
      }else{
         // echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <!-- <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span> -->
   <!-- </div> -->

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="Enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="Enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="Enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash payment" selected>cash payment</option>
               <option value="momo wallet">momo</option>
               <option value="paypal wallet">paypal</option>
            </select>
         </div>
         <div class="inputbx">
            <select name="" id="">
               <option value="" selected>The City</option>
               <option value="">Hue</option>
               <option value="">Da Nang</option>
            </select>
            <select name="" id="">
               <option value="" selected>County, District, Town</option>
               <option value="">Cam Le</option>
               <option value="">Thanh Khe</option>
               <option value="">Lien Chieu</option>
               <option value="">Ngu Hanh Son</option>
               <option value="">Hai Chau</option>
            </select>
            <select name="" id="">
               <option value="" selected>Ward, House Number</option>
               <option value="">Hoa Minh</option>
               <option value="">Hoa Khanh Bac</option>
               <option value="">Chinh Gian</option>
               <option value="">Hai Chau I</option>
               <option value="">Hai Chau II</option>
            </select>
         </div>
         <div class="inputBox">
            <span>delivery address</span>
            <input type="text" placeholder="Enter your shipping address" name="flat" required>
         </div>
        
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>