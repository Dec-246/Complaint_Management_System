<?php
// including session and db connection in own file
require '../../../core/database/db.connect.php';
//relocates to home page
require '../../../core/auth/customer/authoriseUser.php';
// allows us to use user data (tenant name)
require 'complaintHistoryProcess.php';
require '../profile/profileProcess.php';

// If user not logged in, redirect to login page
if (!isset($_SESSION['account_loggedIn'])) {
    header('Location: ../authentication/login.php');
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
    <link rel="stylesheet" href="../../../public/assets/css/global.css" type="text/css">

    <title>Complaint History</title>
</head>

<body>

    <?php include '../../../core/layout/customer/navbar.php'; ?>
    <style>
        body {
            background-image: url("../../../public/assets/IMG/backgroundImage.png");
        }
    </style>

    <div class="header">
        <h1><?= htmlspecialchars($tenant_name) ?></h1>
        <p>Everyday beautiful life</p>

        <h2>Welcome back <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES) ?></h2>
    </div>

    <!-- controls the full red box -->
    <div class="OldCompHistory">

        <?php foreach ($complaints as $c): ?>

            <!-- controls the white box/ space -->
            <div class="OldCompHistory1">

                <div class="OldCompHistoryBoxes">
                    <strong>Complaint reference number:</strong><br>
                    <?= htmlspecialchars($c['complaint_id']) ?>
                </div><br>

                <div class="OldCompHistoryBoxes">
                    <strong>Complaint name:</strong><Br>
                    <?= htmlspecialchars($c['name']) ?>
                </div><br>

                <div class="OldCompHistoryBoxes">
                    <strong>Description:</strong><br>
                    <?= htmlspecialchars($c['description']) ?>
                </div><br>

                <div class="OldCompHistoryBoxes">
                    <strong>Last Updated:</strong><br>
                    <?= htmlspecialchars($c['update_time']) ?>
                </div><br>

                <div class="OldCompHistoryBoxes">
                    <strong>Status Type:</strong><br>
                    <?= htmlspecialchars($c['status_type']) ?>
                </div><br>

                <div class="OldCompHistoryBoxes">
                    <strong>Complaint Type:</strong><br>
                    <?= htmlspecialchars($c['complaint_type_name']) ?>
                </div><br>

                <div class="OldCompHistoryBoxes">
                    <strong>Estimated resolution times:</strong><br>
                    <?= htmlspecialchars($c['complaint_estimated_res_time']) ?> <p> Days</p>
                </div><br>

                <div class="OldCompHistoryBoxes">
                    <strong>Customer Name:</strong><br>
                    <?= htmlspecialchars($c['customer_name']) ?>
                </div><br>

                <div class="OldCompHistoryBoxes">
                    <strong>Agent Name:</strong><br>
                    <?= htmlspecialchars($c['staff_name'] ?? "Not assigned") ?>
                </div><br>

                <div class="OldCompHistoryBoxes">
                    <strong>Is issue solved:</strong><br>
                    <?= htmlspecialchars($c['is_complaint_solved'] == 2 ? "Yes" : "No") ?>
                </div><br>

                <form action="changeSolveStatusProcess.php" method="post" class="profInfo">
                    <input type="hidden" name="complaint_id" value="<?= $c['complaint_id'] ?>">

                    <label>Change Solve Status:</label>

                    <div class="form-group">
                        <select class="tenantStyle" name="is_solved_id" style="text-align: center; margin: auto; width:100%;">

                            <?php $c_current = $c;
                            require 'solvedInfo.php';
                            ?>

                        </select><br>
                    </div><br>

                    <button class="btn blue" type="submit">Update Solve Status</button>
                </form><br>

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
<footer> Copyright Declans CMS </footer>

</html>