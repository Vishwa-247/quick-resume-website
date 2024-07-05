<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Recovery</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <nav class="navbar bg-white">
    <div class="container">
        <div class="navbar-content">
            <div class="brand-and-toggler">
                <a href="index.html" class="navbar-brand">
                    <img src="assets/images/curriculum-vitae.png" alt="" class="navbar-brand-icon">
                    <span class="navbar-brand-text">Quick <span>resume.</span></span>
                </a>
                <div class="back-button">
                  <button onclick="goBack()">Back</button>
              </div>
            </div>
        </div>
    </div>
  </nav>
    <style>
        .container4 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 550px;
            backdrop-filter: blur(25px);
            border: 2px solid var(--primary-color);
            border-radius: 5px;
            padding: 3.5em 2.5em 4em 3.6em;
            color: var(--second-color);
            box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.2);
            font-family: 'Poppins', sans-serif;
            line-height: 2.5; /* Adjust line height to add space between lines */
        }

        
        @media screen and (max-width: 768px) {
    .back-button {
        margin-left: 200px; /* Adjust the margin-left for responsiveness */
    }
}
    </style>
</head>
<body>
    <div class="container4">
    
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resumeDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    // Construct SQL query
    $sql = "SELECT pass FROM users WHERE firstname=? AND email=?";

    // Prepare and execute the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $fullName, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        // User exists, check old password
        $row = $result->fetch_assoc();
        $oldHashedPassword = $row['pass'];

        // Verify old password
        if ($oldPassword == $oldHashedPassword) {
            // Old password is correct, update the password
            $updateSql = "UPDATE users SET pass=? WHERE firstname=? AND email=?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("sss", $newPassword, $fullName, $email);

            if ($updateStmt->execute()) {
                echo "Password updated successfully";
            } else {
                echo "Error updating password: " . $conn->error;
            }
        } else {
            // Old password is incorrect
            echo "Incorrect Old Password";
        }
    } else {
        // User not found
        echo "No user found with the provided details";
    }

    $stmt->close();
} else {
    echo "Invalid request method";
}

$conn->close();
?>

        
       
        

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>



