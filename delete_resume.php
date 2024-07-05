<?php
// Check if slug parameter is provided in the URL
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "resumeDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to delete the resume
    $sql = "DELETE FROM resumes WHERE slug = '$slug'";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        
        header("Location: account.php");
        exit;
    } else {
        // Error occurred while deleting the resume
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    // If slug parameter is not provided, redirect to a page where it is required
    header("Location: index.html");
    exit;
}
?>
