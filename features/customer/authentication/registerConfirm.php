<?php
require '../../../core/database/db.connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- mobile phones -->
<link rel="stylesheet" href="../../../public/assets/css/global.css" type="text/css"> 

    <!-- tablets/ large phones -->
<!-- <link rel="stylesheet" media="screen and (min-width: 600px)" href="../../CSS/global.css"> -->

    <!-- landscape tablets -->
<!-- <link rel="stylesheet" media="screen and (min-width: 768px)" href="../../CSS/global.css"> -->
    
<!-- laptops/ desktops -->
<!-- <link rel="stylesheet" media="screen and (min-width: 992px)" href="../../CSS/global.css"> -->

<!-- large laptops/ desktops -->
<!-- <link rel="stylesheet" media="screen and (min-width: 1200px)" href="../../CSS/global.css"> -->

<title>Register Confirm</title>
</head>

<body>
<style alt="Background image for website. This provides a modern, sleek design.">
    body{
        background-image:url("../../../public/assets/IMG/backgroundImage.png");
    }
</style>

<?php

// **keeping styling in the frontend and keeping php files tidy
// Ensure registration values not null
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    echo "<div class='checkEmail'>";
	echo 'Please complete the registration form';
    echo "</div>";
}
?>

</body>
</html>


