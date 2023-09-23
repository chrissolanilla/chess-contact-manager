<?php
// Start the session
session_start();

// Check if the user is logged in, if not redirect to the login page
if (!isset($_SESSION["username"])) {
    header("Location: login/");
    exit();
}

// Fetch user details from the database based on the username in the session
// Here, we'll just simulate fetching user details for demonstration
$userDetails = [
    "username" => $_SESSION["username"],
    "email" => "user@example.com",
    // other user details can be added here
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>User Profile</h2>
            <table class="table table-bordered">
                <tr>
                    <th>Username</th>
                    <td><?php echo htmlspecialchars($userDetails["username"]); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($userDetails["email"]); ?></td>
                </tr>
                <!-- Add more rows to display additional user details -->
            </table>
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
