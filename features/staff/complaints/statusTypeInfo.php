<?php
//GET list of status types
//require '../../Includes/db.connect.php';

$result = $con->query("SELECT id, type FROM status");

while ($row = $result->fetch_assoc()) {
    $currentlySelected = ($row["type"] == $c['status_type']) ? "currentlySelected" : "";
    echo "<option value='{$row["id"]}' $currentlySelected>" . htmlspecialchars($row["type"]) ."</option>";
}
