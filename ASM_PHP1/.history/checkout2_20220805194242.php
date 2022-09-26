<?php
require_once "config.php";



$TenKhachHang = $Sodienthoai = $DiaChi = $Email = "";

// Processing input data when form is submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["name"])) {
    $TenKhachHang = trim($_POST["name"]);
   }

  if (!empty($_POST["number"])) {
    $Sodienthoai = trim($_POST["number"]); 
  }

  if (!empty($_POST["contry"])) {
    $DiaChi = trim($_POST["contry"]);
  }

  if (!empty($_POST["Email"])) {
    $Email = trim($_POST["Email"]);
  }

    // Prepare an insert statement
    $sql = "INSERT INTO khachhang (TenKhachHang, Sodienthoai, DiaChi, Email) VALUES (?, ?, ?, ?,)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to a prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssiss", $TenKhachHang, $Sodienthoai, $DiaChi, $Email);

      // Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('New record created successfully')</script>";
        echo "<script>window.location.href='http://localhost/mysql_procedual/';</script>";
        exit;
      } else {
        echo "Oops! Something went wrong. Please try again later";
      }
    }
    // Close statement
    mysqli_stmt_close($stmt);
  
  // Close connection
  mysqli_close($link);
}
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
    <div class="row justify-content-center pt-5">
      <div class="col-lg-6">
        <!-- form start -->
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="bg-light p-4 shadow-sm" novalidate>
          <div class="row">
            <div class="col-lg-6 mb-3">
              <label for="name" class="form-label">Customer Name</label>
              <input type="text" name="name" class="form-control" id="name" value="<?= $TenKhachHang; ?>">
            
            </div>

            <div class="col-lg-6 mb-3">
              <label for="number" class="form-label">Customer Phone Number</label>
              <input type="number" name="number" class="form-control" id="number" value="<?= $Sodienthoai; ?>">
             
            </div>

            <div class="col-lg-12 mb-3">
              <label for="contry" class="form-label">Customer Address</label>
              <input type="text" name="contry" class="form-control" id="contry" value="<?= $DiaChi; ?>">
             
            </div>

            <div class="col-lg-6 mb-3">
              <label for="Email" class="form-label">Customer Email</label>
              <input type="email" name="Email" class="form-control" id="course" value="<?= $Email; ?>">
              
            </div>

            <div class="col-lg-12 mt-1">
              <input type="submit" class="btn btn-primary form-control" value="Create Record">
            </div>
          </div>
        </form>
        <!-- form end -->
      </div>
    </div>
  </div>
</body>

</html>