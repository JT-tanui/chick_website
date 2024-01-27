<?php
include "connect.php";

// Start the session
session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Add your validation and database query logic here
    // ...

    // For example, you can check if the username and password are not empty
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
    } else {
        // Validate user credentials (replace this with your validation logic)
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // User is authenticated, start the session and store user information
            $user = $result->fetch_assoc();

            // Store user information in session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to the dashboard or another page
            header('Location: ../profile.html');
            exit();
        } else {
            // Authentication failed
            echo "Invalid username or password.";
        }
    }
}

// Close connection
$conn->close();
?>
