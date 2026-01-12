<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class ComplaintLogic
{
    public function prepComplaint(
        string $name,
        string $description,
        int $complaintTypeId,
        int $customerId,
        int $staffId
    ): array {
        return [
            'name' => trim($name),
            'description' => trim($description),
            'complaint_type_id' => $complaintTypeId,
            'customer_id' => $customerId,
            'staff_id' => $staffId
        ];
    }
}



class ComplaintLogTest extends TestCase
{
    public function testComplaintLoggingPrep()
    {
        //Arrange
        $service = new ComplaintLogic();

        $name = "Stolen Card ";
        $description = "Money spent on card ";
        $complaintTypeId = 3;
        $customerId = 1;
        $staffId = 2;

        //Act
        $result = $service->prepComplaint(
            $name,
            $description,
            $complaintTypeId,
            $customerId,
            $staffId
        );

        //Assert
        $this->assertEquals("Stolen Card", $result['name']);
        $this->assertEquals("Money spent on card", $result['description']);
        $this->assertEquals(3, $result['complaint_type_id']);
        $this->assertEquals(1, $result['customer_id']);
        $this->assertEquals(2, $result['staff_id']);
    }
}

// To Run test
// php vendor\bin\phpunit tests/ComplaintLogTest.php

