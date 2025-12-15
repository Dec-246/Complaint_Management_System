<?php
require '../../Includes/db.connect.php';

// debub tool
// var_dump($_SESSION);
// exit;


// NOTES
// -- USE stmt FOR PREPARED STATEMENTS
// -- USE sql FOR RAW SQL STRINGS
// -- STMT PREVENTS BUGS, IMPROVES CODE READABILITY, PROFESSIONALITY.


// here i am remembering to use trim:
// - getting rid of user's whitespace
// - clearing up wasted DB space if whitespace occurs a lot
// - ensuring frontend is kept tidy
$name = trim($_POST['name']);
$description = trim($_POST['description']);
$complaint_type_id = $_POST['complaint_type_id'];

// getting customer ID from login (authenticate.php) to set customer id in DB through sessions
// sessions allowing me to keep the customers data active in my web app whilst logged in
$customer_id = $_SESSION['customer_id'];

if (!$customer_id) {
  die("Error: No user ID found! You must log in!");
}


// getting complaint department
$stmt = $con->prepare("
SELECT department_id
FROM complaint_type
WHERE id = ?
");
$stmt->bind_param("i", $complaint_type_id);
$stmt->execute();
$stmt->bind_result($department_id);
$stmt->fetch();
$stmt->close();


// now getting available (1 = Yes) staff (at random)
// matching with department 
$stmt = $con->prepare(
  "SELECT id
    FROM accounts
    WHERE is_available = 1
    AND department_id = ?
    ORDER BY RAND()
    LIMIT 1
");
$stmt->bind_param("i", $department_id);
$stmt->execute();
$stmt->bind_result($staff_id);
$stmt->fetch();
$stmt->close();

if (!$staff_id) {
  echo "Apologies: ";
  echo "No staff are available at this time!";
  echo "Your application will be reviewed and an agent will be assigned when possible!";
}

// now going to assign the staff user who is available 
$stmt = $con->prepare(
  "INSERT INTO complaint (
  name,
  description,
  complaint_type_id,
  customer_id,
  staff_id)
  VALUES (?, ?, ?, ?, ?)
");
$stmt->bind_param("ssiii", $name, $description, $complaint_type_id, $customer_id, $staff_id);

$comp_submitted = $stmt->execute(); 
$stmt->close();

if ($comp_submitted) {
  header("Location: ../Frontend/complaintSuccess.php");
  exit;
} else {
  echo "Error: " . $con->error;
}
