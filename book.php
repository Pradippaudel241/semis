<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f8ff;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        width: 100%;
        max-width: 600px;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #2c3e50;
    }

    h2 {
        margin-bottom: 15px;
        color: #2980b9;
    }

    .form-section {
        display: none; /* Sections hidden by default */
    }

    input, select, button {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #3498db;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #2980b9;
    }

    .hidden {
        display: none;
    }

    .form-section.active {
        display: block; /* Visible section */
    }
    .font 
    {
        text-align: center;
    }

</style>
<body>
    <div class="container">
        <h1>Flight Booking System</h1>

        <!-- User Credentials Form -->
        <section id="credentials-section" class="form-section active"> <!-- Initial section visible -->
            <h2>Enter Your Credentials</h2>
            <form id="credentials-form">
                <input type="text" id="name" placeholder="Full Name" required>
                <input type="email" id="email" placeholder="Email" required>
                <input type="tel" id="phone" placeholder="Phone Number" required>
                <button type="button" onclick="showFlightSelection()">Next: Choose Flight</button>
            </form>
        </section>

        <!-- Flight Selection Form -->
        <!-- <section id="flight-section" class="form-section hidden">
            <h2>Select Your Flight</h2>
            <form id="flight-form">
                <label for="destination">Destination:</label>
                 <select id="destination" required>
                    <option value="">Select</option>
                    <option value="New York">New York</option>
                    <option value="Paris">Paris</option>
                    <option value="Tokyo">Tokyo</option>
                </select> -->
                <!-- <input type="text" placeholder="pokhara">
                <label for="date">Date:</label>
                <input type="date" id="date" placeholder="" required>
                <label for="class">Class:</label>
                <input type="text" placeholder="Economy" required>
                <select id="class" required> 
                    <option value="">Select</option>
                    <option value="Economy">Economy</option>
                    <option value="Business">Business</option>
                    <option value="First Class">Economy</option>
                </select> 
                <button type="button" onclick="showPaymentSection()">Next: Payment</button>
            </form>
        </section> -->

        <!-- Payment Section -->
        <section id="payment-section" class="form-section hidden">
            <h2>Payment Details</h2>
            <form id="payment-form">
                <input type="text" id="card-name" placeholder="Cardholder Name" required>
                <input type="text" id="card-number" placeholder="Card Number" required>
                <input type="month" id="expiry-date" required>
                <input type="text" id="cvv" placeholder="CVV" required>
                <button type="button" onclick="submitBooking()">Pay and Book</button>
            </form>
        </section>

        <!-- Confirmation Section -->
        <section id="confirmation-section" class="hidden">
            <h2 class="font">Booking Confirmed!</h2>
            <p class="font" >Thank you for booking your flight with us.</p>
        </section>
    </div>

    <script>
        // Function to show the flight selection after user credentials
        function showFlightSelection() {
            const credentialsSection = document.getElementById('credentials-section');
            const flightSection = document.getElementById('flight-section');

            // Hide credentials section, show flight selection section
            credentialsSection.classList.add('hidden');
            flightSection.classList.remove('hidden');
            flightSection.classList.add('active');
        }

        // Function to show the payment section after flight selection
        // function showPaymentSection() {
        //     const flightSection = document.getElementById('flight-section');
        //     const paymentSection = document.getElementById('payment-section');

        //     // Hide flight section, show payment section
        //     flightSection.classList.add('hidden');
        //     paymentSection.classList.remove('hidden');
        //     paymentSection.classList.add('active');
        // }

        // Function to confirm booking
        function submitBooking() {
            const paymentSection = document.getElementById('flight-section');
            const confirmationSection = document.getElementById('confirmation-section');

            // Hide payment section, show confirmation message
            paymentSection.classList.add('hidden');
            confirmationSection.classList.remove('hidden');
            confirmationSection.classList.add('active');
        }
    </script>
</body>
</html>
