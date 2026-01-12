<?php
//require '../../Includes/db.connect.php';
//require '../Backend/authoriseUser.php';



//  don't have email or registered info stored in sessions so instead get results from database
$stmt = $con->prepare(
    'SELECT customer.email, customer.registered, tenant.tenant_name 
    FROM customer_accounts customer 
    INNER JOIN tenant tenant ON customer.tenant_id = tenant.tenant_id
    WHERE customer.id = ?');

// using account ID to get account info
$stmt->bind_param('i', $_SESSION['customer_id']);
$stmt->execute();
$stmt->bind_result($email, $registered, $tenant_name);
$stmt->fetch();
$stmt->close();

//https://stackoverflow.com/questions/17495547/format-date-within-an-echo 
$registered = date("F j, Y g:i A", strtotime($registered));
?>