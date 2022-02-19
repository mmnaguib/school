<?php

namespace App\Repository\Students;

use http\Env\Request;

interface StudentRepositoryInterface {
    public function getAllStudents();

    public function createStudent();
    
    public function storeStudents($request);

}
