<?php
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM users_tbl WHERE user_id = $id");
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <link rel="stylesheet" href="../../../CSS/Admin.css">
</head>
<body>
  <a href="Admin_Users.php" class="back-button">← Back</a>
  <div class="edit-user-page">
    
    <form action="Admin_Users_UPDATE.php" method="POST" class="form-container">
       <div class ="euser"> <h2>Edit User</h2></div><br> 
      <input type="hidden" name="id" value="<?= $user['user_id'] ?>">

      <label class="form-label">Name:</label>
      <input type="text" name="name" value="<?= htmlspecialchars($user['Name']) ?>" required class="form-input"><br>

      <label class="form-label">Email:</label>
      <input type="email" name="email" value="<?= htmlspecialchars($user['Email']) ?>" required class="form-input"><br>

      <button type="submit" class="admin-button">Update</button>
    </form>
  </div>
</body>
</html>
