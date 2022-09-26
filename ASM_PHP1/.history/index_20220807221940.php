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
      <a href="#profile" class="fas fa-user icons icon-pd"></a>
      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="update_user.php" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
         <?php
            }else{
         ?>
         <p>please login or register first!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

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
         With delicious taste and convenience, hamburger is a type of fast food that is loved by many people
        </p>
        <a href="#menu" class="btn">our menu</a>
      </div>
    </section>

    <!-- home section ends -->
    <!-- service sectioin starts  -->

    <section class="service">

   <div class="box" data-aos="fade-up" data-aos-delay="150">
   <i class="fas fa-hamburger"></i>
   <h3>best quality</h3>
   <p>Quality and very tasty burger</p>
     </div>

   <div class="box" data-aos="fade-up" data-aos-delay="300">
   <i class="fas fa-shipping-fast"></i>
   <h3>free delivery</h3>
   <p>Fast and friendly delivery</p>
   </div>

  <div class="box" data-aos="fade-up" data-aos-delay="450">
   <i class="fas fa-headset"></i>
   <h3>24/7 support</h3>
   <p>Always serve customers wholeheartedly</p>
  </div>

</section>

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
      <p>Hamburger is a type of food using a round bread sandwiched with a large slice of meat in the middle, with some vegetables such as salad, tomatoes and some other condiments.</p>
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


<section class="reviews" id="reviews">

   <div class="heading">
      <img src="images/title-img.png" alt="">
      <h3>testimonial</h3>
   </div>

   <div class="box-container">

      <div class="box" data-aos="fade-up" data-aos-delay="150">
         <img src="images/pic-1.png" alt="">
         <h3>john deo</h3>
         <p>Is a chef with many years of experience as a hamburger, she lives in the US</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

      <div class="box" data-aos="fade-up" data-aos-delay="300">
         <img src="images/pic-2.png" alt="">
         <h3>mark jeen</h3>
         <p>Is a chef with many years of experience as a hamburger, he lives in the ES</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

      <div class="box" data-aos="fade-up" data-aos-delay="450">
         <img src="images/pic-3.png" alt="">
         <h3>Leo chanse</h3>
         <p>Is a chef with many years of experience as a hamburger, she lives in the australia</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

   </div>

</section>

<!-- reviews section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <div class="heading">
      <img src="images/title-img.png" alt="">
      <h3>contact us</h3>
   </div>

   <div class="row">

      <iframe data-aos="fade-up" data-aos-delay="150" class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83066.26106988778!2d108.05900580347787!3d16.087495147326102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0x1df0cb4b86727e06!2zxJDDoCBO4bq1bmc!5e0!3m2!1svi!2s!4v1659805663342!5m2!1svi!2s" allowfullscreen="" loading="lazy"></iframe>

      <div class="form">

         <div class="icons-container">

            <div class="icons" data-aos="fade-up" data-aos-delay="150">
               <i class="fas fa-map"></i>
               <h3>address :</h3>
               <p>159 To Hieu</p>
            </div>

            <div class="icons" data-aos="fade-up" data-aos-delay="300">
               <i class="fas fa-envelope"></i>
               <h3>email :</h3>
               <p>nguyenyen102003@gmail.com</p>
               <p>nguyenyen10@gmail.com</p>
            </div>

            <div class="icons" data-aos="fade-up" data-aos-delay="450">
               <i class="fas fa-phone"></i>
               <h3>phone</h3>
               <p>+84986912587</p>
               <p>+84233256782</p>
            </div>
            
         </div>

         <form action="">
            <input data-aos="fade-up" data-aos-delay="150" type="text" placeholder="full name" class="box">
            <input data-aos="fade-up" data-aos-delay="300" type="email" placeholder="email" class="box">
            <input data-aos="fade-up" data-aos-delay="450" type="number" placeholder="phone" class="box">
            <textarea data-aos="fade-up" data-aos-delay="600" name="" placeholder="message" class="box" id="" cols="30" rows="10"></textarea>
            <input data-aos="fade-up" data-aos-delay="750" type="submit" value="send message" class="btn">
         </form>

      </div>

   </div>

</section>

<!-- contact section ends -->

<!-- blogs section starts  -->

<section class="blogs" id="blogs">

   <div class="heading">
      <img src="images/title-img.png" alt="">
      <h3>daily posts</h3>
   </div>

   <div class="box-container">

      <div class="box" data-aos="fade-up" data-aos-delay="150">
         <div class="image">
            <img src="images/blog-1.jpg" alt="">
            <div class="icons">
               <a href="#"> <i class="fas fa-calendar"></i> 21st may, 2022 </a>
               <a href="#"> <i class="fas fa-user"></i> by admin </a>
            </div>
         </div>
         <div class="content">
            <h3>Korean Grilled Burger</h3>
            <p>Toppings such as spicy kimchi, sirracha, crispy napa cabbage, or chestnut juice.</p>
            <a href="#" class="btn">read more</a>
         </div>
      </div>

      <div class="box" data-aos="fade-up" data-aos-delay="300">
         <div class="image">
            <img src="images/blog-2.jpg" alt="">
            <div class="icons">
               <a href="#"> <i class="fas fa-calendar"></i> 21st may, 2022 </a>
               <a href="#"> <i class="fas fa-user"></i> by admin </a>
            </div>
         </div>
         <div class="content">
            <h3>Chicken burger with special sauce</h3>
            <p>Sauces made with a blend of cream, cheese, along with spicy, sweet Asian flavors can become a staple in your kitchen.</p>
            <a href="#" class="btn">read more</a>
         </div>
      </div>

      <div class="box" data-aos="fade-up" data-aos-delay="450">
         <div class="image">
            <img src="images/blog-3.jpg" alt="">
            <div class="icons">
               <a href="#"> <i class="fas fa-calendar"></i> 21st may, 2022 </a>
               <a href="#"> <i class="fas fa-user"></i> by admin </a>
            </div>
         </div>
         <div class="content">
            <h3>Burger Silton</h3>
            <p>Beef burger, served with sautéed yellow onion with rich Silton cheese.</p>
            <a href="#" class="btn">read more</a>
         </div>
      </div>

   </div>

</section>

<!-- blogs section ends -->
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
