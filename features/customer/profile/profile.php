<?php

require '../../../core/database/db.connect.php';
require '../../../core/auth/customer/authoriseUser.php';
require 'profileProcess.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet"  href="../../../public/assets/css/global.css" type="text/css"> 


<title>Home Screen</title>
</head>

<body>
    <?php include '../../../core/layout/customer/navbar.php';?>
<style>
    body{
        background-image:url("../../../public/assets/IMG/backgroundImage.png");
    }
</style>

<div class="header">
    <h1><?= htmlspecialchars($tenant_name)?></h1>
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

    <div class="profInfo">
    <strong>Tenant:</strong><br>
    <?= htmlspecialchars($tenant_name)?>
    </div>

</div>
</body>
</html>

