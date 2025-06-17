<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM booking_tbl WHERE Id = $id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Active Booking</title>
  <link rel="stylesheet" href="../../../CSS/Admin.css">
</head>
<body>
  <a href="Admin_Active.php" class="back-button">← Back</a>
  <div class="edit-active-booking-page">

    <form action="Admin_Active_UPDATE.php" method="POST" class="form-container">
      <div class="euser"><h2>Edit Active Booking</h2></div><br>

      <input type="hidden" name="Id" value="<?= $row['Id'] ?>">

      <label class="form-label">Room Type:</label>
      <input name="Room_type" value="<?= $row['Room_type'] ?>" required class="form-input"><br>

      <label class="form-label">Number of Guests:</label>
      <input type="number" name="Guest" value="<?= $row['Guest'] ?>" required class="form-input"><br>

      <label class="form-label">Check-in Date:</label>
      <input type="date" name="Checkin_date" value="<?= $row['Checkin_date'] ?>" required class="form-input"><br>

      <label class="form-label">Check-out Date:</label>
      <input type="date" name="Checkout_date" value="<?= $row['Checkout_date'] ?>" required class="form-input"><br>

      <label class="form-label">Total Price:</label>
      <input type="number" step="0.01" name="Total_price" value="<?= $row['Total_price'] ?>" required class="form-input"><br>

      <label class="form-label">Confirmation Code:</label>
      <input name="Confirmation_code" value="<?= $row['Confirmation_code'] ?>" required class="form-input"><br>

      <label class="form-label">Status:</label>
      <select name="status" required class="form-input">
        <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
        <option value="Checked-in" <?= $row['status'] == 'Checked-in' ? 'selected' : '' ?>>Checked-in</option>
        <option value="Checked-out" <?= $row['status'] == 'Checked-out' ? 'selected' : '' ?>>Checked-out</option>
      </select><br>

      <button type="submit" class="admin-button">Update Booking</button>
    </form>
  </div>
</body>
</html>
