<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class AutoClassifyProcess
{
    public function prepComplaintClassification(
        array $complaintType
    ): array {
        return [
            'department_id' => $complaintType['department_id'],
            'estimated_resolution_times' => $complaintType['estimated_resolution_times'],
            'priority' => $complaintType['priority']
        ];
    }
}

class AutoClassifyComplaintTest extends TestCase
{
    public function testAutoClassifyComplaintSuccess()
    {
        //Arrange
        $complaintType = [

        'name' => 'Unauthorised transaction',
        'department_id' => 1,
        'estimated_resolution_times' => '3-5 days',
        'priority' => 'High'
        ];

        $classify = new AutoClassifyProcess();

        //Act
        $result = $classify->prepComplaintClassification($complaintType);

        //Assert
        $this->assertEquals(1, $result['department_id']);
        $this->assertEquals('3-5 days', $result['estimated_resolution_times']);
        $this->assertEquals('High', $result['priority']);
    }
}

// To Run test
// php vendor\bin\phpunit tests/unit/AutoClassifyComplaintTest.php

