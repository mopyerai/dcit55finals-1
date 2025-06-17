<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
$result = $conn->query("SELECT * FROM booking_tbl WHERE status = 'Checked-in' ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel - Active Bookings</title>
  <link rel="stylesheet" href="../../../CSS/Admin.css">
</head>
<body>
  <div class="container">
    <nav class="sidebar">
      <h2>Admin Panel</h2>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/USERS/Admin_Users.php" tabindex="0">Users</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/ROOMS/Admin_Rooms.php" tabindex="0">Rooms</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/BOOKINGS/Admin_Pending.php" tabindex="0">Pending Bookings</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/BOOKINGS/Admin_Active.php" tabindex="0" class="active">Active Bookings</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/DETAILS/Admin_Details.php" tabindex="0">Customer History Details</a>

    </nav>

    <main class="content" tabindex="0">
      <h1>Active Bookings</h1>
      
      <table class="admin-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Room Type</th>
            <th>Guest</th>
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
              <td><?= htmlspecialchars($row['Room_type']) ?></td>
              <td><?= $row['Guest'] ?></td>
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
              ?>
            </td>

              <td>
                <button class="action-button edit-button" onclick="window.location.href='Admin_Active_EDIT.php?id=<?= $row['Id'] ?>'">Edit</button>
                <button class="action-button delete-button" onclick="if(confirm('Are you sure?')) window.location.href='Admin_Active_DELETE.php?id=<?= $row['Id'] ?>'">Delete</button>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>
