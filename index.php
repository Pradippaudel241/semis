<?php
setcookie('name', '', time() - 3600, '/');
// Assuming you've set a cookie for the username
if (isset($_COOKIE['name'])) {
    $username = $_COOKIE['name'];
    
    // Extract initials
    $nameParts = explode(" ", $username);
    $firstInitial = strtoupper($nameParts[0][0]);
    $lastInitial = isset($nameParts[1]) ? strtoupper($nameParts[1][0]) : '';
    $initials = $firstInitial . $lastInitial;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkyGuard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" >
      <style>

@media (max-width: 768px) {
      .auth-buttons{
            display: none;
      }
}ssss
      </style>
</head>
<body>
<?php include 'navbar.php'; ?>

    <section class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <h2 id="page-heading">Fly with SkyGuard<span class="plane">✈️</span></h2>
            <p id="page-subtext">SkyGuard is an aviation safety system designed to reduce engine-related failures and improve flight safety in airways through data integration.</p>
            <form class="flight-search-form" action="#" method="POST">
    <div class="form-row">
        <div class="input-group trip-toggle">
            <label class="switch">
                <input type="checkbox" id="trip-type-toggle" onclick="toggleReturnDate()">
                <span class="slider"></span>
            </label>
            <span id="trip-type-label">One-Way</span>
        </div>
        <div class="input-group">
            <label for="departure">Departure City</label>
            <select id="departure" required>
                <option value="" disabled selected>Select your departure city</option>
                <option value="Kathmandu">Kathmandu</option>
                <option value="Pokhara">Pokhara</option>
                <option value="Biratnagar">Biratnagar</option>
                <option value="Nepalgunj">Nepalgunj</option>
                <option value="Bhairahawa">Bhairahawa</option>
            </select>
        </div>
        <div class="input-group">
            <label for="arrival">Arrival City</label>
            <select id="arrival" required>
                <option value="" disabled selected>Select your arrival city</option>
                <option value="Kathmandu">Kathmandu</option>
                <option value="Pokhara">Pokhara</option>
                <option value="Biratnagar">Biratnagar</option>
                <option value="Nepalgunj">Nepalgunj</option>
                <option value="Bhairahawa">Bhairahawa</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="input-group">
            <label for="departure-date">Departure Date</label>
            <input type="date" min="<?php echo date('Y-m-d'); ?>" id="departure-date" required>
        </div>

        <div class="input-group" id="return-date-group" style="display: none;">
            <label for="return-date">Return Date</label>
            <input type="date" min="<?php echo date('Y-m-d'); ?>" id="return-date">
        </div>
        <div class="input-group">
            <label for="travellers">Travellers</label>
            <input type="number" max="15" min="1" id="travellers" placeholder="Number of passengers" required>
        </div>
    </div>
    <button type="button" class="search-btn" onclick="showLoadingAnimation()">Search Your Flight</button>
    </form>

    <!-- Loading Animation -->
<div id="loading-animation" class="loading-container" style="background-color:transparent;">
    <div class="plane-container">
        <img src="images/trans.png"  alt="Flying Plane" class="plane-img" style="animation: fly 25s linear infinite; height: 100px; width:200px;">
    </div>
    <h2 class="loading-text" style=" font-size: 1.8em; color:#ffcc00;">Finding your flights...</h2>
   <div class="loading-circle"></div>
    
    <p class="loading-subtext" style="color:white;">Patiently searching for your perfect flight match.<br>
    Your next getaway is in the making – thanks for your patience! ✈️ 😊</p>

        
</div>


        </div>
    </section>
 <!-- Modal for Login and Sign Up -->
 <?php include 'authmodel.php'; ?>
 <?php include 'skyguard.php'; ?>

 <footer class="site-footer">
    <div class="footer-container">
        <div class="footer-about">
            <h3>About SkyGuard</h3>
            <p>SkyGuard is dedicated to enhancing aviation safety through cutting-edge technology, real-time data integration, and advanced monitoring systems. Trust us to keep your flights safe and secure.</p>
        </div>
        
        <div class="footer-links">
            <h3 >Quick Links</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Support</a></li>
            </ul>
        </div>
        
        <div class="footer-social">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    
   
</footer>



    <script src="script.js"></script>
</body>
</html>