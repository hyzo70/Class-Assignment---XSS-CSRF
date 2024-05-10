<?php 
session_start();
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        // Issue with CSRF token
        die('CSRF token validation failed.');
    }
}

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Security-Policy; X-UA-Compatible;" content="IE=edge; default-src 'self'; img-src 'self'; script-src 'self'; style-src 'self';">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #007bff;">
    Student Records
  </nav>

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="user_index.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Matric No.</th>
          <th scope="col">Email</th>
          <th scope="col">Current Address</th>
          <th scope="col">Home Address</th>
          <th scope="col">Mobile Phone No.</th>
          <th scope="col">Home Phone No.</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM studentform WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row["user_id"] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["matricNo"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["currentAddress"] ?></td>
            <td><?php echo $row["homeAddress"] ?></td>
            <td><?php echo $row["mobilePhoneNo"] ?></td>
            <td><?php echo $row["homePhoneNo"] ?></td>
            <td>
              <a href="user_update.php?user_id=<?php echo $row["user_id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a><br><br>
              <a href="user_delete.php?user_id=<?php echo $row["user_id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
        </tr>
        <?php
    }
} else {
    echo "No data has been recorded.";
}

        ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
