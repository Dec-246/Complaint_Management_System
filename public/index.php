<?php
require '../core/database/db.connect.php';
require '../core/auth/customer/authenticationRestriction.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet"  href="assets/css/global.css" type="text/css"> 


<title>Home Screen</title>
</head>

<body>
    <?php include '../core/layout/customer/Customer_nav.php';?>
<style>
    body{
        background-image:url("assets/IMG/backgroundImage.png");
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
        <br><a href="../features/customer/complaints/log_complaint.php" class="supportPersonsInfo">Log Complaint</a><br>
    </div>

    <div class="supportPersonsInfo" style="flex-grow: 1;">
        <!-- controls the button -->
        <br><a href="../features/customer/complaints/complaintHistory.php" class="supportPersonsInfo">View complaint History</a><br>
    </div>
</div><br><br><br><br>

<button onclick="myFunction()" id="chatbot">Chatbot</button>

<script>
function myFunction() {
  location.replace("../features/customer/chatbot/chatbot.php")
}
</script>

</body>
<footer> Copyright Declans CMS</footer>
</html>


