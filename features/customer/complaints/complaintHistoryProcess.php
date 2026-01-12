<?php
//require '../../Includes/db.connect.php';
//require '../Backend/authoriseUser.php';
$customer_id = $_SESSION['customer_id'];


//  don't have email or registered info stored in sessions so instead get results from database
$stmt = $con->prepare(
    'SELECT 
    -- complaint table
    complaint.id AS complaint_id, 
    complaint.name, 
    complaint.description,
    complaint.update_time,
    complaint.is_solved,
    -- complaint_type table
    complaint_type.name AS complaint_type_name, 
    complaint_type.estimated_resolution_times AS complaint_estimated_res_time,
    -- customer_accounts table
    customer_accounts.username AS customer_name,
    -- status table
    status.type AS status_type,
    -- accounts table
    accounts.username AS staff_name
    FROM complaint 
        JOIN complaint_type 
            ON complaint.complaint_type_id = complaint_type.id

        JOIN customer_accounts
            ON complaint.customer_id = customer_accounts.id

        JOIN status
            ON complaint.status_id = status.id

        LEFT JOIN accounts
            ON complaint.staff_id = accounts.id
    WHERE complaint.customer_id = ?');


// using account ID to get account info
$stmt->bind_param('i', $_SESSION['customer_id']);
$stmt->execute();
$stmt->bind_result($complaint_id, $name, $description, $update, $is_solved, $complaint_type_name, $estimated_resolution_times, $customer_name, $status_type, $staff_name);
$result = $stmt->get_result(); 


// while ($stmt->fetch()) {
//     $complaints[] = [
//         'id' => $complaint_id,
//         'name'=> $name,
//         'description'=> $description,
//         'update'=> $update,
//         'is_solved'=> $is_solved,
//         'type'=> $complaint_type_name,
//         'estimated'=> $estimated_resolution_times,
//         'customer'=> $customer_name,
//         'staff'=> $staff_name
//     ];
// }

$complaints = $result->fetch_all(MYSQLI_ASSOC);

// changing output of datatype (tinyint) for user friendly output
//('is_solved' == $is_solved ? "Yes" : "No");

//$stmt->fetch();
$stmt->close();



// changing timedate for UI design
//https://stackoverflow.com/questions/17495547/format-date-within-an-echo 
$update = date("F j, Y g:i A", strtotime($update));
?>