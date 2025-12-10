<?php
session_start();
session_destroy();
header('Location: ../Customer_Reg_Login/Frontend/login.php');
exit;
?>