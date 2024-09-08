const params = new URLSearchParams(window.location.search);

let id = params.get('id');

console.log(id)
let planeDetail=null
async function fetchDetails() {
      try {
          const response = await fetch('planes.json');
          const flightsJson = await response.json();
          
            planeDetail=flightsJson.find(plane =>plane.id==id)
            console.log(planeDetail)
      //     displayFlights(filteredFlights);
            displayDetails(planeDetail)
      } catch (error) {
          console.error('Error fetching the flight data:', error);
      }
  }


fetchDetails()



function displayDetails(plane){
      document.querySelector('#aircraft-details h2').textContent = plane.name;

      document.querySelector('.aircraft-image img').setAttribute('src', 'images/' + plane.image);
      document.querySelector('.aircraft-image img').setAttribute('alt', plane.name);
  
      document.querySelector('.specifications ul').innerHTML = `
          <li><i class="fas fa-industry"></i> Manufacturer: ${plane.manufacture}</li>
          <li><i class="fas fa-chair"></i> Total Seats: ${plane.totalSeat}</li>
          <li><i class="fas fa-route"></i> Range: ${plane.range}</li>
          <li><i class="fas fa-cogs"></i> Engines: ${plane.engines}</li>
          <li><i class="fas fa-box"></i> Cargo Capacity: ${plane.cargoCapacity}</li>
          <li><i class="fas fa-gas-pump"></i> Fuel Capacity: ${plane.fuelCapacity}</li>
          <li><i class="fas fa-calendar-alt"></i> Age: ${plane.age} years</li>
          <li><i class="fas fa-dollar-sign"></i> Unit Cost: $${plane.unitCost.toLocaleString()}</li>  
          <li><i class="fas fa-dollar-sign"></i> Purchase history<br>jhds}</li>  
       
           
      `;


      

      const crewContainer = document.querySelector('#crew-details .crew');
    
      crewContainer.innerHTML = '';
      console.log(plane.crew)
  
      plane.crew.forEach(crewMember => {
          const crewMemberDiv = document.createElement('div');
          crewMemberDiv.className = 'crew-member';
          crewMemberDiv.setAttribute('onclick', `showPopup('${crewMember.name}', 'images/${crewMember.name.toLowerCase().replace(/ /g, '')}.png', '${crewMember.position}', '${crewMember.description}')`);
          
          crewMemberDiv.innerHTML = `
              <h3>${crewMember.name}</h3>
              <p>Experience: ${crewMember.experience} flight hours</p>
              <p>Age: ${crewMember.age} years</p>
          `;
  
          crewContainer.appendChild(crewMemberDiv);
      });


      const totalRatings = plane.userReviews.reduce((sum, review) => sum + review.rating, 0);
      const averageRating = totalRatings / plane.userReviews.length;
  
      document.querySelector('#user-ratings #rating-value').textContent = `${averageRating.toFixed(1)} out of 5`;
  
      const stars = document.querySelectorAll('#user-ratings .rating-stars i');
      stars.forEach((star, index) => {
          if (averageRating >= index + 1) {
              star.classList.add('fas');
              star.classList.remove('far');
          } else if (averageRating >= index + 0.5) {
              star.classList.add('fas');
              star.classList.remove('far');
              star.classList.add('fa-star-half-alt');
          } else {
              star.classList.add('far');
              star.classList.remove('fas');
              star.classList.remove('fa-star-half-alt');
          }
      });


      const maintenanceHistoryContainer = document.querySelector('#maintenance .maintenance-history');
    
      maintenanceHistoryContainer.innerHTML = '<h3>Maintenance History</h3>';
      
      plane.maintenance.forEach(record => {
          const recordDiv = document.createElement('div');
          recordDiv.className = 'maintenance-record';
          
          recordDiv.innerHTML = `
              <h4>${record.type} - ${new Date(record.date).toLocaleDateString('en-US', { month: 'long', year: 'numeric' })}</h4>
              <p>${record.description}</p>
          `;
          
          maintenanceHistoryContainer.appendChild(recordDiv);
      });
  
      const averageDowntime = '2.5 days per month'; // Replace with real calculation if data is available
      document.querySelector('#maintenance .maintenance-ratio p').textContent = `Average downtime: ${averageDowntime}`;




      const incidentReportsContainer = document.querySelector('#incident-reports');
    
      incidentReportsContainer.innerHTML = '<h2>Incident Reports</h2>';
      console.log(plane.incidentReports)
      plane.incidentReports.forEach(report => {
        const reportDiv = document.createElement('div');
        reportDiv.className = 'incident-report';
        console.log(report.incident)
        reportDiv.innerHTML = `
            <h4>${report.incident} - ${new Date(report.date).toLocaleDateString('en-US', { month: 'long', year: 'numeric' })}</h4>
            <p>${report.description}</p>
        `;
        
        incidentReportsContainer.appendChild(reportDiv);
    });
    



    const userCommentsContainer = document.querySelector('#user-comments');
    
    userCommentsContainer.innerHTML = '<h2>User Comments</h2>';
    
    plane.userReviews.forEach(review => {
        const commentDiv = document.createElement('div');
        commentDiv.className = 'comment';
        
        commentDiv.innerHTML = `
            <h4>${review.name}</h4>
            <p>${review.review}</p>
        `;
        
        userCommentsContainer.appendChild(commentDiv);
    });

}