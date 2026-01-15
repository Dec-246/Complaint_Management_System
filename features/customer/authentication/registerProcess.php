<?php
require '../../../core/database/db.connect.php';

// check if the form has been submitted
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    header("Location: register.php");
    exit('Please complete the registration form!');
}

// --------------------------------------------
// For the validation, I have created a switch case in the register.php file which refers to the error codes below 
// -------- VALIDATION -----------------
// Validation for email
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    // exit('Email is not valid! Please try again!');

    //method is referred to in register.php
    // setting error message as a session 
    $_SESSION['emailValidation'] = 2;
    //redirecting user to register as reg has failed
    header("Location: register.php");
}

// Validation for username (must be alphanumeric)
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {

    $_SESSION['usernameValidation'] = 3;
    header("Location: register.php");
    //exit('Username is not valid!');
}

// Validate password (between 5-20 characters)
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {

    $_SESSION['passwordValidation'] = 4;
    header("Location: register.php");
    //exit('Password must be between 5 and 20 characters long!');
}


// Check if given username already in database
if ($stmt = $con->prepare('SELECT id, password FROM customer_accounts WHERE username = ?')) {
    // Bind parameters - data type to text field
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Store result, check back if account already in DB
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        //existing account error
        $_SESSION['existError'] = 1;

        //print_r($_SESSION);
        header("Location: register.php");
        exit;
        //  echo 'Username already exists! Please choose another! ';

    } else {

        // Declare variables
        $registered = date('Y-m-d H:i:s');
        // Hashing the password and use password_verify when a user logs in
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $tenant_id = $_POST['tenant_id'];

        // Username does not exist, insert new account
        if ($stmt = $con->prepare('INSERT INTO customer_accounts (username, password, email, registered, activation_code, tenant_id) VALUES (?, ?, ?, ?, ?, ?)')) {


            // Creating unique activation code- unique ID sent to users email address
            $uniqid = sha1($_POST['username'] . uniqid());

            // Bind POST data to the prepared statement
            $stmt->bind_param('ssssss', $_POST['username'], $password, $_POST['email'], $registered, $uniqid, $tenant_id);
            $stmt->execute();

            // Sending email to user- Format for email 
            // From email address
            $from = 'declancj2016@gmail.com';
            //  subject
            $subject = 'Account Activation Required';
            //  headers
            $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
            // Update the activation variable below
            $activate_link = 'http://localhost/ComplaintManagementSystem/features/customer/authentication/activate.php?email=' . urlencode($_POST['email']) . '&code=' . urlencode($uniqid);

            // Email message
            $message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
            // Send mail
            mail($_POST['email'], $subject, $message, $headers);
            // Output message
            // echo 'Please check your email to activate your account!';

            //If first session (login attempt) failed
            if (isset($_SESSION['existError'])) {
                // clearing up the session when not in use
                unset($_SESSION['existError']);
            }
            // successful redirect 
            header("Location: ../activation/accountInactive.php");
        } else {
            echo 'Could not prepare statement!';
        }
    }
    $stmt->close();
} else {
    echo 'Could not prepare statement!';
}
// Closing connection here
$con->close();

