<?php
$servername = "localhost";
$username = "root";
$password = "cclpassword"; 
$dbname = "hotel_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
    } else {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users_tbl (Name, Email, Password) VALUES ('$name', '$email', '$pass')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href = '../Templates/Registration.html?login=1';</script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
