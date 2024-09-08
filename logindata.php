<?php
include('db.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

      $query = "SELECT name, password FROM signup WHERE email = '$email'";
      $result = $conn->query($query);
  
      if ($result->num_rows === 1) {
          $row = $result->fetch_assoc();
          $hashed_password = $row['password'];
          $name = $row['name'];
  
          if (password_verify($password, $hashed_password)) {
            $_SESSION['loggedin']=true;
            $_SESSION['nme']=$name;
            setcookie('user', $name, time() + (24 * 60 * 60), "/"); 

              echo json_encode(['status' => 'success', 'message' => 'Login successful!']);
          } else {
              echo json_encode(['status' => 'error', 'message' => 'Invalid email or password!']);
          }
      } else {

          echo json_encode(['status' => 'error', 'message' => 'Invalid email or password!']);
      }
}
$conn->close();
exit();
?>