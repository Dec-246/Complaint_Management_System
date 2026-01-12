<?php
//GET list of tenants

$result = $con->query("SELECT tenant_id, tenant_name FROM tenant");

while ($row = $result->fetch_assoc()) {
    echo "<option value='". $row["tenant_id"] ."'>". htmlspecialchars($row["tenant_name"]) ."</option>";
}
