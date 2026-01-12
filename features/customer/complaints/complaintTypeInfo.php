<?php
//GET list of complaint types
//require '../../Includes/db.connect.php';

$result = $con->query("SELECT id, name FROM complaint_type");

while ($row = $result->fetch_assoc()) {
    echo "<option value='". $row["id"] ."'>". htmlspecialchars($row["name"]) ."</option>";
}
