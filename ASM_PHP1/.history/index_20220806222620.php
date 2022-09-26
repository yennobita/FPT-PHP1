<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/images/burger-baner.png" />
    <title>Burger-website</title>
    <!-- font awesome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
    />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
  <?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
<?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

?>
    <!-- header section starts  -->
    
    <header class="header">
      <div id="menu-btn" class="fas fa-bars icons"></div>
      <!-- <div id="search-btn" class="fas fa-search icons"></div> -->
      <div class="flexbox">
        <div class="search">
          <div>
            <input type="text" placeholder="Search..." require />
          </div>
        </div>
      </div>

      <nav class="navbar">
        <a href="#home">home</a>
        <a href="#menu">menu</a>
        <a href="#about">about</a>
        <span class="space"></span>
        <a href="#reviews">reviews</a>
        <a href="#contact">contact</a>
        <a href="#blogs">blogs</a>
      </nav>
      <a href="login_form.php" class="fas fa-user icons icon-pd"></a>

      <a href="cart.php" class="fas fa-shopping-cart icons"><span><?php echo $row_count; ?></span></a>
      
     
      </div>
      <a href="#home" class="logo"><img src="images/logo.png" alt="" /></a>
    </header>

    <!-- header section ends  -->

<!-- shopping -->




    <!-- home section starts  -->

    <section class="home" id="home">
      <div class="content">
        <img src="images/burger-baner.png" alt="" />
        <h3>So meaty you'll go crazy</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores at
          fuga aliquam ipsa recusandae repellat laudantium pariatur amet culpa
          cum.
        </p>
        <a href="#menu" class="btn">our menu</a>
      </div>
    </section>

    <!-- home section ends -->
    <!-- service sectioin starts  -->

    <!-- <section class="service">

   <div class="box" data-aos="fade-up" data-aos-delay="150">
   <i class="fas fa-hamburger"></i>
   <h3>best quality</h3>
   <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, cum.</p>
     </div>

   <div class="box" data-aos="fade-up" data-aos-delay="300">
   <i class="fas fa-shipping-fast"></i>
   <h3>free delivery</h3>
   <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, cum.</p>
   </div>

  <div class="box" data-aos="fade-up" data-aos-delay="450">
   <i class="fas fa-headset"></i>
   <h3>24/7 support</h3>
   <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, cum.</p>
  </div>

</section> -->

<!-- service sectioin ends -->

    <!-- cart -->
    <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
      <!-- div-product -->
     <div class="container">

    <section class="products">

    <div class="heading" id="menu">
      <img src="images/title-img.png" alt="">
      <h3>our menu</h3>
   </div>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['product_image']; ?>" alt="">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3><?php echo $fetch_product['product_name']; ?></h3>
            <p><?php echo $fetch_product['product_desc']; ?></p>
            <div class="price"><?php echo $fetch_product['product_price']; ?>$</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['product_image']; ?>">
            <input type="hidden" name="product_desc" value="<?php echo $fetch_product['product_desc']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

<!-- about start -->

<section class="about" id="about">

   <div class="image" data-aos="fade-right" data-aos-delay="150">
      <img src="images/about-img.png" alt="">
   </div>

   <div class="content" data-aos="fade-left" data-aos-delay="300">
      <h3 class="title">Step into burger heaven</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est, veniam error fugit quasi perspiciatis blanditiis quo, sint beatae ut, commodi fuga illo reprehenderit ea voluptatibus earum fugiat obcaecati doloremque? Aspernatur?</p>
      <div class="icons">
         <h3> <i class="fas fa-check"></i> best price </h3>
         <h3> <i class="fas fa-check"></i> Best Service </h3>
         <h3> <i class="fas fa-check"></i> Fresh Ingredient </h3>
         <h3> <i class="fas fa-check"></i> backed buns </h3>
         <h3> <i class="fas fa-check"></i> natural cheese </h3>
         <h3> <i class="fas fa-check"></i> veg & non-veg </h3>
      </div>
      <a href="#" class="btn">read more</a>
   </div>

</section>
    <!-- footer section starts  -->

    <section class="footer">
      <div class="links">
        <a href="#home" class="btn">home</a>
        <a href="#menu" class="btn">menu</a>
        <a href="#about" class="btn">about</a>
        <a href="#reviews" class="btn">reviews</a>
        <a href="#contact" class="btn">contact</a>
        <a href="#blogs" class="btn">blogs</a>
      </div>

      <p class="credit">
        created by <span>yen nguyen</span> | all rights reserved!
      </p>
    </section>

    <!-- footer section ends -->

    <!-- javascript -->
    <script src="/Js/script.js"></script>
  </body>
</html>
