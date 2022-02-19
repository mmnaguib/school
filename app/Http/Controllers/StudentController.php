<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Students\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected $student;
    public function __construct(StudentRepositoryInterface $student){
        $this->student = $student;
    }
    public function index()
    {
        $students = $this->student->getAllStudents();
        return view('pages.students.student', compact('students'));
    }
    public function create()
    {
        return $this->student->createStudent();
    }
    public function store(Request $request)
    {
        $this->student->storeStudents($request);
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('students.index');
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        
    }
    public function update(Request $request, $id)
    {
    
    }
    public function destroy($id)
    {
        //
    }
}
