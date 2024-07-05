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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email from the form
    $email = $_POST['email'];

    // Query to check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists, redirect to the correct page (verify_mobile.php in this case)
        header("Location: verify_mobile.php?email=" . $email);
        exit();
    } else {
        // Email doesn't exist in the database, show popup and redirect to the same page
        echo "<script>alert('Invalid email entered. Please try again.');
              window.location.href = 'forget_password.html';</script>";
    }
    
    $stmt->close();
}

$conn->close();
?>
