<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = intval($_POST['id']);
  $checkin = $_POST['checkin'];
  $checkout = $_POST['checkout'];
  $price = floatval($_POST['price']);
  $code = $conn->real_escape_string($_POST['code']);
  $status = $conn->real_escape_string($_POST['status']);

  $sql = "
    UPDATE booking_tbl 
    SET 
      Checkin_date = '$checkin',
      Checkout_date = '$checkout',
      Total_price = $price,
      Confirmation_code = '$code',
      status = '$status'
    WHERE Id = $id
  ";

  if ($conn->query($sql) === TRUE) {
      header("Location: Admin_Details.php");
  } else {
    echo "Error: " . $conn->error;
  }
} else {
  echo "<script>alert('Invalid access.'); window.location.href='Admin_Details.php';</script>";
}
?>
