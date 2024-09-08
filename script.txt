function toggleReturnDate() {
    const returnDateGroup = document.getElementById('return-date-group');
    const tripTypeLabel = document.getElementById('trip-type-label');

    if (returnDateGroup && tripTypeLabel) {
        if (returnDateGroup.style.display === 'none' || returnDateGroup.style.display === '') {
            returnDateGroup.style.display = 'flex';
            tripTypeLabel.textContent = 'Round-Trip';
        } else {
            returnDateGroup.style.display = 'none';
            tripTypeLabel.textContent = 'One-Way';
        }
    }
}

// Modal Functionality
const modal = document.getElementById('authModal');
const loginBtns = document.querySelectorAll('.log-in-btn');
const signUpBtns = document.querySelectorAll('.sign-up-btn');
const closeBtn = document.querySelector('.close-btn');
const showSignup = document.getElementById('show-signup');
const showLogin = document.getElementById('show-login');
const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');
const messageBox = document.getElementById('message-box');
const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');
const departure = document.getElementById('departure');
const arrival = document.getElementById('arrival');
const avatars = document.querySelectorAll('.avatar-div');
const buttons = document.querySelectorAll('.buttons');
const logoutBtns = document.querySelectorAll('.logout');
const avatarsDiv = document.querySelectorAll('.avatar');
const loadingAnimation = document.getElementById('loading-animation');

// Making the city selected in departure disabled in arrival
if (departure && arrival) {
    departure.addEventListener('change', () => {
        const selectedDeparture = departure.value;
        const options = arrival.querySelectorAll('option');
        options.forEach(option => {
            if (option.value === selectedDeparture)
                option.disabled = true;
            else
                option.disabled = false;
        });
    });
}

// Responsive Menu Toggle
if (menuToggle && navLinks) {
    menuToggle.addEventListener('click', () => {
        menuToggle.innerHTML = !navLinks.classList.contains('active') ? '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        if (navLinks.classList.contains('active')) {
            setTimeout(() => {
                navLinks.classList.remove('active');
                navLinks.classList.remove('fade-out');
            }, 200);
            navLinks.classList.add('fade-out');
            navLinks.classList.remove('animate');
        } else {
            navLinks.classList.add('animate');
            navLinks.classList.add('active');
            navLinks.classList.remove('fade-out');
        }
    });

    navLinks.addEventListener('click', () => {
        setTimeout(() => {
            navLinks.classList.remove('active');
            navLinks.classList.remove('fade-out');
        }, 200);
        navLinks.classList.remove('animate');
        navLinks.classList.add('fade-out');
        menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
    });
}

// For Responsive navbar
document.addEventListener('DOMContentLoaded', () => {
    getCookie();
    if (loadingAnimation) loadingAnimation.style.display = 'none';

    if (window.innerWidth > 768 && navLinks) {
        navLinks.classList.remove('active');
    }
});

function getCookie() {
    let value = `; ${document.cookie}`;
    let parts = value.split('; ');
    let user = null;
    parts.forEach((part) => {
        if (part.split('=')[0] === 'user') {
            if (part.split('=')[1] !== null)
                user = part.split('=')[1];
        }
    });
    if (user != null) {
        let name = user.split('%20');
        let letter = user[0].charAt(0);
        if (name.length > 1)
            letter += name[name.length - 1].charAt(0);
        avatarsDiv.forEach(avatar => {
            avatar.textContent = letter.toUpperCase();
        });
        buttons.forEach(button => {
            button.style.display = 'none';
        });
        avatars.forEach(avatar => {
            avatar.style.display = 'flex';
        });
    } else {
        buttons.forEach(button => {
            button.style.display = 'block';
        });
        avatars.forEach(avatar => {
            avatar.style.display = 'none';
        });
    }
}

if (logoutBtns.length) {
    logoutBtns.forEach(avatar => {
        avatar.addEventListener('click', () => {
            const pastDate = new Date(0);
            document.cookie = `user=; expires=${pastDate.toUTCString()}; path=/;`;
            window.location.reload();
        });
    });
}

function closeModal() {
    if (messageBox) messageBox.style.display = 'none';

    if (modal) {
        modal.classList.add('fade-out');
        setTimeout(() => {
            modal.style.display = 'none';
            modal.classList.remove('fade-out');
        }, 500);
    }
}

// Show Login Modal
if (loginBtns.length && loginForm && signupForm && showSignup && showLogin) {
    loginBtns.forEach(button => {
        button.addEventListener('click', () => {
            modal.style.display = 'block';
            loginForm.style.display = 'block';
            signupForm.style.display = 'none';
            showSignup.parentElement.style.display = 'block';
            showLogin.parentElement.style.display = 'none';
        });
    });
}

