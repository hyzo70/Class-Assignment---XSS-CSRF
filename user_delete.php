<?php
include("connection.php");
include("functions.php");

$id = $_GET["id"];
$sql = "DELETE FROM studentform WHERE id = $id";
$result = mysqli_query($con, $sql);

if ($result) {
  header("Location: user_record.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}