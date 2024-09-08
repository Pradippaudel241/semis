
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) 
$username = $_POST['name'];
setcookie('name', $username, time() + 3600, '/');





      include('db.php');
$tableSql = "CREATE TABLE IF NOT EXISTS signup (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    dob DATE,
    gender ENUM('male', 'female', 'other'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) !== TRUE) {
    echo json_encode(['status' => 'error', 'message' => 'Error creating table: ' . $conn->error]);
    exit();
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $name= $conn->real_escape_string($_POST['name']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm-password']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);

    // Validate form data
    if ($password !== $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => 'Passwords do not match!']);
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert data into the database
        $insertSql = "INSERT INTO signup (name, email, username, password, dob, gender)
                      VALUES ('$name','$email', '$username', '$hashed_password', '$dob', '$gender')";

        if ($conn->query($insertSql) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'Sign up successful!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
        }
    }
}
$conn->close();
exit();
?>
