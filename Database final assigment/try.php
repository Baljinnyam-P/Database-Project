<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Sitting Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #614385, #516395); /* Smooth gradient */
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .button-container {
            display: flex;
        }
        .hidden {
            display: none;
        }
        button {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }
        .hidden {
            display: none;
        }
        /* Add your form styles here */


        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 10px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; }
        input[type="file"] { border: none; }
        .radio-group { display: flex; align-items: center; gap: 10px; }
        .radio-group label { margin: 0; }
        .submit-btn { background-color: #008cba; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; width: 97%; font-size: 16px; }
        .submit-btn:hover { background-color: #007ba7; }
        @media (max-width: 768px) {
            .form-container { width: 90%; }
        }
        input, select, textarea {
        width: calc(100% - 20px); /* Adjusted width to account for padding */
        padding: 10px; /* Your padding */
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box; /* This ensures padding is included in the width */
    }
    textarea {
        resize: none; /* Disables resizing of textareas */
        /* ... other properties ... */
    }
    .form-container {
        width: 100%;
        max-width: 700px; /* or your preferred max-width */
        margin-top: 1000px;
        margin-bottom: 5px;
        padding: 10px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        overflow: hidden; /* Ensures that nothing overflows the container */
    }
    </style>
</head>
<body>
    <div class="button-container">
        <button id="btnForm1">Form 1</button>
        <button id="btnForm2">Form 2</button>
    </div>
    <div id="form1" class="hidden">
        <!-- Your Form 1 content here -->


        <br>
        <br>
        <div class="form-container">
            <h1>Pet Sitting Request Form</h1>
            <p>Please fill out this form to request pet sitting services. Fields marked with an * are required.</p>
            <form action="CHome.php" method="post" enctype="multipart/form-data" id="petForm" novalidate>
                
                <fieldset>
                    <legend><h2>Pet Information</h2></legend>
                    <div class="form-group">
                        <label for="petName">Pet's Name:</label>
                        <input type="text" id="petName" name="petName" required>
                    </div>
                    <div class="form-group">
                        <label for="petType">Type of Pet:</label>
                        <input type="text" id="petType" name="petType" placeholder="e.g., Dog, Cat, Bird" required>
                    </div>
                    <div class="form-group">
                        <label for="breed">Breed (if applicable):</label>
                        <input type="text" id="breed" name="breed">
                    </div>
                    <div class="form-group">
                        <label for="age">Age of Pet:</label>
                        <input type="number" id="age" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender of Pet:</label>
                        <select id="gender" name="gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo">Pet's Photo:</label>
                        <input type="file" id="photo" name="photo" class="photo-input" required>
                    </div>
                </fieldset>
                
                
                <!-- Health and Behavior -->
                <fieldset>
                    <legend><h2>Health and Behavior</h2></legend>
                    <div class="form-group">
                        <label>Is your pet vaccinated? *</label>
                        <div class="radio-group">
                            <input type="radio" id="vaccinatedYes" name="vaccinated" value="Yes" required>
                            <label for="vaccinatedYes">Yes</label>
                            <input type="radio" id="vaccinatedNo" name="vaccinated" value="No" required>
                            <label for="vaccinatedNo">No</label>
                        </div>
                    </div>
                    <!-- more form groups for health and behavior -->
    
                    <div class="form-group">
                        <label for="healthIssues">Any specific health issues or allergies? Please specify:</label>
                        <textarea id="healthIssues" name="healthIssues"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="temperament">Describe your pet's temperament and behavior:</label>
                        <textarea id="temperament" name="temperament" required></textarea>
                    </div>
                    <h3>Diet and Feeding Schedule:</h3>
                <div class="form-group">
                    <label for="foodType">Type of food:</label>
                    <input type="text" id="foodType" name="foodType" required>
                </div>
                <div class="form-group">
                    <label for="feedingTimes">Feeding times:</label>
                    <input type="text" id="feedingTimes" name="feedingTimes" placeholder="e.g., 8 AM, 12 PM, 6 PM" required>
                </div>
                <h3>Exercise and Play:</h3>
                <div class="form-group">
                    <label for="exerciseNeeds">Exercise needs:</label>
                    <input type="text" id="exerciseNeeds" name="exerciseNeeds" placeholder="e.g., walks, playtime" required>
                </div>
                <div class="form-group">
                    <label for="favoriteToys">Favorite toys and activities:</label>
                    <textarea id="favoriteToys" name="favoriteToys" placeholder="e.g., Frisbee, Tug Rope"></textarea>
                </div>
                <h3>Pet Sitting Details:</h3>
                <div class="form-group">
                    <label for="sittingDates">Dates for pet sitting:</label>
                    <input type="text" id="sittingDates" name="sittingDates" placeholder="e.g., Jan 1 - Jan 5" required>
                </div>
                <div class="form-group">
                    <label for="sittingTime">Preferred time for sitting:</label>
                    <input type="text" id="sittingTime" name="sittingTime" placeholder="e.g., Morning, Afternoon, Evening" required>
                </div>
                <div class="form-group">
                    <label for="specialInstructions">Any special instructions or routines?</label>
                    <textarea id="specialInstructions" name="specialInstructions"></textarea>
                </div>
                </fieldset>
                <br>
               
                
                <button type="submit" class="submit-btn">Submit Request</button>
            </form>
        </div>

    </div>
    <div id="form2" class="hidden">
        <!-- Your Form 2 content here -->


        <section class="content">
            <?php
// Include the database configuration file
require 'config.php';

// Start the session to access session variables
session_start();

// Check if the user is logged in by checking the session variable
if (isset($_SESSION['username'])) {
    // Retrieve posts from the database for the logged-in user
    $loggedInUser = mysqli_real_escape_string($conn, $_SESSION['username']);
    $query = "SELECT * FROM `petsittingrequests` WHERE username = '$loggedInUser' ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="post-card">';
            // Echo out the post content, sanitized to prevent XSS
            echo htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8');
            echo '</div>';
        }
    } else {
        echo '<p>No posts to display.</p>';
    }
} else {
    echo '<p>You must be logged in to see posts.</p>';
}

// Close the database connection
mysqli_close($conn);
?>
        </section>



    </div>

    <script>
        document.getElementById('btnForm1').addEventListener('click', function() {
            document.querySelector('.button-container').style.display = 'none';
            document.getElementById('form1').style.display = 'block';
        });

        document.getElementById('btnForm2').addEventListener('click', function() {
            document.querySelector('.button-container').style.display = 'none';
            document.getElementById('form2').style.display = 'block';
        });
    </script>
</body>
</html>