<?php

include "connect.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    // handle profilePicture upload
    $profilePicture = $_FILES["profilePicture"]["name"];
    $password = $_POST["password"];

    // Insert data into the database
    $sql = "INSERT INTO users (username, email, profilePicture, password)
    VALUES ('$username', '$email', '$profilePicture', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: ../join.html');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
