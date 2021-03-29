<?php

namespace Model;
use JsonSerializable;
class EmployeeMeta implements JsonSerializable {
    private $employees;
    private $count;
    public function __construct($employees, $count){
        $this->employees = $employees;
        $this->count = $count;
    }
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}