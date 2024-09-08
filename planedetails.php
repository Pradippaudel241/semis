<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkyGuard - Aircraft Overview</title>
    <!-- Responsive Meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css">

    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            overflow-x: hidden;
            background-color: black;
        }

        /* Keyframe Animations */
        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Section Styles */
        section {
            padding: 40px 20px;
            margin: 20px auto;
            max-width: 1200px;
            background-color: #222;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s forwards;
        }

        @keyframes fadeInUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        h2 {
            color: #ffcc00;
            margin-bottom: 20px;
            text-align: center;
            position: relative;
        }

        h2::after {
            content: '';
            width: 60px;
            height: 3px;
            background-color: #00a8e8;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -10px;
        }

        /* Aircraft Details Section */
        #aircraft-details {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            justify-content: space-between;
        }

        .aircraft-image {
            flex: 1 1 45%;
            margin-bottom: 20px;
            text-align: center;
        }

        .aircraft-image img {
            width: 100%;
            max-width: 500px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }

        .aircraft-image img:hover {
            transform: scale(1.05);
        }

        .specifications {
            flex: 1 1 50%;
        }

        .specifications ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            color:black
        }

        .specifications li {
            background-color: #ccc;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .specifications li i {
            color: #0077b6;
            margin-right: 10px;
            font-size: 1.2em;
        }

        /* Crew Details Section */
        #crew-details .crew {
            display: flex;
            flex-wrap: wrap;
            gap:10px;
            justify-content: space-between;
        }

        .crew-member {
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 10px;
            flex: 1 1 48%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .crew-member:hover {
            background-color: #e0f0ff;
            transform: translateY(-10px);
        }

        .crew-member h3 {
            margin-top: 0;
            color: #0077b6;
        }

        .crew-member p {
            color: #555;
        }

        /* Popup Styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.9);
            width: 90%;
            max-width: 500px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            overflow: hidden;
            animation: popupIn 0.3s forwards;
        }

        @keyframes popupIn {
            from { transform: translate(-50%, -50%) scale(0.7); opacity: 0; }
            to { transform: translate(-50%, -50%) scale(1); opacity: 1; }
        }

        .popup-content {
            padding: 30px;
            text-align: center;
        }

        .popup-content img {
            max-width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 5px solid #0077b6;
        }

        .popup-content h4 {
            margin: 15px 0 10px 0;
            font-size: 1.8em;
            color: #0077b6;
        }

        .popup-content p {
            color: #555;
            line-height: 1.6;
        }

        .close-popup {
            background-color: #0077b6;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .close-popup:hover {
            background-color: #005f8c;
        }

        /* Overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 999;
            animation: fadeInOverlay 0.3s forwards;
        }

        @keyframes fadeInOverlay {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* User Ratings Section */
        #user-ratings {
            text-align: center;
        }

        .rating-stars {
            font-size: 2em;
            color: #ffd700;
            display: inline-block;
            margin-top: 10px;
        }

        .rating-stars i {
            transition: transform 0.3s ease;
        }

        .rating-stars i:hover {
            transform: scale(1.2);
        }

        /* Maintenance Section */
        #maintenance h3 {
            color: #ffcc00;
        }

        .maintenance-ratio, .maintenance-record {
            background-color: #e6ffe6;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
            color:black
        }

        .maintenance-ratio:hover, .maintenance-record:hover {
            transform: translateY(-10px);
        }

        /* Incident Reports Section */
        #incident-reports h3 {
            color: #d9534f;
        }

        .incident-report {
            background-color: #ffe6e6;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
            color:black
        }

        .incident-report:hover {
            transform: translateY(-10px);
        }

        /* User Comments Section */
        #user-comments .comment {
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            color:black
        }

        .comment h4 {
            margin-top: 0;
            color: black;
        }


        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #111;
            color: #ffcc00;
            margin-top: 40px;

        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            #aircraft-details {
                flex-direction: column;
            }

            .aircraft-image, .specifications {
                flex: 1 1 100%;
            }

            .crew-member {
                flex: 1 1 100%;
            }
        }

        .history {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
            }

            .chevron {
            margin-left: auto; /* Pushes the span to the right */
            }

            .history-list {
            display: none; /* Hide history list by default */
            margin: 0;
            padding: 0;
            list-style: none;
            width: 100%;
            }

            .history-list li {
            padding: 10px 20px;
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: start;
            }

            .history .label{
                  width: 100%;
                  display: flex;
                  justify-content: space-between;
                  align-items: center;
            }

            .history .historydetail{
                  display: flex;
                  flex-direction: column;
            }
            .book-btn {
    display: block;
    width: 200px;
    margin: 20px auto;
    padding: 15px 0;
    font-size: 18px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.book-btn a {
    color: inherit; /* Ensures the link inherits the button's text color */
    text-decoration: none; /* Removes the underline from the link */
    display: block; /* Makes the link cover the entire button area */
    width: 100%;
    height: 100%;
}

.book-btn:hover {
    background-color: #0056b3;
}


    </style>
</head>
<body>
<?php include 'navbar.php'; ?>


    
    <section id="aircraft-details">
        <h2>Bombardier Dash Q400</h2>
        <div class="aircraft-image">
            
        </div>
        <div class="specifications">
            <h3>Specifications</h3>
            <ul>
                <li><i class="fas fa-industry"></i> Manufacturer: Bombardier</li>
                <li><i class="fas fa-chair"></i> Total Seats: 46</li>
                <li><i class="fas fa-route"></i> Range: 2,522 km</li>
                <li><i class="fas fa-cogs"></i> Engines: 2 × Pratt & Whitney PW150A</li>
                <li><i class="fas fa-box"></i> Cargo Capacity: 13.74 cubic meters</li>
                <li><i class="fas fa-gas-pump"></i> Fuel Capacity: 5,678 liters</li>
                <li><i class="fas fa-calendar-alt"></i> Age: 10 years</li>
                <li><i class="fas fa-dollar-sign"></i> Unit Cost: $32 million (as of 2019)</li>
                <li class="history"><i class="fas fa-receipt"></i> Purchase History<span style="align-self:end"><i class="fa fa-chevron-down" aria-hidden="true"></i></span></li>


            </ul>
        </div>
    </section>

    <section id="crew-details">
        <h2>Crew Information</h2>
        <div class="crew">
            <div class="crew-member" onclick="showPopup('Captain Pawan Tamang', 'images/pawantamang.png', 'Captain', 'With over 10,000 flight hours, Captain Pawan Tamang has extensive experience flying the Bombardier Dash Q400 in various weather conditions. He is known for his calm demeanor and quick decision-making.')">
                <h3>Captain Pawan Tamang</h3>
                <p>Experience: 10,000+ flight hours</p>
                <p>Age: 45 years</p>
            </div>
            <div class="crew-member" onclick="showPopup('First Officer Ritesh Shrestha', 'images/copilot.png', 'First Officer', 'First Officer Ritesh Shrestha has accumulated 4,500 flight hours. He is recognized for his attention to detail and excellent communication skills in the cockpit.')">
                <h3>First Officer Ritesh Shrestha</h3>
                <p>Experience: 4,500+ flight hours</p>
                <p>Age: 29 years</p>
            </div>
        </div>
    </section>

    <!-- Crew Member Popup -->
    <div class="overlay" onclick="closePopup()"></div>
    <div class="popup">
        <div class="popup-content">
            <img id="crew-image" src="" alt="Crew Member">
            <h4 id="crew-name"></h4>
            <p id="crew-role"></p>
            <p id="crew-bio"></p>
            <button class="close-popup" onclick="closePopup()">Close</button>
        </div>
    </div>

    <section id="user-ratings">
        <h2>Overall CAAN Ratings</h2>
        <div class="rating-stars">
            <i class="fas fa-star" onclick="rate(1)"></i>
            <i class="fas fa-star" onclick="rate(2)"></i>
            <i class="fas fa-star" onclick="rate(3)"></i>
            <i class="fas fa-star" onclick="rate(4)"></i>
            <i class="fas fa-star-half-alt" onclick="rate(5)"></i>
        </div>
        <p id="rating-value">4.5 out of 5</p>
    </section>

    <section id="maintenance">
        <h2>Maintenance Information</h2>
        <div class="maintenance-ratio">
            <h3>Maintenance Ratio</h3>
            <p>Average downtime: 2.5 days per month</p>
        </div>
        <div class="maintenance-history">
            <h3>Maintenance History</h3>
            <div class="maintenance-record">
                <h4>Engine Check - July 2023</h4>
                <p>Routine engine check performed with no issues found.</p>
            </div>
            <div class="maintenance-record">
                <h4>Landing Gear Replacement - May 2023</h4>
                <p>Landing gear replaced due to wear and tear.</p>
            </div>
        </div>
    </section>

    <section id="incident-reports">
        <h2>Incident Reports</h2>
        <div class="incident-report">
            <h4>Bird Strike - March 2022</h4>
            <p>A minor bird strike occurred during landing, with no significant damage to the aircraft.</p>
        </div>
    </section>

    <section id="user-comments">
        <h2>User Comments</h2>
        <div class="comment">
            <h4>Kerusha Kharel</h4>
            <p>A smooth and comfortable flight with excellent service from the crew. The aircraft felt very stable during turbulence.</p>
        </div>
        <div class="comment">
            <h4>Agya Bhandari</h4>
            <p>Had a great experience flying on this aircraft. The seats were comfortable, and the crew was very professional.</p>
        </div>
        <div class="comment">
            <h4>Prabesh Magar</h4>
            <p>The flight was on time, and the onboard services were excellent. Highly recommend flying with this aircraft.</p>
        </div>
        <div class="comment">
            <h4>Pradip Paudel</h4>
            <p>Impressed with the smooth takeoff and landing. The cabin was clean, and the staff was friendly.</p>
        </div>
    </section>

 
   
    <button class="book-btn">
    <a href="book.php">Book</a>
</button>


    <footer>
        <p>&copy; 2024 SkyGuard. All Rights Reserved.</p>
    </footer>

    

    <script src="script.js"></script>
    <script src="planedetails.js"></script>
</body>
</html>