<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
$id = $_POST['room_id'];

$room_name = $_POST['room_name'];
$bed_info = $_POST['bed_info'];
$view_info = $_POST['view_info'];
$guest_capacity = $_POST['guest_capacity'];
$price_per_night = $_POST['price_per_night'];
$availability = $_POST['availability'];

if ($_FILES['image']['name']) {
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../Image/$image");
    $sql = "UPDATE rooms_tbl SET 
            room_name='$room_name', bed_info='$bed_info', view_info='$view_info',
            guest_capacity=$guest_capacity, price_per_night=$price_per_night, 
            availability=$availability, image_path='$image'
            WHERE room_id=$id";
} else {
    $sql = "UPDATE rooms_tbl SET 
            room_name='$room_name', bed_info='$bed_info', view_info='$view_info',
            guest_capacity=$guest_capacity, price_per_night=$price_per_night, 
            availability=$availability
            WHERE room_id=$id";
}

if ($conn->query($sql)) {
    header("Location: Admin_Rooms.php");
} else {
    echo "Error updating room.";
}
$conn->close();
?>
