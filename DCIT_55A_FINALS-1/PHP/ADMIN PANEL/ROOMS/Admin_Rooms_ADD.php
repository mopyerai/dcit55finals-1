<!DOCTYPE html>
<html>
<head>
  <title>Add Room</title>
  <link rel="stylesheet" href="../../../CSS/Admin.css">
</head>
<body>
    <a href="Admin_Rooms.php" class="back-button">← Back</a>
  <div class="add-room-page">
    
 
    <form action="Admin_Rooms_INSERT.php" method="POST" enctype="multipart/form-data" class="form-container">
           <div class="euser"><h2>Add New Room</h2></div><br>
      <label class="form-label">Room Name:</label>
      <input name="room_name" placeholder="Room Name" required class="form-input"><br>

      <label class="form-label">Bed Info:</label>
      <input name="bed_info" placeholder="Bed Info" required class="form-input"><br>

      <label class="form-label">View Info:</label>
      <input name="view_info" placeholder="View Info" required class="form-input"><br>

      <label class="form-label">Guests:</label>
      <input type="number" name="guest_capacity" placeholder="Guests" required class="form-input"><br>

      <label class="form-label">Price per Night:</label>
      <input type="number" name="price_per_night" placeholder="Price per Night" required class="form-input"><br>

      <label class="form-label">Availability:</label>
      <select name="availability" class="form-input">
        <option value="1">Available</option>
        <option value="0">Unavailable</option>
      </select><br>

      <label class="form-label">Image:</label>
      <input type="file" name="image" class="form-input"><br>

      <button type="submit" class="admin-button">Add Room</button>
    </form>
  </div>
</body>
</html>
