<?php
require '../../../core/database/db.connect.php';


// getting customer ID from login (authenticate.php) to set customer id in DB
$customer_id = $_SESSION['customer_id'];
$is_solved_id = $_POST['is_solved_id'];
$complaint_id = $_POST['complaint_id'];

if (!$customer_id) {
  die("Error: No user ID found! You must log in!");
}

$sql = "UPDATE complaint
SET is_solved = ?
WHERE id = ? AND customer_id = ?";

// INSERT INTO complaint (status_id)
// VALUES (?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("iii", $is_solved_id, $complaint_id, $customer_id);

if ($stmt->execute()) {
//   echo "New record created successfully";
  header("Location: complaintHistory.php");
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$stmt->close();
?>