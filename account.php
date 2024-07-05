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

   // Check if form is submitted
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // Retrieve form data
       $resumeTitle = $_POST['resume_title'];
       $firstName = $_POST['firstname'];
       $middleName = $_POST['middlename'];
       $lastName = $_POST['lastname'];
       $designation = $_POST['designation'];
       $address = $_POST['address'];
       $email = $_POST['email'];
       $phoneNo = $_POST['phoneno'];
       $summary = $_POST['summary'];
       $slug = uniqid(); 
    // Insert into database
    
       // Generate slug
       $slug = uniqid(); // Generates a unique ID

       // Prepare SQL statement
       $sql = "INSERT INTO resumes (resume_title, firstname, middlename, lastname, designation, address, email, phoneno, summary, slug)
       VALUES ('$resumeTitle', '$firstName', '$middleName', '$lastName', '$designation', '$address', '$email', '$phoneNo', '$summary', '$slug')";

       // Execute SQL statement
       if ($conn->query($sql) === TRUE) {
           // Display success message using JavaScript
           echo '<script>alert("New record created successfully");</script>';
       } else {
           // Display error message using JavaScript
           echo '<script>alert("Error: ' . $sql . '<br>' . $conn->error . '");</script>';
       }

       // Close database connection
       $conn->close();
   }
?>
<?php
// Connect to your database to fetch resumes
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resumeDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch resumes from the database
$sql = "SELECT * FROM resumes";
$result = $conn->query($sql);

// Check if resumes exist
if ($result->num_rows > 0) {
    // Fetch resumes into an array
    $resumes = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // No resumes found
    $resumes = false;
}

// Close database connection
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Page</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
/* Define CSS styles for .container3 */
.container3 {
    position: absolute;
    top: 70%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 90%; /* Adjusted width for responsiveness */
    max-width: 1200px; /* Set a maximum width */
    margin: 0 auto; /* Centers the content */
    backdrop-filter: blur(25px);
    border: 2px solid var(--primary-color);
    border-radius: 5px;
    padding: 3.5em 3.5em 4em 3.6em; /* Adjust padding */
    color: var(--second-color);
    box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.2);
    font-family: 'Poppins', sans-serif;
    line-height: 2.5;
    display: flex; /* Use flexbox to control layout */
    flex-direction: column; /* Arrange items vertically */
    overflow-y: auto; /* Enable vertical scrolling */
    height: 100vh; /* Set a fixed height for the container */
}


/* Media query for smaller screens */
@media screen and (max-width: 768px) {
  .container3 {
    padding: 2em; /* Adjusted padding for smaller screens */
  }
}

/* Style for the "Add New" button */
.bi-file-earmark-plus + a {
  display: inline-block; /* Make it sit nicely beside the icon */
  padding: 8px 16px;     /* Button padding */
  background-color: #0d6efd;  /* Bootstrap primary blue */
  color: white;
  border: none;          /* Remove default border */
  border-radius: 4px;    /* Slightly rounded corners */
  text-decoration: none; /* No underline */
}

.bi-file-earmark-plus + a:hover {
  background-color: #0b5ed7; /* Slightly darker on hover */
}

/* Style for the resume containers */
.border { 
  border: 1px solid #ddd; /* Adjust border color and thickness */
  padding: 15px;      /* Add padding within the container */
  margin-bottom: 15px; /* Add spacing between resume items */
}

/* Style for resume titles */
h5 {
  font-weight: bold; 
  margin-bottom: 5px; 
}

/* Style for the links within each resume container */
.d-flex.gap-2 a {
  color: #007bff; /* Default Bootstrap link color */
  text-decoration: none;
}
.d-flex.gap-2 a:hover {
  text-decoration: underline;
}

/* Style for the back button */
.back-button-acc {
  margin-top: -40px; 
  margin-left: 930px;
}

.back-button-acc button {
  padding: 10px 20px; /* Adjust padding as needed */
  background-color: #007bff; /* Bootstrap primary blue */
  color: white;
  font-size: 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.back-button-acc button:hover {
  background-color: #0056b3; /* Darker blue on hover */
}

/* Media query for smaller screens */
@media screen and (max-width: 768px) {
    .back-button-acc {
        margin-top: -35px; /* Adjust top margin for smaller screens */
        margin-left: 300px; /* Align to the left */
        margin-right: 30px; /* Add some space from the right */
        text-align: left; /* Align the button to the left */
    }

    .back-button-acc button {
        padding: 6px 12px; /* Adjust padding for smaller screens */
        font-size: 16px; /* Adjust font size for smaller screens */
    }
}


</style>
</head>
<body>
<nav class="navbar bg-white">
    <div class="container">
        <div class="navbar-content">
            <div class="brand-and-toggler">
                <a href="index.html" class="navbar-brand">
                    <img src="assets/images/curriculum-vitae.png" alt="" class="navbar-brand-icon">
                    <span class="navbar-brand-text">Quick <span>resume.</span></span>
                </a>

                <!-- Keep the account button unchanged -->
                <div class="account-button">
                    <a href="profile.html" class="navbar-link font-poppins">
                        <i class="bi bi-person-circle"></i> Account
                    </a>
                </div>

                <!-- Keep the logout button unchanged -->
                <div class="back-button-new">
                    <button onclick="logout()" class="font-poppins"><i class="bi bi-box-arrow-left"></i> Logout</button>
                </div>
            </div
            </div>
    </div>
</nav>
<div class="container3">
    <div class="bg-white rounded shadow p-2 mt-4" style="min-height:80vh">
        <div class="d-flex justify-content-between border-bottom align-items-center">
            <h3 class="m-0">Resumes</h3> 
            
            <div class="back-button-acc">
                  <button onclick="goBack()">Back</button>
              </div>

            <!-- Add New button positioned to the right -->
            <div class="add-new-button">
                <a href="first resume.html" class="text-decoration-none"><i class="bi bi-file-earmark-plus"></i> Add New</a>
            </div>
        </div>
        <?php
if ($resumes) {
    echo '<div class="d-flex flex-wrap">';
    foreach ($resumes as $resume) {
        echo '<div class="col-12 col-md-6 p-2">
    <div class="p-2 border rounded">
        <h3>' . $resume['resume_title'] . '</h3>
        <p style="font-size: 12px;"><i class="bi bi-clock-history"></i> Last updated on 
       
        </p>
    </div>

    <div class="d-flex gap-2 mt-1">
        <a href="resume.php?slug=' . $resume['slug'] . '" class="text-decoration-none small"><i class="bi bi-file-text"></i> Open</a>
        <a href="resume.php?slug=' . $resume['slug'] . '" class="text-decoration-none small"><i class="bi bi-pencil-square"></i> Edit</a>
        <a href="delete_resume.php?slug=' . $resume['slug'] . '" class="text-decoration-none small"><i class="bi bi-trash2"></i> Delete</a>
    </div>
</div>';

    }
    echo '</div>';
} else {
    echo '<div class="text-center py-3 border rounded mt-3" style="background-color: rgba(236, 236, 236, 0.56);">
            <i class="bi bi-file-text"></i> No Resumes Available
        </div>';
}

?>

    </div>
</div>
<script>
    function logout() {
        window.location.href = "login.html";
        disableBackButton();
    }
    function goBack() {
        window.location.href = "first resume.html";
    }

    // Function to disable the back button after logout
    function disableBackButton() {
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function () {
            window.history.go(1);
        };
    }
</script>
</body>
</html>
