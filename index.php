<?php
require 'Includes/db.connect.php';
require 'Customer_Reg_Login/Backend/authenticationRestriction.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- mobile phones -->
<link rel="stylesheet"  href="CSS/global.css"> 


<title>Home Screen</title>
</head>

<body>
    <?php include 'Includes/Customer_nav.php';?>
<style>
    body{
        background-image:url("IMG/backgroundImage.png");
    }
</style>

<div class="header">
    <h1><?= htmlspecialchars($tenant_name)?></h1>
    <p>Everyday beautiful life</p>

    <h2>Welcome back <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES) ?></h2>
</div>

<div class="userDashboardButtons">

    <div class="supportPersonsInfo" style="flex-grow: 1;">
        <!-- controls the button -->
        <br><a href="Customer_Reg_Login/Frontend/log_complaint.php" class="supportPersonsInfo">Log Complaint</a><br>
    </div>

    <div class="supportPersonsInfo" style="flex-grow: 1;">
        <!-- controls the button -->
        <br><a href="Customer_Reg_Login/Frontend/complaintHistory.php" class="supportPersonsInfo">View complaint History</a><br>
    </div>
</div><br><br><br><br>

</body>
</html>


