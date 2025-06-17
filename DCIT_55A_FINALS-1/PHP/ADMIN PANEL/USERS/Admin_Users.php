<?php
// Connect to your database
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db"); // Replace with your actual DB name

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel - Side Navigation</title>
  <link rel="stylesheet" href="../../../CSS/Admin.css">
</head>
<body>
  <div class="container">
    <nav class="sidebar">
      <h2>Admin Panel</h2>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/USERS/Admin_Users.php" tabindex="0" class="active">Users</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/ROOMS/Admin_Rooms.php" tabindex="0">Rooms</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/BOOKINGS/Admin_Pending.php" tabindex="0">Pending Bookings</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/BOOKINGS/Admin_Active.php" tabindex="0">Active Bookings</a>
      <a href="/DCIT_55A_FINALS-1/PHP/ADMIN PANEL/DETAILS/Admin_Details.php" tabindex="0">Customer History Details</a>

    </nav>
 <main class="content" tabindex="0">
  <h1>Users</h1>
<button class="admin-button" onclick="window.location.href='Admin_Users_ADD.php'"> Add New User</button>


  <table border="1" cellpadding="10">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = mysqli_query($conn, "SELECT * FROM users_tbl ORDER BY user_id DESC");

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['user_id']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['Email']}</td>
                <td>******</td>
                <td>
                 <button class='action-button edit-button' onclick=\"location.href='Admin_Users_EDIT.php?id={$row['user_id']}'\">Edit</button>
          <button class='action-button delete-button' onclick=\"if(confirm('Are you sure you want to delete this user?')) location.href='Admin_Users_DELETE.php?id={$row['user_id']}';\">Delete</button>
                </td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
</main>

  </div>
</body>
</html>

<?php
$conn->close();
?>
