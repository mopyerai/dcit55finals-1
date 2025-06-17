<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
$id = $_GET['id'];
$conn->query("DELETE FROM booking_tbl WHERE Id = $id");
$conn->close();
header("Location: Admin_Pending.php");
exit;
