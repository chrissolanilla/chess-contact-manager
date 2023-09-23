<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to the database
    $conn = new mysqli("localhost", "your_username", "your_password", "your_database_name");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare a SQL statement to find the user with the given username
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a user is found and the password is correct
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            // Password is correct, start the session
            $_SESSION["username"] = $username;
            header("Location: /"); // Redirect to the homepage
            exit();
        } else {
            // Password is incorrect
            header("Location: login/?error=Incorrect password");
            exit();
        }
    } else {
        // No user found
        header("Location: login/?error=No user found");
        exit();
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
