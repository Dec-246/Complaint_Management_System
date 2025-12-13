<?php
//GET list of status types
require '../../Includes/db.connect.php';

$result = $con->query("SELECT id, type FROM solved_status");

if (!$result) {
    echo "<option> Error </option>";
}
while ($row = $result->fetch_assoc()) {
    $selected = ($row["id"] == $c_current['is_solved']) ? "selected" : "";
    echo "<option value='{$row["id"]}' $selected>" . htmlspecialchars($row["type"]) ."</option>";
    //echo "<option value='" . $row["id"] . "'>" . htmlspecialchars($row["type"]) ."</option>";
}
?>