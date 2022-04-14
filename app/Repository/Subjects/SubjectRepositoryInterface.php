<?php

namespace App\Repository\Subjects;

interface SubjectRepositoryInterface {
    Public function index();

    Public function store($request);

    Public function create();

    Public function show($id);

    Public function edit($id);

    Public function update($request, $id);

    Public function destroy($id);
}
