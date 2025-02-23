<?php
require 'config.php'; // This file should contain the $conn variable that holds the database connection.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $role = mysqli_real_escape_string($conn, $_POST["role"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Prepare the SELECT statement to get the role as well
    $query = "SELECT id, role, username, password FROM Account WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    
    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    
    // Store the result so we can check if the account exists in the database.
    mysqli_stmt_store_result($stmt);
    
    if (mysqli_stmt_num_rows($stmt) == 1) {
        // Bind result variables
        mysqli_stmt_bind_result($stmt, $id, $db_role, $username, $hashed_password);
        mysqli_stmt_fetch($stmt);
        
        // Verify the role and check if the entered password matches the hashed password in the database
        if ($role == $db_role && password_verify($password, $hashed_password)) {
            // Role is correct and password is correct, so start a new session
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['role'] = $db_role;
            $_SESSION['username'] = $username;
            
            // Redirect user to a different home page based on their role
            switch ($db_role) {
                case 'client':
                    header("Location: CHome1.php");
                    break;
                case 'sitter':
                    header("Location: SHome.html");
                    break;
                case 'handler':
                    header("Location: MHome.html");
                    break;
                default:
                    // If role is not recognized, redirect to a generic page or log out
                    header("Location: index.php");
                    break;
            }
            exit;
        } else {
            // Display an error message if password is not valid or role doesn't match
            echo "<script> alert('The role or password you entered was not valid.'); </script>";
        }
    } else {
        // Display an error message if username doesn't exist
        echo "<script> alert('No account found with that username.'); </script>";
    }

   
}

?>
