<?php
// including session and db connection in own file

//relocates to home page
require 'authoriseUser.php';
// allows us to use user data (tenant name)
require_once __DIR__ . '/../../../features/customer/profile/profileProcess.php';

// If user not logged in, redirect to login page
if (!isset($_SESSION['account_loggedIn'])) {
    header('Location: ../../../features/customer/authentication/login.php');
    //echo 'user not logged in, redirecting to login page';
    exit;
}

$username = $_SESSION['username'];

// Want to restrict non-activated users to customer home page...
// Get account username (can be either email or id instead)
$stmt = $con->prepare('SELECT activation_code FROM customer_accounts WHERE username = ?');
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->bind_result($activation_code);
$stmt->fetch();
$stmt->close();

// var_dump($username);
// var_dump($activation_code);
// exit;

// Check if account activated
if ($activation_code !== 'activated') {
	// account not activated, redirect to login
    header('Location: ../../../features/customer/activation/accountInactive.php');
    echo 'not activated';
    exit;
} 
?>