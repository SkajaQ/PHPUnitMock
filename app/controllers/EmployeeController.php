<?php

namespace Controller;
use Repository\EmployeeRepository;
use Model\EmployeeMeta;

class EmployeeController {
    private $employeeRepository; 
    public function __construct(EmployeeRepository $er){
        $this->employeeRepository = $er;
    }
    public function getAll(){}
    public function getAllById(){}
    public function getAllJson() : string {
        return json_encode($this->employeeRepository->getAll());
    }

    public function getAllJsonWithMetaInformation() : string {
        $employees = $this->employeeRepository->getAll();
        $meta = new EmployeeMeta($employees, count($employees));

        return json_encode($meta);
    }
}
