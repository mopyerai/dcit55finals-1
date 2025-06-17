<?php
session_start(); // Start the session

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to login page or another page
header("Location: ../Templates/Registration.html");
exit();
?>
