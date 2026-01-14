<?php 
ini_set('display_errors', 0);
require '../../../core/database/db.connect.php';
require 'registerProcess.php';

//redirect user to home page if user logged in
if (isset($_SESSION['account_loggedIn'])) {
    //setting redirectory to staff home page
header('Location: ../dashboard/index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1" interactive-widget=resizes-content>
        <link href="../../../public/assets/css/global.css" rel="stylesheet" type="text/css">
        <title>Register</title>
    </head>
    <body>
        <div class="login"></div>

            <form action="registerProcess.php" method="post" class="form login-form">
            
            <?php
            if ($_SESSION['existError'] == 1){
                echo '<div class="checkEmail">';
                echo 'Username already exists! Please choose another! ';
                echo '</div>';
            }
            if ($_SESSION['emailValidation'] == 2){
                echo '<div class="checkEmail">';
                echo 'Email is not valid! Please try again!! ';
                echo '</div>';
            }
            if ($_SESSION['usernameValidation'] == 3){
                echo '<div class="checkEmail">';
                echo 'Username is not valid! ';
                echo '</div>';
            }
            if ($_SESSION['passwordValidation'] == 4){
                echo '<div class="checkEmail">';
                echo 'Password must be between 5 and 20 characters long! ';
                echo '</div>';
            }
            ?>

            <h1>Customer Register</h1>

            <label class="form-label" for="username">Username</label>
            <div class="form-group">
                <svg class="form-icon-left" width="14" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"> <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                <input class="form-input" type="text" name="username" placeholder="Username" id="username" required>
            </div>
             
            <label class="form-label" for="email">Email</label>
            <div class="form-group">
                <svg class="form-icon-left" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 448 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                <input class="form-input" type="email" name="email" placeholder="Email" id="email" required>
            </div>

            <label class="form-label" for="password">Password</label>
            <div class="form-group mar-bot-5">
                <svg class="form-icon-left" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 448 512"><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                <input class="form-input" type="password" name="password" placeholder="Password" id="password" autocomplete="new-password" required>
            </div>
    
            <label>Select Tenant:</label>
            <div class="form-group">
                <select class="tenantStyle" name="tenant_id" style="text-align: center; margin: auto; width:100%;">
                    <?php
                        require 'tenantInfo.php';
                    ?>
                </select><br>
            </div><br>

            <button class="btn blue" type="submit">Register</button>
                
            <p role="login screen link" class="register-link">Already have an account? <a href="login.php" class="form-link">Login</a></p>
                
            </form>

        </div>
    </body>
</html>