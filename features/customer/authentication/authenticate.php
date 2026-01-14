<?php
session_destroy();

require '../../../core/database/db.connect.php';

// check data from login form was submitted, isset() will check if data exists
if (!isset($_POST['username'], $_POST['password'])) {
    // Couldn't get data that should be sent
    exit('Please fill both the username and password fields!');
}

// Prepare SQL, prevent SQL injection
if ($stmt = $con->prepare('SELECT id, password, activation_code FROM customer_accounts WHERE username = ?')) {

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Store result, check if account exists in database
    $stmt->store_result();

    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    if ($stmt->num_rows === 0) {
        header ('Location: ../errors/wrongCreds.php');
        exit;
    }
    
    // Check account exists with input username
    if ($stmt->num_rows > 0) {
        // Account exists, bind results to variables
        $stmt->bind_result($id, $password, $activation_code);
        $stmt->fetch();

        // ***************************************************
        if ($activation_code !== 'activated') {
            header('Location: ../activation/accountInactive.php');
            exit;
        }

        // **Note: use password_hash in your registration file to store the hashed passwords**
        if (password_verify($_POST['password'], $password)) {
            // Password is correct! User successfully logged in

            // Regenerate session ID to prevent session fixation attacks | prevents session hijacking (regenerates user's session ID stored on server and as cookie in browser.)
            session_regenerate_id();
            // Declare session variables (they basically act like cookies but the data is remembered on the server)
            $_SESSION['account_loggedIn'] = TRUE;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['customer_id'] = $id;
            // Output success message
            header('Location: ../dashboard/index.php');
            exit;
        } else {
            // Incorrect password
            header ('Location: ../errors/wrongCreds.php');
        }
    } else {
        // Incorrect username
        header ('Location: ../errors/wrongCreds.php');
        exit;
    }
    // Close the prepared statement
    $stmt->close();
}
