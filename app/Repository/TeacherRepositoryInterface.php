<?php

namespace App\Repository;

use http\Env\Request;

interface TeacherRepositoryInterface {
    public function getAllTeachers();

    public function getAllSpecializations();

    public function getAllGenders();

    public function storeTeachers($request);

    public function getTeacher($id);

    public function updateTeachers($request, $id);
}
