
<?php
// 🔹    Delete_User.php - Delete Logic
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db"); // Replace with your actual DB name
$id = $_GET['id'];

$sql = "DELETE FROM users_tbl WHERE user_id = $id";
if (mysqli_query($conn, $sql)) {
  header("Location: Admin_Users.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
?>
