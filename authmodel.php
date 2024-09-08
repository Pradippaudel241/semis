<div id="authModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>

        <!-- Message Box -->
        <div id="message-box" style="display: none; padding: 10px; border-radius: 5px; margin-bottom: 20px;"></div>

        <!-- Login Form -->
        <div id="login-form">
            <h1 class="auth-header"">Login</h1>
            <form id="loginForm">
                <label for="email">Email</label>
                <input type="email" id="login-email" name="email" required>
                <label for="password">Password</label>
                <input type="password" id="login-password" name="password" required>
                <button type="submit">Login</button>
            </form>
            <br>
            <p>New to SkyGuard? <a href="#" id="show-signup">Sign Up</a></p>
        </div>

        <!-- Sign Up Form -->
        <div id="signup-form" style="display: none;">
            <h1 class="auth-header">Sign Up</h1>
            <form id="signupForm">
            <label for="signup-name">Full Name</label>
            <input type="text" id="signup-name" name="name" required>
                <label for="signup-email">Email</label>
                <input type="email" id="signup-email" name="email" required>
                <label for="signup-username">Username</label>
                <input type="text" id="signup-username" name="username" required>
                <label for="signup-password">Password</label>
                <input type="password" id="signup-password" name="password" required>
                <label for="signup-confirm-password">Confirm Password</label>
                <input type="password" id="signup-confirm-password" name="confirm-password" required>
                <label for="signup-dob">Date of Birth</label>
                <input type="date" id="signup-dob" name="dob">
                <label for="signup-gender">Gender</label>
                <select id="signup-gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <br><br><button type="submit">Sign Up</button>
            </form>
            <br><p>Already have an account? <a href="#" id="show-login">Log In</a></p>
        </div>
    </div>
</div>