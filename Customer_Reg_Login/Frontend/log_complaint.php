<!-- References -->
<!-- https://www.w3schools.com/tags/tag_select.asp -->

<?php
// including session and db connection in own file
require '../../Includes/db.connect.php';
require '../Backend/authoriseUser.php';
require '../Backend/profileProcess.php';

// If user not logged in, redirect to login page
if (!isset($_SESSION['account_loggedIn'])) {
    header('Location: Customer_Reg_Login/Frontend/login.php');
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
    header('Location: Customer_Reg_Login/Frontend/accountInactive.php');
    echo 'not activated';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" interactive-widget=resizes-content>
    <!-- mobile phones -->
    <link rel="stylesheet" href="CSS/global.css">
    <title>Log complaint</title>
</head>

<body>
    <?php include '../Includes/navbar.php'; ?>
    <style>
        body {
            background-image: url("IMG/backgroundImage.png");
        }
    </style>

    <div class="header">
        <h1><?= htmlspecialchars($tenant_name) ?></h1>
        <p>Everyday beautiful life</p>

        <form action="../Backend/complaintProcess.php" method="post" class="form login-form">

            <h1>Log Complaint</h1>

            <label class="form-label" for="name">Complaint Name</label>
            <div class="form-group">
                <svg class="form-icon-left" width="14" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                </svg>
                <input class="form-input" type="text" name="name" placeholder="Name" id="name" required>
            </div>

            <label class="form-label" for="description">Description</label>
            <div class="form-group">
                <svg class="form-icon-left" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 448 512">
                    <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                </svg>
                <input class="form-input" type="text" name="description" placeholder="Description" id="Description" required>
            </div><br>

            <label>Select Complaint Type:</label>
            <div class="form-group">
                <select class="tenantStyle" name="complaint_type_id" style="text-align: center; margin: auto; width:100%;">
                    <?php
                    require '../Backend/complaintTypeInfo.php';
                    ?>
                </select><br>
            </div><br>

            <button class="btn blue" type="submit">Submit Complaint</button>
        </form>
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