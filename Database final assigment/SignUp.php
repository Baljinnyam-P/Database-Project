<?php
require 'config.php'; // This file should contain the $conn variable that holds the database connection

// Check if the form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $role = mysqli_real_escape_string($conn, $_POST["role"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $surname = mysqli_real_escape_string($conn, $_POST["surname"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check for duplicate username or email
    $duplicate_query = "SELECT * FROM Account WHERE username = ? OR email = ?";
    $stmt = mysqli_prepare($conn, $duplicate_query);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('Username or Email has already been taken.'); </script>";
    } else {
        // Prepare the INSERT statement
        $insert_query = "INSERT INTO Account (role, username, password, name, surname, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($stmt, 'sssssss', $role, $username, $hashed_password, $name, $surname, $phone, $email);

        // Execute the INSERT statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script> alert('Registration Successful'); window.location = 'LogIn.html'; </script>";
        } else {
            echo "<script> alert('Registration failed: ". mysqli_error($conn) ."'); </script>";
        }
    }

}

?>
