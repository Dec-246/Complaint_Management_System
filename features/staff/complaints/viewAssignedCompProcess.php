<?php
//require '../../Includes/db.connect.php';
//require '../Backend/authoriseUser.php';
$account_id = $_SESSION['account_id'];

//  don't have email or registered info stored in sessions so instead get results from database
$stmt = $con->prepare(
    'SELECT 
    -- complaint table
    complaint.id AS complaint_id, 
    complaint.name, 
    complaint.description,
    -- complaint_type table
    complaint_type.name AS complaint_type_name, 
    complaint_type.department_id AS complaint_department,
    complaint_type.priority AS priority,
    -- customer_accounts table
    customer_accounts.username AS customer_name,
    -- status table
    status.type AS status_type

    FROM complaint 
        JOIN complaint_type 
            ON complaint.complaint_type_id = complaint_type.id

        JOIN customer_accounts
            ON complaint.customer_id = customer_accounts.id

        JOIN status
            ON complaint.status_id = status.id

        JOIN accounts staff
            ON staff.id = ?
            -- here i am getting the results for logged in user
            -- only the complaints that match the staff member ID & same department ID will pop up.
    WHERE complaint.staff_id = staff.id
        && complaint_type.department_id = staff.department_id'
);

// using account ID to get account info
$stmt->bind_param('i', $_SESSION['account_id']);
$stmt->execute();
$stmt->bind_result($complaint_id, $name, $description, $complaint_type_name, $complaint_department, $priority, $customer_name, $status_type);
$result = $stmt->get_result();

$complaints = $result->fetch_all(MYSQLI_ASSOC);
//$stmt->fetch();
$stmt->close();
