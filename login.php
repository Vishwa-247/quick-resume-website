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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email']; 
    $user_password = $_POST['password'];

    // Check if email and password are not empty
    if (empty($email) || empty($user_password)) {
        // Redirect back to the login page with an error message
        header("Location: login.html?error=emptyfields");
        exit();
    } else {
        // Prepare SQL statement
        $sql = "SELECT email, pass FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a user with the provided email exists
        if ($result->num_rows == 1) {
            // Fetch the user's data
            $row = $result->fetch_assoc();
            $stored_email = $row['email'];
            $stored_password = $row['pass'];

            // Verify the password
            if ($user_password === $stored_password) {
                // Start a session and store the user's email
                session_start();
                $_SESSION['email'] = $stored_email;

                // Redirect to a protected page
                header("Location: account.php"); 
                exit();
            } else {
                // Redirect back to the login page with an error message
                header("Location: login.html?error=invalidlogin");
                exit();
            }
        } else {
            // Redirect back to the login page with an error message
            header("Location: login.html?error=nouser");
            exit();
        }
    }
} else {
    // If the form was not submitted, redirect back to the login page
    header("Location: login.html");
    exit();
}

// // Close the database connection
// $conn->close();
?>
