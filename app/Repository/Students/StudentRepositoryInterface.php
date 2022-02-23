<?php

namespace App\Repository\Students;

use http\Env\Request;

interface StudentRepositoryInterface {
    public function getAllStudents();

    public function createStudent();

    public function storeStudents($request);

    public function showStudent($id);

    public function editStudent($id);

    public function updateStudent($request, $id);

    public function deleteStudent($id);

    public function uploadAttachment($request);

    public function download_attachment($student_name, $file_name);

    public function delete_attachment($request, $id);
}
