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
    <table class="table table-bordered mt-5">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email Address</th>
          <th>Course</th>
          <th>Batch</th>
          <th>City</th>
          <th>State</th>
          <th>Creation Date</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?= ucfirst($firstname); ?></td>
          <td><?= ucfirst($lastname); ?></td>
          <td><?= $email; ?></td>
          <td><?= strtoupper($course); ?></td>
          <td><?= $batch; ?></td>
          <td><?= ucfirst($city); ?></td>
          <td><?= ucfirst($state); ?></td>
          <td><?= $creation_date; ?></td>
        </tr>
      </tbody>
    </table>
    <p class="text-end">
      <a href="./" class="btn btn-secondary">&laquo; Go back</a>
    </p>
  </div>
</body>

</html>