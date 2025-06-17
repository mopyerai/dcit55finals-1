<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM rooms_tbl WHERE room_id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Room</title>
  <link rel="stylesheet" href="../../../CSS/Admin.css">
</head>
<body>
        <a href="Admin_Rooms.php" class="back-button">← Back</a>
  <div class="edit-room-page">

   
    <form action="Admin_Rooms_UPDATE.php" method="POST" enctype="multipart/form-data" class="form-container">
       <div class="euser">  <h2>Edit Room</h2> </div><br>
      <input type="hidden" name="room_id" value="<?= $row['room_id'] ?>">

      <label class="form-label">Room Name:</label>
      <input name="room_name" value="<?= htmlspecialchars($row['room_name']) ?>" required class="form-input"><br>

      <label class="form-label">Bed Info:</label>
      <input name="bed_info" value="<?= htmlspecialchars($row['bed_info']) ?>" required class="form-input"><br>

      <label class="form-label">View Info:</label>
      <input name="view_info" value="<?= htmlspecialchars($row['view_info']) ?>" required class="form-input"><br>

      <label class="form-label">Guests:</label>
      <input type="number" name="guest_capacity" value="<?= $row['guest_capacity'] ?>" required class="form-input"><br>

      <label class="form-label">Price per Night:</label>
      <input type="number" name="price_per_night" value="<?= $row['price_per_night'] ?>" required class="form-input"><br>

      <label class="form-label">Availability:</label>
      <select name="availability" class="form-input">
        <option value="1" <?= $row['availability'] ? 'selected' : '' ?>>Available</option>
        <option value="0" <?= !$row['availability'] ? 'selected' : '' ?>>Unavailable</option>
      </select><br>

      <label class="form-label">Image:</label>
      <input type="file" name="image" class="form-input"><br>

      <button type="submit" class="admin-button">Update Room</button>
    </form>
  </div>
</body>
</html>
