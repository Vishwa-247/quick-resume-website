<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Resume Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- custom css -->
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body>
        <nav class = "navbar bg-white">
            <div class="container">
                <div class = "navbar-content">
                    <div class = "brand-and-toggler">
                        <a href="index.html" class="navbar-brand" onclick="logout(); disableBackButton();">
                            <img src = "assets/images/curriculum-vitae.png" alt = "" class = "navbar-brand-icon">
                            <span class = "navbar-brand-text">Quick <span>resume.</span>
                        </a>
                        <!-- Inside the navigation bar -->
<!-- <a href="account.html" class="navbar-link">Account Settings</a> -->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-xxxxxx" crossorigin="anonymous" />

<div class="back-button">
    <button onclick="goBack()">Back</button>
</div>



                        
                    </div>
                </div>
            </div>
        </nav>
        
        
        
        <section id="about-sc" class="">
        <div class="container">
            <div class="about-cnt">
            <form action="" class="cv-form" id="cv-form" onsubmit="return validateForm()">

                    <div class="cv-form-blk">
                        <div class="cv-form-row-title">
                            <h3>about section</h3>
                        </div>
                        <div class="cv-form-row cv-form-row-about">
                            <?php
                            // Include your database connection file here
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "resumeDB";
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            // Check if the slug is provided in the URL
                            if (isset($_GET['slug'])) {
                               
                                $slug = mysqli_real_escape_string($conn, $_GET['slug']);
                                // Query to fetch data based on the slug
                                $sql = "SELECT * FROM resumes WHERE slug = '$slug'";
                                $result = mysqli_query($conn, $sql);
                                // Check if the query was successful
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    ?>
                                    <div class="form-elem">
                                        <label for="" class="form-label">Resume Title</label>
                                        <input name="resume_title" type="text" class="form-control firstname" id="" value="<?php echo $row['resume_title']; ?>">
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="cols-3">
                                        <div class="form-elem">
                                            <label for="" class="form-label">First Name</label>
                                            <input name="firstname" type="text" class="form-control firstname" id="" value="<?php echo $row['firstname']; ?>">
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">Middle Name <span class="opt-text">(optional)</span></label>
                                            <input name="middlename" type="text" class="form-control middlename" id="" value="<?php echo $row['middlename']; ?>">
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">Last Name</label>
                                            <input name="lastname" type="text" class="form-control lastname" id="" value="<?php echo $row['lastname']; ?>">
                                            <span class="form-text"></span>
                                        </div>
                                    </div>
                                    <div class="cols-3">

<div class="form-elem">

    <label for="image" class="form-label">Your Image</label>

    <input name="image" type="file" class="form-control image" id="image" accept="image/*" onchange="previewImage()">

    <!-- Delete button to remove selected image -->

    <button type="button" onclick="deleteImage()">Delete</button>

</div>

<div class="form-elem">

    <label for="" class="form-label">Designation</label>

    <input name="designation" type="text" class="form-control designation" id="" value="<?php echo $row['designation']; ?>">

    <span class="form-text"></span>

</div>

<div class="form-elem">

    <label for="" class="form-label">Address</label>

    <input name="address" type="text" class="form-control address" id="" value="<?php echo $row['address']; ?>">

    <span class="form-text"></span>

</div>

</div>
                                    <div class="cols-3">
                                    <div class="form-elem">
                                    <label for="" class="form-label">Email</label>
                                    <input name="email" type="text" class="form-control email" id="" value="<?php echo $row['email']; ?>">
                                    <span class="form-text"></span>
                                </div>
                                <div class="form-elem">
                                    <label for="" class="form-label">Phone No:</label>
                                    <input name="phoneno" type="text" class="form-control phoneno" id="" value="<?php echo $row['phoneno']; ?>">
                                    <span class="form-text"></span>
                                </div>
                                <div class="form-elem">
                                    <label for="" class="form-label">Summary</label>
                                    <input name="summary" type="text" class="form-control summary" id="" value="<?php echo $row['summary']; ?>">
                                    <span class="form-text"></span>
                                </div>
                                    </div>
                                    <?php
                                } else {
                                    echo "No data found for this slug.";
                                }
                            } else {
                                echo "Slug parameter is missing.";
                            }
                            ?>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>achievements</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-a">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-achievement">
                                            <div class = "cols-2">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name = "achieve_title" type = "text" class = "form-control achieve_title" id = "" onkeyup="generateCV()" placeholder="e.g. johndoe@gmail.com">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "achieve_description" type = "text" class = "form-control achieve_description" id = "" onkeyup="generateCV()" placeholder="e.g. johndoe@gmail.com">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>experience</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-b">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Title</label>
                                                    <input name = "exp_title" type = "text" class = "form-control exp_title" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Company / Organization</label>
                                                    <input name = "exp_organization" type = "text" class = "form-control exp_organization" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Location</label>
                                                    <input name = "exp_location" type = "text" class = "form-control exp_location" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Start Date</label>
                                                    <input name = "exp_start_date" type = "date" class = "form-control exp_start_date" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">End Date</label>
                                                    <input name = "exp_end_date" type = "date" class = "form-control exp_end_date" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "exp_description" type = "text" class = "form-control exp_description" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>education</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-c">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">School</label>
                                                    <input name = "edu_school" type = "text" class = "form-control edu_school" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Degree</label>
                                                    <input name = "edu_degree" type = "text" class = "form-control edu_degree" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">City</label>
                                                    <input name = "edu_city" type = "text" class = "form-control edu_city" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Start Date</label>
                                                    <input name = "edu_start_date" type = "date" class = "form-control edu_start_date" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">End Date</label>
                                                    <input name = "edu_graduation_date" type = "date" class = "form-control edu_graduation_date" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "edu_description" type = "text" class = "form-control edu_description" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>

                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>projects</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-d">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-experience">
                                            <div class = "cols-3">
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Project Name</label>
                                                    <input name = "proj_title" type = "text" class = "form-control proj_title" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Project link</label>
                                                    <input name = "proj_link" type = "text" class = "form-control proj_link" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                                <div class = "form-elem">
                                                    <label for = "" class = "form-label">Description</label>
                                                    <input name = "proj_description" type = "text" class = "form-control proj_description" id = "" onkeyup="generateCV()">
                                                    <span class="form-text"></span>
                                                </div>
                                            </div>
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>

                        <div class="cv-form-blk">
                            <div class = "cv-form-row-title">
                                <h3>skills</h3>
                            </div>

                            <div class = "row-separator repeater">
                                <div class = "repeater" data-repeater-list = "group-e">
                                    <div data-repeater-item>
                                        <div class = "cv-form-row cv-form-row-skills">
                                            <div class = "form-elem">
                                                <label for = "" class = "form-label">Skill</label>
                                                <input name = "skill" type = "text" class = "form-control skill" id = "" onkeyup="generateCV()">
                                                <span class="form-text"></span>
                                            </div>
                                            
                                            <button data-repeater-delete type = "button" class = "repeater-remove-btn">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type = "button" data-repeater-create value = "Add" class = "repeater-add-btn">+</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section id = "preview-sc" class = "print_area">
            <div class = "container">
                <div class = "preview-cnt">
                    <div class = "preview-cnt-l bg-green text-white">
                        <div class = "preview-blk">
                            <div class = "preview-image">
                                <img src = "" alt = "" id = "image_dsp"> 
                            </div>
                            <div class = "preview-item preview-item-name">
                                <span class = "preview-item-val fw-6" id = "fullname_dsp"></span>
                            </div>
                            <div class = "preview-item">
                                <span class = "preview-item-val text-uppercase fw-6 ls-1" id = "designation_dsp"></span>
                            </div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>about</h3>
                            </div>
                            <div class = "preview-blk-list">
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "phoneno_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "email_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "address_dsp"></span>
                                </div>
                                <div class = "preview-item">
                                    <span class = "preview-item-val" id = "summary_dsp"></span>
                                </div>
                            </div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>skills</h3>
                            </div>
                            <div class = "skills-items preview-blk-list" id = "skills_dsp">
                                <!-- skills list here -->
                            </div>
                        </div>
                    </div>

                    <div class = "preview-cnt-r bg-white">
                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>Achievements</h3>
                            </div>
                            <div class = "achievements-items preview-blk-list" id = "achievements_dsp"></div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>educations</h3>
                            </div>
                            <div class = "educations-items preview-blk-list" id = "educations_dsp"></div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>experiences</h3>
                            </div>
                            <div class = "experiences-items preview-blk-list" id = "experiences_dsp"></div>
                        </div>

                        <div class = "preview-blk">
                            <div class = "preview-blk-title">
                                <h3>projects</h3>
                            </div>
                            <div class = "projects-items preview-blk-list" id = "projects_dsp"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="print-btn-sc">
            <div class="container">
                <button type="button" class="print-btn btn btn-primary" onclick="printCV()">Print CV</button>
                
            </div>
        </section>
        
        <script>
            
            function deleteImage() {
    // Get the input element by its ID
    var input = document.getElementById('image');
    
    input.value = '';
}

            function goBack() {
                  window.history.back();
              }

              

          </script>
        <script>
    // Function to validate name input
    function validateName() {
        var nameInput = document.getElementById('fullname');
        var name = nameInput.value.trim();
        var nameRegex = /^[a-zA-Z\s]*$/; // Only allows letters and spaces

        if (!nameRegex.test(name)) {
            alert('Please enter a valid name.');
            nameInput.focus();
            return false;
        }

        return true;
    }

    // Function to validate mobile number input
    function validateMobileNumber() {
        var mobileInput = document.getElementById('phoneno');
        var mobileNumber = mobileInput.value.trim();
        var mobileRegex = /^\d{10}$/; // Allows exactly 10 digits

        if (!mobileRegex.test(mobileNumber)) {
            alert('Please enter a valid mobile number (10 digits only).');
            mobileInput.focus();
            return false;
        }

        return true;
    }

    // Function to validate email input
    function validateEmail() {
        var emailInput = document.getElementById('email');
        var email = emailInput.value.trim();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Allows valid email format

        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            emailInput.focus();
            return false;
        }

        return true;
    }

    // Function to validate all form fields before submission
    function validateForm() {
        // Call individual validation functions and return false if any validation fails
        if (!validateName() || !validateMobileNumber() || !validateEmail()) {
            return false;
        }

        // If all validations pass, return true to allow form submission
        return true;
    }
</script>


        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- jquery repeater cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js" integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- custom js -->
        <script src = "assets/js/script.js"></script>
        <!-- app js -->
        <script src="assets/js/app.js"></script>
    </body>
</html>