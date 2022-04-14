<?php

namespace App\Http\Controllers;

use App\Repository\Exam\ExamRepositoryInterface;
use Illuminate\Http\Request;

class ExamContoller extends Controller
{
    protected $exam;
    public function __construct(ExamRepositoryInterface $exam)
    {
       $this->exam = $exam;
    }
    public function index()
    {
        return $this->exam->index();
    }
    public function create()
    {
        return $this->exam->create();
    }
    public function store(Request $request)
    {
        return $this->exam->store($request);
    }
    public function show($id)
    {
        return $this->exam->show($id);
    }
    public function edit($id)
    {
        return $this->exam->edit($id);
    }
    public function update(Request $request, $id)
    {
        return $this->exam->update($request, $id);
    }
    public function destroy($id)
    {
        return $this->exam->destroy($id);
    }
}
