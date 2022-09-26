<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $address = $_POST['contry'];

   // $total_product = implode(',',$name);
   $detail_query = mysqli_query($conn, "INSERT INTO `khachhang`(TenKhachHang, Sodienthoai, Email, DiaChi) VALUES('$name','$number','$email','$address')") or die('query failed');

   

}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container-ms">
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
         <tr>
            <td><?= ucfirst($name); ?></td>
            <td><?= $number; ?></td>
            <td><?= ucfirst($address); ?></td>
            <td><?= $Email; ?></td>
        </tr>
      </tbody>
    </table>
    <p class="text-end">
      <a href="index.php" class="btn btn-secondary">&laquo; Go back</a>
    </p>
      </div>
</body>

</html>