<?php
session_start();

// Now you can check login status
if (!isset($_SESSION['user_id'])) {
    header('Location: registration.html');
    exit();
}
$conn = new mysqli("localhost", "root", "cclpassword", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hotel Booking Page</title>
  <link rel="stylesheet" href="../CSS/booking.css" />
</head>
<body>
  <header>
    <div class="container">
      <nav>
        <div class="logo">BonVerNel Hotel</div>
        <div class="nav-links">
          <a href="#">Home</a>
          <a href="#">Rooms</a>
          <a href="#">Amenities</a>
          <a href="#">Contact</a>
        </div>
      </nav>
    </div>
  </header>

  <main>
    <section class="hero container">
      <h1>Book Your Stay</h1>
      <p>Choose your room, dates, and number of guests to check availability and pricing.</p>
    </section>

    <section class="booking-section">
      <form name="booking" class="booking-form" id="bookingForm" action="../PHP/form_action_booking.php" method="post">
        <h2 class="sr-only">Booking Form</h2>

        <!-- Room Selection -->
        <div>
          <label for="room_id">Room</label>
          <select id="room_id" name="room_id" required>
            <option value="" disabled selected>Select a room</option>
            <?php
              $result = $conn->query("SELECT room_id, room_name, room_type, price_per_night FROM rooms_tbl");
              while ($row = $result->fetch_assoc()) {
                $room_id = $row['room_id'];
                $room_name = htmlspecialchars($row['room_name'], ENT_QUOTES);
                $room_type = htmlspecialchars($row['room_type'], ENT_QUOTES);
                $price = $row['price_per_night'];
                echo "<option value='$room_id' 
                          data-type='$room_type' 
                          data-price='$price'>
                          $room_name
                      </option>";
              }
            ?>
          </select>
          <input type="hidden" name="roomType" id="roomType" />
        </div>

        <div>
          <label for="guests">Number of Guests</label>
          <input type="number" id="guests" name="guests" min="1" max="10" required />
        </div>

        <div>
          <label for="checkin">Check-in Date</label>
          <input type="date" id="checkin" name="checkin" required />
        </div>

        <div>
          <label for="checkout">Check-out Date</label>
          <input type="date" id="checkout" name="checkout" required />
        </div>

        <div class="availability" id="availabilityBox">
          <p id="availabilityText"></p>
          <p class="price" id="totalPrice"></p>
        </div>

        <input type="hidden" id="hiddenTotalPrice" name="totalPrice" value="" />

        <button type="submit" class="proceed-btn" required>Proceed to Payment</button>
      </form>
    </section>
  </main>

<script>
(function() {
  const bookingForm = document.getElementById('bookingForm');
  const roomSelect = document.getElementById('room_id');
  const roomTypeHiddenInput = document.getElementById('roomType');
  const guestsEl = document.getElementById('guests');
  const checkinEl = document.getElementById('checkin');
  const checkoutEl = document.getElementById('checkout');
  const availabilityBox = document.getElementById('availabilityBox');
  const availabilityText = document.getElementById('availabilityText');
  const totalPriceEl = document.getElementById('totalPrice');
  const hiddenTotalPriceEl = document.getElementById('hiddenTotalPrice');
  const proceedBtn = bookingForm.querySelector('button[type="submit"]');

  function setMinDates() {
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const dd = String(today.getDate()).padStart(2, '0');
    const minDate = `${yyyy}-${mm}-${dd}`;
    checkinEl.min = minDate;
    checkoutEl.min = minDate;
  }
  setMinDates();

  function dateDiffInDays(a, b) {
    const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
    const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());
    return Math.floor((utc2 - utc1) / (1000 * 60 * 60 * 24));
  }

  checkinEl.addEventListener('change', () => {
    if (checkinEl.value) {
      const checkinDate = new Date(checkinEl.value);
      const nextDay = new Date(checkinDate);
      nextDay.setDate(checkinDate.getDate() + 1);
      const yyyy = nextDay.getFullYear();
      const mm = String(nextDay.getMonth() + 1).padStart(2, '0');
      const dd = String(nextDay.getDate()).padStart(2, '0');
      checkoutEl.min = `${yyyy}-${mm}-${dd}`;  // Fix this line
      if (checkoutEl.value && checkoutEl.value <= checkinEl.value) {
        checkoutEl.value = '';
      }
    }
    updateAvailability();
  });

  [roomSelect, guestsEl, checkoutEl].forEach(el =>
    el.addEventListener('input', updateAvailability)
  );

  function updateAvailability() {
    availabilityBox.classList.remove('visible');
    availabilityText.textContent = '';
    totalPriceEl.textContent = '';
    proceedBtn.disabled = true;

    const selectedOption = roomSelect.options[roomSelect.selectedIndex];
    if (!selectedOption || !selectedOption.value) return;

    const roomType = selectedOption.dataset.type;
    const pricePerNight = parseFloat(selectedOption.dataset.price);
    roomTypeHiddenInput.value = roomType;

    const guests = parseInt(guestsEl.value, 10);
    const checkinVal = checkinEl.value;
    const checkoutVal = checkoutEl.value;

    if (!checkinVal || !checkoutVal) return;

    if (isNaN(guests) || guests < 1) {
      availabilityText.textContent = 'Please enter a valid number of guests.';
      availabilityBox.classList.add('visible');
      return;
    }

    const checkinDate = new Date(checkinVal);
    const checkoutDate = new Date(checkoutVal);
    if (checkoutDate <= checkinDate) {
      availabilityText.textContent = 'Check-out date must be after check-in date.';
      availabilityBox.classList.add('visible');
      return;
    }

    const nights = dateDiffInDays(checkinDate, checkoutDate);
    const totalPrice = pricePerNight * nights;

    availabilityText.textContent = `Available: ${roomType} for ${nights} night${nights > 1 ? 's' : ''}.`;
    totalPriceEl.textContent = `Total Price: ₱${totalPrice.toFixed(2)}`;
    hiddenTotalPriceEl.value = totalPrice.toFixed(2);
    proceedBtn.disabled = false;
    availabilityBox.classList.add('visible');
  }

  bookingForm.addEventListener('submit', (e) => {
    if (proceedBtn.disabled) e.preventDefault();
  });
})();
</script>

<style>
  .sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0,0,0,0);
    border: 0;
  }
</style>

</body>
</html>
