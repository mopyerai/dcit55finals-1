<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$result = $conn->query("SELECT * FROM rooms_tbl");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel - Rooms</title>
  <link rel="stylesheet" href="../../../CSS/Admin.css">
</head>
<body>
  <div class="container">
    <!-- Sidebar Navigation -->
    <nav class="sidebar">
      <h2>Admin Panel</h2>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/USERS/Admin_Users.php" tabindex="0">Users</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/ROOMS/Admin_Rooms.php" tabindex="0" class="active">Rooms</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/BOOKINGS/Admin_Pending.php" tabindex="0">Pending Bookings</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/BOOKINGS/Admin_Active.php" tabindex="0">Active Bookings</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/DETAILS/Admin_Details.php" tabindex="0">Customer History Details</a>

    </nav>

    <!-- Main Content -->
    <main class="content" tabindex="0">
      <h1>Room Management</h1>
      <button class="admin-button" onclick="window.location.href='Admin_Rooms_ADD.php'"> Add New Room</button>
      <table>
        <thead>
          <tr>
            <th>Room_ID</th>
            <th>Room Name</th>
            <th>Bed</th>
            <th>View</th>
            <th>Guests</th>
            <th>Price</th>
            <th>Status</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?php echo $row['room_id']; ?></td>
                <td><?php echo htmlspecialchars($row['room_name']); ?></td>
                <td><?php echo htmlspecialchars($row['bed_info']); ?></td>
                <td><?php echo htmlspecialchars($row['view_info']); ?></td>
                <td><?php echo $row['guest_capacity']; ?></td>
                <td>₱<?php echo $row['price_per_night']; ?></td>
                <td><?php echo $row['availability'] ? 'Available' : 'Unavailable'; ?></td>
                <td><img src="../../../Image/<?php echo htmlspecialchars($row['image_path']); ?>" alt="Room Image" style="width:120px; height:auto; object-fit:cover; border-radius:8px;"></td>
                <td>
                  <button class='action-button edit-button' onclick="location.href='Admin_Rooms_EDIT.php?id=<?php echo $row['room_id']; ?>'">Edit</button>
                  <button class='action-button delete-button' onclick="if(confirm('Are you sure you want to delete this room?')) location.href='Admin_Rooms_DELETE.php?id=<?php echo $row['room_id']; ?>';">Delete</button>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="9">No rooms found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>
<?php $conn->close(); ?>
