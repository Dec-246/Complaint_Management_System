<?php
// Bottom up (component-level) test
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class DBconnection
{
    private $con;

    public function __construct()
    {
        $this->con = new mysqli('localhost', 'root', '', 'complaint_management_system');
        if ($this->con->connect_error) {
            die("Connection error: " . $this->con->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->con;
    }

    public function close()
    {
        $this->con->close();
    }
}

class ComplaintProcess
{
    private $DB;

    public function __construct($mysqli)
    {
        $this->DB = $mysqli;
    }

    public function logComplaint($name, $description, $complaint_type_id, $customer_id)
    {
        $stmt = $this->DB->prepare(
            "INSERT INTO complaint (
            name,
            description,
            complaint_type_id,
            customer_id)
            VALUES (?, ?, ?, ?)"
        );

        $stmt->bind_param("ssii", $name, $description, $complaint_type_id, $customer_id);
        $comp_submitted = $stmt->execute();
        $stmt->close();

        return $comp_submitted;
    }

    public function getComplaintName($name)
    {
        $stmt = $this->DB->prepare(
            "SELECT * FROM complaint 
            WHERE name = ?"
        );

        $stmt->bind_param("s", $name);
        $stmt->execute();
        $complaintName = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $complaintName;
    }
}

class ComplaintLogProcessTest extends TestCase
{
    private $DB;
    private $service;

    //clearing testing table before next run
    protected function setUp(): void
    {
        $this->DB = (new DBconnection())->getConnection();
        $this->service = new ComplaintProcess($this->DB);

        // Delete this table before next run
        $this->DB->query("DELETE FROM complaint");
    }

    //closing database connection
    protected function tearDown(): void
    {
        $this->DB->close();
    }

    public function testComplaintLogGetAndFetch()
    {
        //Arrange
        $name = "Unauthorised Transaction";
        $description = "Money spent on card ";
        $complaintTypeId = 1;
        $customerId = 1;

        //Act
        $inserted = $this->service->logComplaint($name, $description, $complaintTypeId, $customerId);
        $retrieved = $this->service->getComplaintName($name);

        //Assert
        $this->assertTrue($inserted, "Complaint is submitted.");
        $this->assertNotNull($retrieved, "Complaint exists in database.");
        $this->assertEquals($customerId, $retrieved['customer_id']);
        $this->assertEquals($complaintTypeId, $retrieved['complaint_type_id']);
        $this->assertEquals($name, $retrieved['name']);
        $this->assertEquals($description, $retrieved['description']);
    }
}



// To Run test
// php vendor\bin\phpunit tests/integration/ComplaintLogProcessTest.php
