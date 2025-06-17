<!DOCTYPE html>
<html>
<head>
  <title>Add User</title>
  <link rel="stylesheet" href="../../../CSS/Admin.css">
</head>
<body>
    <a href="Admin_Users.php" class="back-button">← Back</a>
  <form action="Admin_Users_INSERT.php" method="POST" class="add-user-form">
    <h2 class="form-title">Add New User</h2>

    <label class="form-label">Name:</label>
    <input type="text" name="name" required class="form-input">

    <label class="form-label">Email:</label>
    <input type="email" name="email" required class="form-input">

    <label class="form-label">Password:</label>
    <input type="password" name="password" required class="form-input">

    <button type="submit" class="submit-button">Add User</button>
    
  
  </form>
</body>
</html>
