<?php
require '../../Includes/db.connect.php';

// debub tool
// var_dump($_SESSION);
// exit;

// // check if the form has been submitted
// if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
//     exit('Please complete the registration form!');
// }
$name = $_POST['name'];
$description = $_POST['description'];
$complaint_type_id = $_POST['complaint_type_id'];
// getting customer ID from login (euthenticate.php) to set customer id in DB
$customer_id = $_SESSION['customer_id'];

if (!$customer_id) {
    die("Error: No user ID found! You must log in!");
}



$sql = "INSERT INTO complaint (name, description, complaint_type_id, customer_id)
VALUES (?, ?, ?, ?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("ssii", $name, $description, $complaint_type_id, $customer_id);



if ($stmt->execute()) {
//   echo "New record created successfully";
  header("Location: ../Frontend/complaintSuccess.php");
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

$stmt->close();
?>