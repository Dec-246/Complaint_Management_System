<?php

session_start();
// If user not logged in, redirect to login page
if (!isset($_SESSION['account_loggedin'])) {
    header('Location: login.php');
    exit;
}

// Want to restrict non-activated users to staff home page...
// Get account username (can be either email or id instead)
$stmt = $con->prepare('SELECT activation_code FROM accounts WHERE username = ?');
$stmt->bind_param('s', $_POST['username']);
$stmt->execute();
$stmt->bind_result($activation_code);
$stmt->fetch();
$stmt->close();
// Check if account activated
if ($activation_code == 'activated') {
	// account is activated
	// Display home page etc

    header('Location: index.php');
    exit;
} else {
	// account is not activated
	// redirect user or display an error
    header('Location: login.php');
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

    <h2>Welcome back <?= htmlspecialchars($_SESSION['account_name'], ENT_QUOTES) ?></h2>
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