// Show Sign Up Modal
if (signUpBtns.length && signupForm && loginForm && showSignup && showLogin) {
    signUpBtns.forEach(button => {
        button.addEventListener('click', () => {
            modal.style.display = 'block';
            signupForm.style.display = 'block';
            loginForm.style.display = 'none';
            showSignup.parentElement.style.display = 'none';
            showLogin.parentElement.style.display = 'block';
        });
    });
}

// Close Modal
if (closeBtn) closeBtn.addEventListener('click', closeModal);

// Show Sign Up Form
if (showSignup && loginForm && signupForm) {
    showSignup.addEventListener('click', (e) => {
        e.preventDefault();
        loginForm.style.display = 'none';
        signupForm.style.display = 'block';
        showSignup.parentElement.style.display = 'none';
        showLogin.parentElement.style.display = 'block';
    });
}

// Show Login Form
if (showLogin && loginForm && signupForm) {
    showLogin.addEventListener('click', (e) => {
        e.preventDefault();
        signupForm.style.display = 'none';
        loginForm.style.display = 'block';
        showSignup.parentElement.style.display = 'block';
        showLogin.parentElement.style.display = 'none';
        if (messageBox) messageBox.style.display = 'none';
    });
}

// Close Modal when clicking outside of it
if (modal) {
    window.addEventListener('click', (e) => {
        if (e.target == modal) {
            closeModal();
        }
    });
}

// Plane Animation on Search Button Hover
const searchBtn = document.querySelector('.search-btn');
const plane = document.querySelector('.plane');

if (searchBtn && plane) {
    searchBtn.addEventListener('mouseenter', () => {
        plane.style.transform = 'translateX(200px)'; // Adjust this value as needed
    });

    searchBtn.addEventListener('mouseleave', () => {
        plane.style.transform = 'translateX(0)';
    });
}

// Form submission handler for Sign Up
const signupFormElem = document.getElementById('signupForm');
if (signupFormElem) {
    signupFormElem.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        fetch('signupdata.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (messageBox) messageBox.style.display = 'block';

            if (data.status === 'success') {
                if (messageBox) {
                    messageBox.style.backgroundColor = '#d4edda'; // success background
                    messageBox.style.color = '#155724'; // success text
                }
            } else {
                if (messageBox) {
                    messageBox.style.backgroundColor = '#f8d7da'; // error background
                    messageBox.style.color = '#721c24'; // error text
                }
            }

            if (messageBox) messageBox.textContent = data.message;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
}

// Form submission handler for Login
const loginFormElem = document.getElementById('loginForm');
if (loginFormElem) {
    loginFormElem.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        fetch('logindata.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (messageBox) messageBox.style.display = 'block';

            if (data.status === 'success') {
                if (messageBox) {
                    messageBox.style.backgroundColor = '#d4edda'; // success background
                    messageBox.style.color = '#155724'; // success text
                }
                setTimeout(() => {
                    getCookie();
                    closeModal();
                }, 1000);
            } else {
                if (messageBox) {
                    messageBox.style.backgroundColor = '#f8d7da'; // error background
                    messageBox.style.color = '#721c24'; // error text
                }
            }
            if (messageBox) messageBox.textContent = data.message;
        })
        .catch(error => {
            console.error('Error:', error.message);
        });
    });
}

function showLoadingAnimation() {
    // Get the selected values of departure and arrival cities
    const departureCity = departure ? departure.value : '';
    const arrivalCity = arrival ? arrival.value : '';
    const ddate = document.getElementById('departure-date') ? document.getElementById('departure-date').value : '';
    const rdate = document.getElementById('return-date') ? document.getElementById('return-date').value : ''; // For round-trip
    const travellers = document.getElementById('travellers') ? document.getElementById('travellers').value : '';
    const isRoundTrip = document.getElementById('trip-type-toggle') ? document.getElementById('trip-type-toggle').checked : false; // Check if it's a round-trip

    // Check if the form is filled out correctly
    if (!departureCity || !arrivalCity) {
       return alert("Please select both departure and arrival cities.");
    }

    if (!ddate) {
       return alert("Please select a departure date.");
    }

    if (isRoundTrip && !rdate) {
       return alert("Please select a return date for a round trip.");
    }

    if (!travellers || travellers < 1) {
        return alert("Please specify the number of passengers.");
        
    }

    const flightSearchForm = document.querySelector('.flight-search-form');
    const pageHeading = document.getElementById('page-heading');
    const pageSubtext = document.getElementById('page-subtext');

    if (flightSearchForm) flightSearchForm.style.display = 'none';
    if (pageHeading) pageHeading.style.display = 'none';
    if (pageSubtext) pageSubtext.style.display = 'none';

    if (loadingAnimation) loadingAnimation.style.display = 'block';

    setTimeout(() => {
        window.location.href = `flights.php?source=${departureCity}&destination=${arrivalCity}`;
    }, 5000); // Keep the delay for animation and then redirect
}
