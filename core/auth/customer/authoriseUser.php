<?php 

if (!isset($_SESSION['account_loggedIn'])) {
    header('Location: ../../../features/customer/authentication/login.php');
    //echo 'user not logged in, redirecting to login page';
    exit;
}

?>