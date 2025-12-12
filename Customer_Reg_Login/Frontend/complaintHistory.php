<?php
// including session and db connection in own file
require '../../Includes/db.connect.php';
//relocates to home page
require '../Backend/authoriseUser.php';
// allows us to use user data (tenant name)
require '../Backend/complaintHistoryProcess.php';
require '../Backend/profileProcess.php';

// If user not logged in, redirect to login page
if (!isset($_SESSION['account_loggedIn'])) {
    header('Location: login.php');
    //echo 'user not logged in, redirecting to login page';
    exit;
}

$username = $_SESSION['username'];

// Want to restrict non-activated users to staff home page...
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
    header('Location: accountInactive.php');
    echo 'not activated';
    exit;
} 


?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- mobile phones -->
<link rel="stylesheet" media="screen and (max-width: 600px)" href="../../CSS/global.css"> 

    <!-- tablets/ large phones -->
<link rel="stylesheet" media="screen and (min-width: 600px)" href="../../CSS/global.css">

    <!-- landscape tablets -->
<link rel="stylesheet" media="screen and (min-width: 768px)" href="../../CSS/global.css">
    
<!-- laptops/ desktops -->
<link rel="stylesheet" media="screen and (min-width: 992px)" href="../../CSS/global.css">

<!-- large laptops/ desktops -->
<link rel="stylesheet" media="screen and (min-width: 1200px)" href="../../CSS/global.css">

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
    <h1><?= htmlspecialchars($tenant_name)?></h1>
    <p>Everyday beautiful life</p>

    <h2>Welcome back <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES) ?></h2>
</div>



<!-- controls the full red box -->
<div class="userDashboardButtons">

    <?php foreach ($complaints as $c): ?>

   
    <!-- controls the white box/ space -->
    <div class="profInfo">

        <div class="profInfo">
        <strong>Complaint reference number:</strong><br>
        <?= htmlspecialchars($c['complaint_id']) ?>
        </div>
    
        <div class="profInfo">
        <strong>Complaint name:</strong><Br>
        <?= htmlspecialchars($c['name']) ?>
        </div>
    
        <div class="profInfo">
        <strong>Description:</strong><br>
        <?= htmlspecialchars($c['description']) ?>
        </div>
    
        <div class="profInfo">
        <strong>Last Updated:</strong><br>
        <?= htmlspecialchars($c['update_time']) ?>
        </div>
    
        <div class="profInfo">
        <strong>Is issue solved:</strong><br>
        <?= $c['is_solved'] ? "Yes" : "No" ?>
        </div>
    
        <div class="profInfo">
        <strong>Complaint Type:</strong><br>
        <?= htmlspecialchars($c['complaint_type_name']) ?>
        </div>
    
        <div class="profInfo">
        <strong>Estimated resolution times:</strong><br>
        <?= htmlspecialchars($c['complaint_estimated_res_time']) ?> <p> Days</p>
        </div>
    
        <div class="profInfo">
        <strong>Customer Name:</strong><br>
        <?= htmlspecialchars($c['customer_name']) ?>
        </div>
    
        <div class="profInfo">
        <strong>Agent Name:</strong><br>
        <?= htmlspecialchars($c['staff_name'] ?? "Not assigned") ?>
        </div>
    
        <p>-------------------------------------------------------------------------------------------------------------</p>

    </div>

    <?php endforeach; ?>
</div>


</body>
</html>


