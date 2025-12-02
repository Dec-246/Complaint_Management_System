<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'ComplaintManagementSystem';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
// connection error message
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// check if the form has been submitted
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	exit('Please complete the registration form!');
}
// Ensure registration values not null
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	exit('Please complete the registration form');
}

// --------------------------------------------
// -------- VALIDATION -----------------
// Validation for email
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid! Please try again!');
}
// ValidatION for username (must be alphanumeric)
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
	exit('Username is not valid!');
}
// Validate password (between 5-20 characters)
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit('Password must be between 5 and 20 characters long!');
}


// Check if given username already in database
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters - data type to text field
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store result, check back if account already in DB
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		echo 'Username already exists! Please choose another!';
	} else {

        // Declare variables
        $registered = date('Y-m-d H:i:s');
        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


        // Username does not exist, insert new account
        if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, registered, activation_code) VALUES (?, ?, ?, ?, ?)')) {

        	
        	// Creating unique activation code- unique ID sent to users email address
            $uniqid = sha1($_POST['username'] . uniqid());

            // Bind POST data to the prepared statement
            $stmt->bind_param('sssss', $_POST['username'], $password, $_POST['email'], $registered, $uniqid);

        	$stmt->execute();


        	// Sending email to user- Format for email 
        	// From email address
            $from = 'declancj2016@gmail.com';
            //  subject
            $subject = 'Account Activation Required';
            //  headers
            $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
            // Update the activation variable below
            $activate_link = 'https://example.com/ComplaintManagementSystem/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
            // Email message
            $message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
            // Send mail
            mail($_POST['email'], $subject, $message, $headers);
            // Output message
            echo 'Please check your email to activate your account!';
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
?>