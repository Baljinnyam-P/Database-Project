<?php
// db.php should contain the database connection
require 'config.php'; 

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
// Function to handle file upload and return the sanitized photo filename
function handleFileUpload($file) {
    $target_dir = "uploads/";
    $sanitized_filename = preg_replace('/[^a-zA-Z0-9-_\.]/','', basename($file['name']));
    $sanitized_filename = substr($sanitized_filename, 0, 100); // Shorten filename if necessary
    
    // Check if the uploads directory exists, if not create it
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $target_file = $target_dir . $sanitized_filename;
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        return $sanitized_filename; // Return just the filename, not the path
    } else {
        return ''; // Return empty string if the upload failed
    }
}
// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract form data
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $breed = $_POST['breed'] ?? ''; // Using the null coalescing operator to handle optional fields
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $vaccinated = $_POST['vaccinated'] === 'Yes' ? 1 : 0; // Assuming 'Yes' or 'No' input
    $healthIssues = $_POST['healthIssues'] ?? '';
    $temperament = $_POST['temperament'];
    $foodType = $_POST['foodType'];
    $feedingTimes = $_POST['feedingTimes'];
    $exerciseNeeds = $_POST['exerciseNeeds'];
    $favoriteToys = $_POST['favoriteToys'] ?? '';
    $sittingDates = $_POST['sittingDates'];
    $sittingTime = $_POST['sittingTime'];
    $specialInstructions = $_POST['specialInstructions'] ?? '';
    // Call the function to handle file upload and get the sanitized filename
    $photoURL = isset($_FILES['photo']) ? handleFileUpload($_FILES['photo']) : '';

    // Check if the photo was uploaded successfully and a filename was returned
    if (!$photoURL) {
        die("Error uploading file.");
    }



$ipAddress = get_client_ip();

// Database connection code should go here (create $conn object)
require 'config.php'; // or include 'db.php';

// Prepare and bind parameters for the database insert
$stmt = $conn->prepare("INSERT INTO PetSittingRequests (petName, petType, breed, age, gender, photoURL, vaccinated, healthIssues, temperament, foodType, feedingTimes, exerciseNeeds, favoriteToys, sittingDates, sittingTime, specialInstructions, ipAddress) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Check for a successful prepare
if (!$stmt) {
    // Handle prepare error
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
} else {
    // Bind the parameters
    $stmt->bind_param("sssiissssssssssss", $petName, $petType, $breed, $age, $gender, $photoURL, $vaccinated, $healthIssues, $temperament, $foodType, $feedingTimes, $exerciseNeeds, $favoriteToys, $sittingDates, $sittingTime, $specialInstructions, $ipAddress);

    // Execute the query and check for a successful execute
    if (!$stmt->execute()) {
        // Handle execute error
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        if ($stmt->affected_rows > 0) {
            echo "New records created successfully";
            header("Location: CHome1.php"); // Redirect after successful insert
        } else {
            echo "No records were inserted.";
        }
    }
    $stmt->close();
}
$conn->close();
}
?>
