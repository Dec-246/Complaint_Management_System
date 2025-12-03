<?php

session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'ComplaintManagementSystem';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// Checking connection errors
if (mysqli_connect_errno()) {
    // If error with connection, stop script, display error
    exit('Failed to connect :(');
}

// check data from login form was submitted, isset() will check if data exists
if (!isset($_POST['username'], $_POST['password'])) {
    // Couldn't get data that should be sent
    exit('Please fill both the username and password fields!');
}

// Prepare our SQL, prevent SQL injection
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Store result, check if account exists in database
    $stmt->store_result();
    

// Check account exists with input username
if ($stmt->num_rows > 0) {
    // Account exists, bind results to variables
    $stmt->bind_result($id, $password);
    $stmt->fetch();
    // **Note: use password_hash in your registration file to store the hashed passwords**
    if (password_verify($_POST['password'], $password)) {
        // Password is correct! User successfully logged in

        // Regenerate session ID to prevent session fixation attacks | prevents session hijacking (regenerates user's session ID stored on server and as cookie in browser.)
        session_regenerate_id();
        // Declare session variables (they basically act like cookies but the data is remembered on the server)
        $_SESSION['account_loggedIn'] = TRUE;
        $_SESSION['account_name'] = $_POST['username'];
        $_SESSION['account_id'] = $id;
        // Output success message
        header('Location: staffHome.php');
        exit;
    } else {
        // Incorrect password
        echo 'Incorrect password!';
    }
} else {
    // Incorrect username
    echo 'Incorrect username and/or password!';
}



    // Close the prepared statement
    $stmt->close();
}
?>