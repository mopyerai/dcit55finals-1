<?php
session_start(); // Start session to access user_id

$servername = "localhost";
$username = "root";
$password = "cclpassword";
$dbname = "hotel_db";
$conn = new mysqli($servername, $username, $password, $dbname);

function generateConfirmationCode($length = 8) {
    $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Make sure the user is logged in
    if (!isset($_SESSION['user_id'])) {
        die("You must be logged in to book a room.");
    }

    $userId = $_SESSION['user_id'];
    $roomType = $conn->real_escape_string($_POST['roomType']);
    $roomId = intval($_POST['room_id']); // New: grab room_id
    $guests = intval($_POST['guests']);
    $checkin = $conn->real_escape_string($_POST['checkin']);
    $checkout = $conn->real_escape_string($_POST['checkout']);
    $totalPrice = isset($_POST['totalPrice']) ? floatval($_POST['totalPrice']) : 0;

    // Generate unique confirmation code
    do {
        $confirmationCode = generateConfirmationCode();
        $checkCode = $conn->query("SELECT 1 FROM booking_tbl WHERE Confirmation_code = '$confirmationCode'");
    } while ($checkCode && $checkCode->num_rows > 0);

    // Insert with user_id and room_id
    $sql = "INSERT INTO booking_tbl (room_id, Room_type, Guest, Checkin_date, Checkout_date, Total_price, Confirmation_code, user_id, Status)
            VALUES ($roomId, '$roomType', $guests, '$checkin', '$checkout', $totalPrice, '$confirmationCode', $userId, 'Pending')";

    if ($conn->query($sql) === TRUE) {
        $result = $conn->query("SELECT Room_type, Guest, Checkin_date, Checkout_date, Created_at, Total_price, Confirmation_code FROM booking_tbl WHERE Confirmation_code = '$confirmationCode' LIMIT 1");
        if ($result && $booking = $result->fetch_assoc()) {
            $params = http_build_query([
                'roomType' => $roomType,
                'guests' => $guests,
                'checkin' => $checkin,
                'checkout' => $checkout,
                'price' => $totalPrice,
                'code' => $confirmationCode
            ]);

            echo "<script>window.location.href = '../Templates/booking_confirmation.html?$params';</script>";
            exit();
        } else {
            echo "Error fetching booking details.";
        }
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>