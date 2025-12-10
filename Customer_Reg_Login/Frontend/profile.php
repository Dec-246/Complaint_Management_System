<?php
require '../../Includes/db.connect.php';
require '../Backend/authoriseUser.php';



//  don't have email or registered info stored in sessions so instead get results from database
$stmt = $con->prepare('SELECT email, registered FROM customer_accounts WHERE id = ?');

// using account ID to get account info
$stmt->bind_param('i', $_SESSION['account_id']);
$stmt->execute();
$stmt->bind_result($email, $registered);
$stmt->fetch();
$stmt->close();
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet"  href="../../CSS/global.css"> 


<title>Home Screen</title>
</head>

<body>
    <?php include '../Includes/navbar.php';?>
<style>
    body{
        background-image:url("IMG/backgroundImage.png");
    }
</style>

<div class="header">
    <h1>NatBest</h1>
    <p>Everyday beautiful life</p>
</div>

<div class="profileData">

    <div class="profInfo">
    <strong>Username:</strong><br>
    <?= htmlspecialchars($_SESSION['username'])?>
    </div>

    <div class="profInfo">
    <strong>Email:</strong><Br>
    <?= htmlspecialchars($email)?>
    </div>

    <div class="profInfo">
    <strong>Registered:</strong><br>
    <?= htmlspecialchars($registered)?>
    </div>

</div>
