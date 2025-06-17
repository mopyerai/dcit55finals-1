<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$room_name = $_POST['room_name'];
$bed_info = $_POST['bed_info'];
$view_info = $_POST['view_info'];
$guest_capacity = $_POST['guest_capacity'];
$price_per_night = $_POST['price_per_night'];
$availability = $_POST['availability'];
$image_name = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($image_tmp, "../Image/$image_name");

$sql = "INSERT INTO rooms_tbl (room_name, bed_info, view_info, guest_capacity, price_per_night, availability, image_path)
VALUES ('$room_name', '$bed_info', '$view_info', $guest_capacity, $price_per_night, $availability, '$image_name')";

if ($conn->query($sql) === TRUE) {
    header("Location: Admin_Rooms.php");
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
