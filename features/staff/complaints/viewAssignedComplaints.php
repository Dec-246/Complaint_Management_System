<?php
// including session and db connection in own file
require '../../../core/database/db.connect.php';
//relocates to home page
require '../../../core/auth/staff/authoriseUser.php';
// allows us to use user data (tenant name)
require 'viewAssignedCompProcess.php';

// If user not logged in, redirect to login page
if (!isset($_SESSION['account_loggedIn'])) {
    header('Location: ../authentication/login.php');
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
    header('Location: ../activation/accountInactive.php');
    echo 'not activated';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- mobile phones -->
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="../../../public/assets/css/global.css">

    <!-- tablets/ large phones -->
    <link rel="stylesheet" media="screen and (min-width: 600px)" href="../../../public/assets/css/global.css">

    <!-- landscape tablets -->
    <link rel="stylesheet" media="screen and (min-width: 768px)" href="../../../public/assets/css/global.css">

    <!-- laptops/ desktops -->
    <link rel="stylesheet" media="screen and (min-width: 992px)" href="../../../public/assets/css/global.css">

    <!-- large laptops/ desktops -->
    <link rel="stylesheet" media="screen and (min-width: 1200px)" href="../../../public/assets/css/global.css">

    <title>Assigned Complaints</title>
</head>

<body>
    <?php include '../../../core/layout/staff/navbar.php'; ?>
    <style>
        body {
            background-image: url("../../../public/assets/IMG/backgroundImage.png");
        }
    </style>

    <div class="header">
        <p>Everyday beautiful life</p>

        <h2>Welcome back <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES) ?></h2>
    </div>

    <div class="OldCompHistory">
        <?php foreach ($complaints as $c): ?>

            <!-- controls the white box/ space -->
            <div class="OldCompHistory1">

                <br>
                <div class="OldCompHistoryBoxes">
                    <strong>Complaint reference number:</strong><br>
                    <?= htmlspecialchars($c['complaint_id']) ?>
                </div>

                <br>
                <div class="OldCompHistoryBoxes">
                    <strong>Complaint name:</strong><Br>
                    <?= htmlspecialchars($c['name']) ?>
                </div>

                <br>
                <div class="OldCompHistoryBoxes">
                    <strong>Description:</strong><br>
                    <?= htmlspecialchars($c['description']) ?>
                </div>

                <br>
                <div class="OldCompHistoryBoxes">
                    <strong>Complaint Type:</strong><br>
                    <?= htmlspecialchars($c['complaint_type_name']) ?>
                </div>

                <br>
                <div class="OldCompHistoryBoxes">
                    <strong>Priority:</strong><br>
                    <?= htmlspecialchars($c['priority']) ?>
                </div>

                <br>
                <div class="OldCompHistoryBoxes">
                    <strong>Customer Name:</strong><br>
                    <?= htmlspecialchars($c['customer_name']) ?>
                </div>

                <br>
                <div class="OldCompHistoryBoxes">
                    <strong>(Customer confirmation:) Is the complaint solved:</strong><br>
                    <?= htmlspecialchars($c['is_complaint_solved'] == 2 ? "Yes" : "No") ?>
                </div>

                <br>
                <div class="OldCompHistoryBoxes">
                    <strong>Status Type:</strong><br>
                    <?= htmlspecialchars($c['status_type']) ?>
                </div>

                <br>
                <form action="changeStatusProcess.php" method="post" class="OldCompHistoryBoxes">
                    <input type="hidden" name="complaint_id" value="<?= $c['complaint_id'] ?>">
                    <label>Change Status:</label>
                    <div class="form-group">
                        <select class="tenantStyle" name="status_id" style="text-align: center; margin: auto; width:100%;">
                            <?php require 'statusTypeInfo.php'; ?>
                        </select><br>
                    </div><br>
                    <button class="btn blue" type="submit">Update Status</button>

                </form>
                <p>-------------------------------------------------------------------------------------------------------------</p>
            </div>

        <?php endforeach; ?>
    </div>

    <button onclick="topFunction()" id="returnTop" title="Go to top">Top</button>

    <script>
        // Get the button
        let mybutton = document.getElementById("returnTop");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

</body>
</html>