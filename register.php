<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resumeDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data (add validation and sanitization here for security)
$firstname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$user_password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Password Validation
if ($user_password !== $confirm_password) {
    echo "Passwords do not match.";
    exit();
}

// Prepare SQL statement
$sql = "INSERT INTO users (firstname, email, phone, pass)  
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $firstname, $email, $phone, $user_password);

// Execute statement
if ($stmt->execute() === TRUE) {
    echo "New record created successfully. Redirecting...";
    header("Location: login.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
