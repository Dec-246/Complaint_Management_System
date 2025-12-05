<?php
// including session and db connection in own file
require_once 'Includes/db.connect.php';


// If user not logged in, redirect to login page
if (!isset($_SESSION['account_loggedIn'])) {
    header('Location: login.php');
    //echo 'user not logged in, redirecting to login page';
    exit;
}

$username = $_SESSION['username'];

// Want to restrict non-activated users to staff home page...
// Get account username (can be either email or id instead)
$stmt = $con->prepare('SELECT activation_code FROM accounts WHERE username = ?');
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
<link rel="stylesheet"  href="CSS/global.css"> 


<title>Home Screen</title>
</head>

<body>
    <?php include 'Includes/navbar.php';?>
<style>
    body{
        background-image:url("IMG/backgroundImage.png");
    }
</style>

<div class="header">
    <h1>NatBest</h1>
    <p>Everyday beautiful life</p>

    <h2>Welcome back <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES) ?></h2>
</div>

<p class="example">Resize the browser window to see how the background color of this paragraph changes on different screen sizes.</p>

<!-- controls the full red box -->
<div class="userDashboardButtons">
    <!-- controls the white box/ space -->
    <div style="flex-grow: 1;">
        <!-- controls the button -->
        <br><button class="logComplaint" onclick="alert('You can log any complaint here...')">Log complaint</button>
    </div>

    <div style="flex-grow: 1;">
        <!-- Using break tag to create space above the buttons  -->
        <Br><button class="supportPersonsInfo" onclick="alert('You can view the contact info to your support person here...')">View Supports info</button>
    </div>

    <div style="flex-grow: 1;">
        <br><button class="complaintStatus" onclick="alert('You can view the status of your complaint/s here...')">View Complaint Status</button>
    </div>
</div>


</body>
</html>


