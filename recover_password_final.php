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
            width: 500px;
            backdrop-filter: blur(25px);
            border: 2px solid var(--primary-color);
            border-radius: 5px;
            padding: 3.5em 2.5em 4em 3.6em;
            color: var(--second-color);
            box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.2);
            font-family: 'Poppins', sans-serif;
            line-height: 2.5; /* Adjust line height to add space between lines */
        }

        .return-btn {
        display: inline-block; /* Change display to inline-block */
        background-color: rgb(69, 143, 233);
        color: rgb(255, 255, 255);
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 20px; /* Add margin-top to space out the button */
    }

        .return-btn:hover {
            background-color:rgb(26, 28, 102);
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
            // Retrieve email and last four digits from the form
            $email = $_POST['email'];
            $last_digits = $_POST['last_digits'];

            // Extract last four digits from the phone number
            $last_four_phone = substr($_POST['last_digits'], -4);

            // Query to verify the last four digits of the phone number and retrieve the password
            $sql = "SELECT pass FROM users WHERE email = ? AND RIGHT(phone, 4) = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $email, $last_four_phone);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Phone number verified, retrieve the password
                $row = $result->fetch_assoc();
                $password = $row['pass'];

                echo " <b> Your Password is:</b> " . $password;
            } else {
                // Last four digits of phone number do not match
                echo "Verification failed. Please try again.";
            }


            $stmt->close();
        }
        

        $conn->close();
        ?>
        
        <br><button onclick="returnToLogin()" class="return-btn">Return to Login</button>
        

    <script>
        function goBack() {
            window.history.back();
        }

        function returnToLogin() {
            window.location.href = "login.html";
        }
    </script>
</body>
</html>
