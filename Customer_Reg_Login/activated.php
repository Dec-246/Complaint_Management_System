<?php
require '../Includes/db.connect.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- mobile phones -->
<link rel="stylesheet" media="screen and (max-width: 600px)" href="CSS/global.css"> 

    <!-- tablets/ large phones -->
<link rel="stylesheet" media="screen and (min-width: 600px)" href="CSS/global.css">

    <!-- landscape tablets -->
<link rel="stylesheet" media="screen and (min-width: 768px)" href="CSS/global.css">
    
<!-- laptops/ desktops -->
<link rel="stylesheet" media="screen and (min-width: 992px)" href="CSS/global.css">

<!-- large laptops/ desktops -->
<link rel="stylesheet" media="screen and (min-width: 1200px)" href="CSS/global.css">

<title>Activated</title>
</head>

<body>
<style>
    body{
        background-image:url("IMG/backgroundImage.png");
    }
</style>

<?php

// **keeping styling in the frontend and keeping php files tidy
// Ensure registration values not null
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    echo "<div class='checkEmail'>";
    echo 'Your account is now activated! You can now <a href="../login.php">login</a>!';
    echo "</div>";
}
?>

</body>
</html>


