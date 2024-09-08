<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Flight Search</title>
      <link rel="stylesheet" href="styles.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

      <style>
            body {
                  font-family: 'Roboto', sans-serif;
                  background: url('images/back1.png') no-repeat center center/cover;
                  margin: 0;
                  padding: 0;
            }

            h2 {
                  text-align: center;
                  font-size: 2rem;
                  color: white;
                  margin-top: 20px;
                  opacity: 0;
                  transform: translateY(30px);
                  transition: opacity 1.5s ease, transform 1.5s ease;
            }

            /* Preloader styles */
            #preloader {
                  position: fixed;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                  background-color: #000;
                  z-index: 9999;
                  display: flex;
                  align-items: center;
                  justify-content: center;
            }

            .spinner {
                  border: 6px solid #f3f3f3;
                  /* Light grey */
                  border-top: 6px solid #ffcc00;
                  /* Yellow */
                  border-radius: 50%;
                  width: 60px;
                  height: 60px;
                  animation: spin 2.5s linear infinite;
                  /* Slower spin animation */
            }

            @keyframes spin {
                  0% {
                        transform: rotate(0deg);
                  }

                  100% {
                        transform: rotate(360deg);
                  }
            }

            /* Flight container styles */
            .flight-container {
                  display: grid;
                  grid-template-columns: repeat(2, 1fr);
                  /* Two items per row */
                  gap: 50px;
                  padding: 10px;
                  margin: 0 auto;
                  max-width: 1200px;
                  opacity: 0;
                  transform: translateY(30px);
                  /* Move down slightly before appearing */
                  transition: opacity 1.5s ease, transform 1.5s ease;
                  /* Smooth transition */
            }

            .flight-card {
                  background-color: white;
                  border-radius: 12px;
                  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                  padding: 20px;
                  transition: all 0.3s ease-in-out;
                  position: relative;
                  overflow: hidden;
            }

            .flight-card:hover {
                  transform: scale(1.05);
            }

            .flight-card h3 {
                  font-size: 1.5rem;
                  color: #ffcc00;
            }

            .flight-card p {
                  margin: 6px 0;
                  font-size: 1rem;
                  color: #555;
            }

            .flight-card .price {
                  color: #28a745;
                  font-size: 1.5rem;
                  font-weight: bold;
            }

            .flight-card .status {
                  font-size: 0.9rem;
                  color: #fff;
                  background-color: #007bff;
                  padding: 5px 10px;
                  border-radius: 8px;
                  text-align: center;
                  width: fit-content;
            }

            .flight-card .status.delayed {
                  background-color: #ff6347;
            }

            .flight-actions {
                  display: flex;
                  justify-content: space-between;
                  margin-top: 15px;
            }

            .book-btn {
                  background-color: #ffcc00;
                  color: #fff;
                  padding: 10px 20px;
                  border-radius: 6px;
                  border: none;
                  cursor: pointer;
                  font-size: 1rem;
                  transition: background-color 0.2s;
            }

            .book-btn:hover {
                  background-color: #218838;
            }

            .flight-details-btn {
                  background-color: #f8f9fa;
                  color: #007bff;
                  padding: 8px 12px;
                  border: 1px solid #007bff;
                  border-radius: 6px;
                  cursor: pointer;
                  font-size: 1rem;
                  transition: background-color 0.2s;
            }

            .flight-details-btn:hover {
                  background-color: #007bff;
                  color: #fff;
            }

            .flight-info {
                  display: flex;
                  justify-content: space-between;
                  margin-top: 10px;
                  align-items: center;
            }

            .flight-info i {
                  margin-right: 5px;
            }

            .icon-text {
                  display: flex;
                  align-items: center;
            }

            /* Logo style */
            .flight-logo {
                  width: 80px;
                  position: absolute;
                  top: 20px;
                  right: 20px;
            }

            .auth-headers {
                  opacity: 1;
                  transform: translateY(-20px);


            }

            /* RESPONSIVENESS */

            /* For mobile devices (less than 768px) */
            @media (max-width: 767px) {
                  .flight-container {
                        grid-template-columns: 1fr;
                        padding: 10px;
                        gap: 20px;
                  }
                  .flight-logo {
                        width: 60px;
                  }
                  h2{
                        font-size: 2rem;
                  }
            }

            footer {
            text-align: center;
            padding: 20px;
            background-color: #111;
            color: #ffcc00;
            margin-top: 40px;

        }
      </style>
</head>

<body>

      <!-- Preloader Animation -->
      <div id="preloader">
            <div class="spinner"></div>
      </div>

      <?php include 'navbar.php'; ?>

      <h2  >Available Flightss !!</h2><br>

      <div class="flight-container">
            <!-- Dynamic flight cards will be injected here -->
      </div>
      <footer>
        <p>&copy; 2024 SkyGuard. All Rights Reserved.</p>
    </footer>
      <?php include 'authmodel.php'; ?>

      <script>
            // Preloader Script
            window.addEventListener("load", function() {
                  const preloader = document.getElementById("preloader");
                  const flightContainer = document.querySelector('.flight-container');
                  const heading = document.querySelector('h2');

                  preloader.style.opacity = "0"; // Fade out preloader
                  preloader.style.transition = "opacity 1s ease"; // Smooth fade-out
                  setTimeout(() => {
                        preloader.style.display = "none"; // Hide preloader after fade-out

                        flightContainer.style.opacity = "1"; // Fade in flight container
                        flightContainer.style.transform = "translateY(0)"; // Reset position

                        heading.style.opacity = "1"; // Fade in heading
                        heading.style.transform = "translateY(0)"; // Reset position
                  }, 1000); // Set delay to match fade-out transition
            });
      </script>
      <script src="flightScript.js"></script>
      <script src="script.js"></script>

</body>

</html>