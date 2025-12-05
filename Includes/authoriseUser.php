<?php 

if (!isset($_SESSION['account_loggedIn'])) {
    header('Location: index.php');
    exit;
}

?>