<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
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
      <a href="#" class="fas fa-shopping-cart icons"></a>

      <a href="#home" class="logo"><img src="images/logo.png" alt="" /></a>
    </header>

    <!-- header section ends  -->


    <?php
$sql ="SELECT id, product_name, product_image, product_price, product_desc FROM products ORDER BY id ASC";
$results = $con->query($sql);

if($results){ 
	?>
	<ul class="products">
		<?php
//fetch results set as object and output HTML
while($rs = $results->fetch())
{
	?>


	<li class="product">
	<form method="post" action="cart_update.php">
  <div class="product-thumb"><img src="images/<?php echo $rs['product_image'] ?>"></div>
	<div class="product-content"><h3><?php echo $rs['product_name'] ?></h3>
	<div class="product-desc"><?php echo $rs['product_desc'] ?></div>
	<div class="product-info">
	 <?php echo $currency ?><?php echo $rs['price'] ?> 
	<fieldset>
	<label>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
	<input type="hidden" name="id" value="<?php echo $rs['id'] ?>" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="<?php echo $current_url ?>" />
	<div align="center"><button type="submit" class="add_to_cart">Add</button></div>
	</div></div>
	</form>
	</li>

<?php
}
?>
</ul>
<?php
}
echo '<a href="view_cart.php" class="button">Checkout</a>';
?>   



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
