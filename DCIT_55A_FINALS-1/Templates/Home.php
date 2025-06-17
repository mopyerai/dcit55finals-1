<?php
session_start();

// Now you can check login status
if (!isset($_SESSION['user_id'])) {
    header('Location: registration.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../CSS/Home.css">
<body>
<section class="head">
    <div class="navbar">
        <div class="logo">Hotel Booking</div>
        <div class="menu">
            <a href="Home.html">Home</a>
            <a href="Rooms.html">Rooms</a>
            <a href="booking_page.php">Booking</a>
            <a href="About_us.html">About Us</a>
        </div>   
    </div>
    <div class="header">
        <div class="heading">
            <h1>Welcome to BonVerNel Hotel</h1>
            <p>Your comfort is our priority</p>
        </div>
    </div>
    <div class="booking">
        <button class="book-now-btn">Book Now</button>
    </div>
</section>
<section class="features">
    <div class="feature-item fade-left">
        <div class="feature-img-container">
            <img src="../Image/feature1.jpeg" alt="Feature 1" class="feature-img">
        </div>
        <div class="feature-text">
            <h2>Luxury Rooms</h2>
            <p>
                Our luxury rooms are meticulously designed to provide you with the utmost comfort and elegance.
                Each room features premium furnishings, high-thread-count linens, ambient lighting, and tasteful décor
                that create a tranquil and inviting atmosphere. Whether you're traveling for business or leisure,
                you'll find our rooms to be a perfect sanctuary where style meets relaxation.
            </p>
            <br><br>
            <p>
                Enjoy breathtaking views, spacious layouts, and personalized service that cater to your every need.
                Experience the pinnacle of hospitality with our luxury accommodations that redefine comfort.Whether you're traveling for business or leisure, you'll find our rooms to be a perfect sanctuary where style meets relaxation.
                Experience a stay that blends convenience with sophistication, ensuring your comfort throughout your visit.
            </p>
        </div>
    </div>
    <div class="feature-item reverse fade-right">
        <div class="feature-text">
            <h2>Modern Amenities</h2>
            <p>
                Enjoy access to a wide range of state-of-the-art amenities designed to make your stay convenient and enjoyable.
                From high-speed Wi-Fi and smart TVs to our fully-equipped fitness center, spa, and rooftop pool,
            </p>
            <br><br>
            <p>    
                we ensure that every aspect of your stay is catered to with the latest technology and top-tier services.
                Whether you're unwinding or staying productive, we’ve got everything you need.
            </p>
        </div>
        <div class="feature-img-container">
            <img src="../Image/feature2.jpg" alt="Feature 2" class="feature-img">
        </div>
    </div>
    <div class="feature-item fade-left">
        <div class="feature-img-container">
            <img src="../Image/feature3.jpg" alt="Feature 3" class="feature-img">
        </div>
        <div class="feature-text">
            <h2>Peaceful Ambience</h2>
            <p>
                 Escape the hustle and bustle of everyday life in our serene environment, carefully curated to provide a peaceful retreat.
                From the soothing interior design to the tranquil outdoor spaces surrounded by nature, 
                every corner of our hotel is designed to promote relaxation and mindfulness.
            </p>
            <br><br>
            <p>    
                Whether you're sipping coffee on the terrace or enjoying a book by the garden, 
                you'll feel the calming effects of our peaceful ambience throughout your stay.
            </p>
        </div>
  </div>
</section>
<section class="services">
    <div class="service-header">
        <h2>Our Services</h2>
        <p>Explore the range of services </p>
        <p>we offer to enhance your stay</p>
    </div>
    <div class="service-items">
        <div class="service-item">
            <h3>Room Service</h3>
            <p>Enjoy 24/7 room service with a diverse menu to satisfy your cravings at any time.</p>
        </div>
        <div class="service-item">
            <h3>Spa & Wellness</h3>
            <p>Relax and rejuvenate with our spa services, including massages, facials, and wellness treatments.</p>
        </div>
        <div class="service-item">
            <h3>Concierge Service</h3>
            <p>Our concierge team is here to assist you with reservations, recommendations, and any special requests.</p>
        </div>
    </div>
</section>
<section class="footer">
    <div class="footer-content">
        <p>&copy; 2025 [Hotel Name]. All rights reserved.</p>
        <br>
        <p>Contact us:</p>
    </div>
</section>
</body>
<script src = "../JS/Home.js"></script>
</html>