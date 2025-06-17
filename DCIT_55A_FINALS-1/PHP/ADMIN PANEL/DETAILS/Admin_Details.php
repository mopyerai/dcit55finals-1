<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "
  SELECT 
    booking_tbl.Id,
    users_tbl.name,
    users_tbl.email,
    rooms_tbl.room_name,
    rooms_tbl.room_type,
    booking_tbl.Checkin_date,
    booking_tbl.Checkout_date,
    booking_tbl.Total_price,
    booking_tbl.Confirmation_code,
    booking_tbl.status
  FROM booking_tbl
  INNER JOIN users_tbl ON booking_tbl.user_id = users_tbl.user_id
  INNER JOIN rooms_tbl ON booking_tbl.room_id = rooms_tbl.room_id
  WHERE booking_tbl.status = 'Checked-out' ORDER BY id DESC
";


$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Customer History Details</title>
  <link rel="stylesheet" href="../../../CSS/Admin.css">
</head>
<body>
  <div class="container">
    <nav class="sidebar">
      <h2>Admin Panel</h2>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/USERS/Admin_Users.php" tabindex="0">Users</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/ROOMS/Admin_Rooms.php" tabindex="0">Rooms</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/BOOKINGS/Admin_Pending.php" tabindex="0">Pending Bookings</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/BOOKINGS/Admin_Active.php" tabindex="0">Active Bookings</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/DETAILS/Admin_Details.php" tabindex="0" class="active">Customer History Details</a>


    </nav>

    <main class="content">
      <h1>Customer History Details (Checked-out)</h1>

      <table class="admin-table">
        <thead>
          <tr>
            <th>Booking ID</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Room Name</th>
            <th>Room Type</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Total Price</th>
            <th>Confirmation Code</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $row['Id'] ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
               <td><?= htmlspecialchars($row['room_name']) ?></td>
              <td><?= htmlspecialchars($row['room_type']) ?></td>
              <td><?= $row['Checkin_date'] ?></td>
              <td><?= $row['Checkout_date'] ?></td>
              <td>₱<?= $row['Total_price'] ?></td>
              <td><?= $row['Confirmation_code'] ?></td>
              <td>
              <?php
                $statusClass = '';  // Initialize
                if ($row['status'] === 'Pending') {
                  $statusClass = 'pending';
                } elseif ($row['status'] === 'Checked-in') {
                  $statusClass = 'checked-in';
                } elseif ($row['status'] === 'Checked-out') {
                  $statusClass = 'checked-out';
                }

                echo '<span class="status ' . $statusClass . '">';
                echo $row['status'];
                echo '</span>';
              ?></td>
              <td>
  
               <button class="action-button edit-button" onclick="window.location.href='Admin_Details_EDIT.php?id=<?= $row['Id'] ?>'">Edit</button>
               <button class="action-button delete-button" onclick="if(confirm('Are you sure?')) window.location.href='Admin_Details_DELETE.php?id=<?= $row['Id'] ?>'">Delete</button>

              </td>
    
  </button>
</td>

            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>
