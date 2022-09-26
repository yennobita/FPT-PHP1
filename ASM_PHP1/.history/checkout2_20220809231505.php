<?php
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Data - PHP CRUD Application</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <table class="table table-bordered mt-5">
      <thead>
        <tr>
          <th>Customer Name</th>
          <th>Customer Phone Number</th>
          <th>Customer Address</th>
          <th>Customer Email</th>
        </tr>
      </thead>
      <tbody>
      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `sanpham`");
         if(mysqli_num_rows($select_products) > 0){
            while($row = mysqli_fetch_assoc($select_products)){
      ?>
     <tr>
            <td><?php echo $row['TenKhachHang']; ?></td>
            <td><?php echo $row['Sodienthoai']; ?>$</td>
            <td><?php echo $row['DiaChi']; ?></td>
            <td><?php echo $row['Email']; ?></td>
      </tr>
      </tbody>
    </table>
    <p class="text-end">
      <a href="./" class="btn btn-secondary">&laquo; Go back</a>
    </p>
    <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
</div>
</body>

</html>