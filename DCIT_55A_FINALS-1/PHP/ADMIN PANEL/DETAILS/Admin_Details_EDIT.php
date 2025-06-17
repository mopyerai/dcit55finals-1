<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "
  SELECT 
    booking_tbl.*,
    users_tbl.name,
    users_tbl.email,
    rooms_tbl.room_name,
    rooms_tbl.room_type
  FROM booking_tbl
  INNER JOIN users_tbl ON booking_tbl.user_id = users_tbl.user_id
  INNER JOIN rooms_tbl ON booking_tbl.room_id = rooms_tbl.room_id
  WHERE booking_tbl.Id = $id
";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Checked-out Booking</title>
  <link rel="stylesheet" href="../../../CSS/Admin.css">
</head>
<body>
  <div class="edit-details-page">
    <div class="form-container">
      <form method="POST" action="Admin_Details_UPDATE.php">
        <h2> Edit Customer's Booking History </h2><br>
        <input type="hidden" name="id" value="<?= $row['Id'] ?>">

        <label class="form-label">Customer Name</label>
        <input type="text" class="form-input" value="<?= htmlspecialchars($row['name']) ?>" disabled>

        <label class="form-label">Email</label>
        <input type="email" class="form-input" value="<?= htmlspecialchars($row['email']) ?>" disabled>

        <label class="form-label">Room Name</label>
        <input type="text" class="form-input" value="<?= htmlspecialchars($row['room_name']) ?>" disabled>

        <label class="form-label">Room Type</label>
        <input type="text" class="form-input" value="<?= htmlspecialchars($row['room_type']) ?>" disabled>

        <label class="form-label">Check-in Date</label>
        <input type="date" class="form-input" name="checkin" value="<?= $row['Checkin_date'] ?>" required>

        <label class="form-label">Check-out Date</label>
        <input type="date" class="form-input" name="checkout" value="<?= $row['Checkout_date'] ?>" required>

        <label class="form-label">Total Price</label>
        <input type="number" class="form-input" name="price" value="<?= $row['Total_price'] ?>" required>

        <label class="form-label">Confirmation Code</label>
        <input type="text" class="form-input" name="code" value="<?= $row['Confirmation_code'] ?>" required>

        <label class="form-label">Status</label>
        <select class="form-select" name="status" required>
          <option value="Checked-out" <?= $row['status'] == 'Checked-out' ? 'selected' : '' ?>>Checked-out</option>
          <option value="Checked-in" <?= $row['status'] == 'Checked-in' ? 'selected' : '' ?>>Checked-in</option>
          <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
        </select>

        <button type="submit" class="form-button">Update</button>
       
      </form>
    </div>
  </div>
</body>
</html>
