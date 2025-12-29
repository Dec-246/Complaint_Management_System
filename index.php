<?php
// // including session and db connection in own file
// require 'Includes/db.connect.php';
// //relocates to home page
// require 'Customer_Reg_Login/Backend/authoriseUser.php';
// // allows us to use user data (tenant name)
// require 'Customer_Reg_Login/Backend/profileProcess.php';

// // If user not logged in, redirect to login page
// if (!isset($_SESSION['account_loggedIn'])) {
//     header('Location: Customer_Reg_Login/Frontend/login.php');
//     //echo 'user not logged in, redirecting to login page';
//     exit;
// }

// $username = $_SESSION['username'];

// // Want to restrict non-activated users to staff home page...
// // Get account username (can be either email or id instead)
// $stmt = $con->prepare('SELECT activation_code FROM customer_accounts WHERE username = ?');
// $stmt->bind_param('s', $username);
// $stmt->execute();
// $stmt->bind_result($activation_code);
// $stmt->fetch();
// $stmt->close();

// // var_dump($username);
// // var_dump($activation_code);
// // exit;

// // Check if account activated
// if ($activation_code !== 'activated') {
// 	// account not activated, redirect to login
//     header('Location: Customer_Reg_Login/Frontend/accountInactive.php');
//     echo 'not activated';
//     exit;
// } 
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

<!-- controls the full red box -->
<div class="userDashboardButtons">
    <!-- controls the white box/ space -->
    <!-- <div style="flex-grow: 1;"> -->
        <!-- controls the button -->
        <!-- <br><button class="supportPersonsInfo" onclick="alert('You can log any complaint here...')" >Log complaint</button>
    </div> -->

    <div class="supportPersonsInfo" style="flex-grow: 1;">
        <!-- controls the button -->
        <br><a href="Customer_Reg_Login/Frontend/log_complaint.php" class="supportPersonsInfo">Log Complaint</a><br>
    </div>

    <div class="supportPersonsInfo" style="flex-grow: 1;">
        <!-- controls the button -->
        <br><a href="Customer_Reg_Login/Frontend/complaintHistory.php" class="supportPersonsInfo">View complaint History</a><br>
    </div>

    <!-- <div style="flex-grow: 1;"> -->
        <!-- Using break tag to create space above the buttons  -->
        <!-- <Br><button class="supportPersonsInfo" onclick="alert('You can view the contact info to your support person here...')">View Supports info</button>
    </div> -->

    <!-- <div style="flex-grow: 1;">
        <br><button class="complaintStatus" onclick="alert('You can view the status of your complaint/s here...')">View Complaint Status</button>
    </div> -->
</div><br><br><br><br>


</body>
</html>


