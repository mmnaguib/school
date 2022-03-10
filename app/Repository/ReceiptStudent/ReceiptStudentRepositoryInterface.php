<?php

namespace App\Repository\ReceiptStudent;

use http\Env\Request;

interface ReceiptStudentRepositoryInterface {
    public function index();

    public function store($request);

    public function show($id);

    public function edit($id);

    public function update($request, $id);

    public function destroy($id);

}
