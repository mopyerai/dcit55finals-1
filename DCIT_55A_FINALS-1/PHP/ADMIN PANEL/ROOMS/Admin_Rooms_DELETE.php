<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
$id = $_GET['id'];
$conn->query("DELETE FROM rooms_tbl WHERE room_id=$id");
header("Location: Admin_Rooms.php");
$conn->close();
?>
