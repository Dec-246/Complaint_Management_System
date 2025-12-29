<?php
require '../../Includes/db.connect.php';


$is_solved_id = $_POST['is_solved_id'];
$complaint_id = $_POST['complaint_id'];
// getting customer ID from login (authenticate.php) to set customer id in DB
$account_id = $_SESSION['account_id'];

if (!$account_id) {
  die("Error: No user ID found! You must log in!");
}

$sql = "UPDATE complaint
SET is_solved = ?
WHERE id = ?";

// INSERT INTO complaint (status_id)
// VALUES (?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("ii", $is_solved_id, $complaint_id);

if ($stmt->execute()) {
//   echo "New record created successfully";
  header("Location: ../Frontend/complaintHistory.php");
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$stmt->close();
?>