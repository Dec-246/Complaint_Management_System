<?php 

if (!isset($_SESSION['account_loggedIn'])) {
    header('Location: ../../../features/authentication/login.php');
    exit;
}

?>