const params = new URLSearchParams(window.location.search);

let source = decodeURIComponent(params.get('source'));
let destination = decodeURIComponent(params.get('destination'));

// Fetch flights and log any errors if fetching fails
async function fetchFlights() {
    try {
        console.log('Fetching flights...');  // Debugging log
        const response = await fetch('flights.json');
        const flightsJson = await response.json();

        console.log('Flights data:', flightsJson);  // Check the fetched data

        const filteredFlights = flightsJson.filter(flight => (
            flight.source === source && flight.destination === destination
        ));

        console.log('Filtered flights:', filteredFlights);  // Log the filtered flights
        displayFlights(filteredFlights);

    } catch (error) {
        console.error('Error fetching the flight data:', error);
    }
}

function displayFlights(flights) {
    const flightContainer = document.querySelector('.flight-container');
    flightContainer.innerHTML = ''; // Clear any existing content

    if (flights.length === 0) {
        flightContainer.innerHTML = '<p>No flights found.</p>';
        return;
    }

    flights.forEach(flight => {
        const flightCard = document.createElement('div');
        flightCard.className = 'flight-card';

        flightCard.innerHTML = `
            <h3>${flight.airlineName}</h3>
            <p><strong>Plane:</strong> ${flight.aeroplaneName}</p>
            <div class="flight-info">
                <p class="icon-text"><i class="fas fa-clock"></i>${flight.flightTime} (${flight.duration})</p>
                <p class="status ${flight.status === 'Delayed' ? 'delayed' : ''}">${flight.status}</p>
            </div>
            <p><strong>Source:</strong> ${flight.source} &rarr; <strong>Destination:</strong> ${flight.destination}</p>
            <p><strong>Class:</strong> ${flight.class}</p>
            <p class="price">NPR ${flight.price}</p>
            <p><strong>Weight:</strong> ${flight.weight}</p>
            <div class="flight-actions">
                <a href='planedetails.php?id=${flight.planeId}'> 
                    <button class="flight-details-btn">Plane Details</button></a>
                <button class="book-btn"><a href="book.php" style="text-decoration:none;">Book</a></button>
            </div>
            <img src="${flight.logo}" alt="${flight.airlineName} logo" class="flight-logo">
        `;

        flightContainer.appendChild(flightCard);

        // Select the book button
        const bookBtn = flightCard.querySelector('.book-btn');
        
        // Debugging: Check if the button exists
        if (bookBtn) {
            console.log('Attaching click listener to book button for flight:', flight.airlineName);
            
            // Attach the event listener to the book button
            bookBtn.addEventListener('click', () => {
               
            });
        } else {
            console.error('Book button not found for flight:', flight.airlineName);
        }
    });
}

fetchFlights();
