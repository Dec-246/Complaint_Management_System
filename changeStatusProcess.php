<?php
require 'Includes/db.connect.php';

// debub tool
// var_dump($_SESSION);
// exit;

// // check if the form has been submitted
// if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
//     exit('Please complete the registration form!');
// }

$status_id = $_POST['status_id'];
$complaint_id = $_POST['complaint_id'];
// getting customer ID from login (authenticate.php) to set customer id in DB
$account_id = $_SESSION['account_id'];

if (!$account_id) {
    die("Error: No user ID found! You must log in!");
}

$sql = "UPDATE complaint
SET status_id = ?
WHERE id = ?";

// INSERT INTO complaint (status_id)
// VALUES (?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("ii", $status_id, $complaint_id);

if ($stmt->execute()) {
//   echo "New record created successfully";
  header("Location: viewAssignedComplaints.php");
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$stmt->close();
?>