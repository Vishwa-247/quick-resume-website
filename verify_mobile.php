<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Mobile</title>
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
        .container5 {
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
            line-height: 2.0; /* Adjust line height to add space between lines */
        }

        .container5 input[type="text"] {
            width: 80%;
            max-width: 300px;
        }

        .container5 button[type="submit"] {
            
        
    background-color: var(--clr-blue); /* Change this to your desired color */
    color: var(--clr-white);
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
    transition: background-color 0.3s ease;
    width: 50%;
    max-width: 300px;
    margin-top: 1em;
}

.container5 button[type="submit"]:hover {
    background-color: var(--clr-blue-dark); /* Change this to your desired hover color */
}
@media screen and (max-width: 768px) {
    .back-button {
        margin-left: 200px; 
    }
}

    </style>
     <script>
   
   function goBack() {
         window.history.back();
     }
 </script>
</head>
<body>
    <div class="container5">
        <h2>Verify Mobile</h2>
        <form action="recover_password_final.php" method="POST">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">
            <label for="last_digits">Enter the last <b>Four digits</b> of your Registered mobile:</label><br>
            <input type="text" id="last_digits" name="last_digits" required><br><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
