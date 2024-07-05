<?php
// Check if slug parameter is provided in the URL
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    // Fetch resume data based on the slug from the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "resumeDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to fetch resume data
    $sql = "SELECT * FROM resumes WHERE slug = '$slug'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Resume data found, fetch it
        $resume = $result->fetch_assoc();
    } else {
        // No resume found with the provided slug
        echo "No resume found with the provided slug.";
        exit;
    }

    // Close database connection
    $conn->close();
} else {
    // If slug parameter is not provided, redirect to a page where it is required
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resume</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="container">
        <h1>Edit Resume</h1>
        <form action="update_resume.php" method="post">
            <input type="hidden" name="slug" value="<?php echo $resume['slug']; ?>">
            <label for="resume_title">Resume Title:</label>
            <input type="text" name="resume_title" id="resume_title" value="<?php echo $resume['resume_title']; ?>">
            <!-- Add other form fields for editing resume details -->
            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>
