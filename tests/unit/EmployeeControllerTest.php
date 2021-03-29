<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
use Model\Employee;
use Controller\EmployeeController;
use Repository\EmployeeRepository;

class EmployeeContollerTest extends TestCase {

    // public function testGetAllJsonReturnsJson() {
    //     $stub = $this->createStub(EmployeeRepository::class);
    //     $stub->method('getAll')->willReturn(array(new Employee("1", "Jonas"), new Employee("2", "Petras")));

    //     // given ... attention, you might need to disable type hints to avoid inteliphence warnings!
    //     // $employeeController = new EmployeeController(new EmployeeRepository());
    //     $employeeController = new EmployeeController($stub); 
        
    //     // when
    //     $res = $employeeController->getAllJson();
    //     // then
    //     assertEquals('[{"id":"1","name":"Jonas"},{"id":"2","name":"Petras"}]', $res);
    // }

    public function testGetAllJsonReturnsJson() {
        $mock = $this->getMockBuilder(EmployeeRepository::class)->getMock();
        $employeeController = new EmployeeController($mock);
        $mock->expects($this->exactly(1))
            ->method('getAll')
            ->willReturn(array(new Employee("1", "Jonas"), new Employee("2", "Petras")));
        
        // when
        $res = $employeeController->getAllJson();
        // then
        assertEquals('[{"id":"1","name":"Jonas"},{"id":"2","name":"Petras"}]', $res);
    }

    public function testGetAllJsonReturnsJsonMeta() {
        $mock = $this->getMockBuilder(EmployeeRepository::class)->getMock();
        $employeeController = new EmployeeController($mock);
        $mock->expects($this->exactly(1))
            ->method('getAll')
            ->willReturn(array(new Employee("1", "Jonas"), new Employee("2", "Petras")));
        
        // when
        $res = $employeeController->getAllJsonWithMetaInformation();
        // then
        assertEquals('{"employees":[{"id":"1","name":"Jonas"},{"id":"2","name":"Petras"}],"count":2}', $res);
    }
    
}
