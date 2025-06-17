<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch rooms from the database
$sql = "SELECT * FROM rooms_tbl";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hotel Booking - Available Rooms</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../CSS/Rooms.css">
</head>
<body>
  <header>
    <div class="logo" tabindex="0">HotelBooking</div>
    <nav>
      <a href="#" tabindex="0">Home</a>
      <a href="#" tabindex="0">Room</a>
      <a href="#" tabindex="0">Booking</a>
      <a href="#" tabindex="0">About Us</a>
    </nav>
  </header>

  <main class="container">
    <section class="hero">
      <h1>Find Your Perfect Room</h1>
      <p>Explore our available rooms and pick the ideal stay for your next visit.</p>
    </section>

    <section>
      <div class="rooms-grid" id="rooms-grid">
        <?php if ($result && $result->num_rows > 0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
            <article class="room-card" tabindex="0">
              <h2 class="room-title"><?= htmlspecialchars($row['room_name']) ?></h2>
              <p class="room-info">
                <?= htmlspecialchars($row['bed_info']) ?> • 
                <?= htmlspecialchars($row['view_info']) ?> • 
                <?= htmlspecialchars($row['guest_capacity']) ?> Guests
              </p>
              <img src="../Image/<?= htmlspecialchars($row['image_path']) ?>" alt="Room Image" class="room-image">
              <div class="room-meta">
                <span class="room-price">$<?= htmlspecialchars($row['price_per_night']) ?> / night</span>
                <span class="availability">
                  <span class="<?= $row['availability'] ? 'available-dot' : 'unavailable-dot' ?>"></span>
                  <?= $row['availability'] ? 'Available' : 'Unavailable' ?>
                </span>
              </div>
              <button class="book-now-btn" type="button">Book Now</button>
            </article>
          <?php endwhile; ?>
        <?php else: ?>
          <p>No rooms available at the moment.</p>
        <?php endif; ?>
      </div>
    </section>
  </main>

  <footer>
    &copy; 2024 HotelEase. All rights reserved.
  </footer>

  <script src="../JS/Rooms.js"></script>
</body>
</html>
<?php $conn->close(); ?>
