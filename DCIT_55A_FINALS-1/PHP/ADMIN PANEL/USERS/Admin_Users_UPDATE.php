<?php
// 🔹 Update_User.php - Update Logic
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db"); // Replace with your actual DB name

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$sql = "UPDATE users_tbl SET Name='$name', Email='$email' WHERE user_id=$id";
if (mysqli_query($conn, $sql)) {
  header("Location: Admin_Users.php");
} else {
  echo "Error: " . mysqli_error($conn);
}