<?php
// 🔹 Insert_User.php - Insert Logic
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db"); // Replace with your actual DB name

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users_tbl (Name, Email, Password) VALUES ('$name', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
  header("Location: Admin_Users.php");
} else {
  echo "Error: " . mysqli_error($conn);
}   