<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);

  $sql = "DELETE FROM booking_tbl WHERE Id = $id AND status = 'Checked-out'";
  if ($conn->query($sql) === TRUE) {
      header("Location: Admin_Details.php");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
} else {
  echo "<script>alert('Invalid request.'); window.location.href='Admin_Details.php';</script>";
}

$conn->close();
?>
