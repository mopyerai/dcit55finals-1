<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
$stmt = $conn->prepare("UPDATE booking_tbl SET Room_type=?, Guest=?, Checkin_date=?, Checkout_date=?, Total_price=?, Confirmation_code=?, status=? WHERE Id=?");
$stmt->bind_param("sissdssi", $_POST['Room_type'], $_POST['Guest'], $_POST['Checkin_date'], $_POST['Checkout_date'], $_POST['Total_price'], $_POST['Confirmation_code'], $_POST['status'], $_POST['Id']);
$stmt->execute();
$stmt->close();
$conn->close();
header("Location: Admin_Pending.php");
exit;
