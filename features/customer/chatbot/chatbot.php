<?php
require '../../../core/database/db.connect.php';
require '../../../core/auth/customer/authenticationRestriction.php';
require '../../../core/auth/customer/authoriseUser.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet"  href="../../../public/assets/css/global.css" type="text/css"> 


<title>Chatbot Screen</title>
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

    <h2>Welcome back <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES) ?></h2>

    <h3><strong>Welcome to Harlow the Chatbot</strong></h3>
</div>

<p role="chatbot description" id="chatbotDescription">
    Harlow is going to be introduced in early August with a modern interface, allowing for users to find quick answers to problems that may occur.

    He will be our company mascot, allowing us to address issues immediately. This will allow our team to have releaved pressure, meaning that more serious issues will be solved much quicker by a member of our team.

    We hope you look forward to meeting Harlow as much as us. Feel free to get in touch with more suggestions that could help us give you the best service!

    Below is a sneek peak into what our chatbot will look like.
</p>

<img id="chatbotImg" src="../../../public/assets/IMG/chatbot.png" alt="Sneek peek at our new chatbot">

</body>
<footer> Copyright Declans CMS</footer>
</html>


