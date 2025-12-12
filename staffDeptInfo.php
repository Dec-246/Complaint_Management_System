<?php
//GET list of tenants

$result = $con->query("SELECT id, name FROM departments");

while ($row = $result->fetch_assoc()) {
    echo "<option value='". $row["id"] ."'>". htmlspecialchars($row["name"]) ."</option>";
}
