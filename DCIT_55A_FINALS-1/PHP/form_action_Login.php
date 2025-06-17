<?php
session_start(); // ✅ Always at the top

$servername = "localhost";
$username = "root";
$password = "cclpassword";
$dbname = "hotel_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users_tbl WHERE Email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['Password'])) {
            // ✅ Set session
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['Email'];

            // ✅ Use PHP redirect
            header("Location: ../Templates/Home.php");
            exit();
        } else {
            echo "<script>alert('Invalid email or password!'); window.location.href = '../Templates/Registration.html?login=1';</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password!'); window.location.href = '../Templates/Registration.html?login=1';</script>";
    }
}

$conn->close();
?>