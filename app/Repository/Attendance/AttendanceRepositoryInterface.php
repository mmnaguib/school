<?php

namespace App\Repository\Attendance;

interface AttendanceRepositoryInterface {
    public function index();

    public function store($request);

    public function edit($id);

    public function update($request, $id);

    public function show($id);

    public function destroy($id);
}
