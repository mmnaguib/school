<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;

use App\Models\Section;
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
        return $this->student->showStudent($id);
    }
    public function edit($id)
    {
        return $this->student->editStudent($id);
    }
    public function update(Request $request, $id)
    {
        $this->student->updateStudent($request, $id);
        toastr()->success(__('site.updated_successfully'));
        return redirect()->route('students.index');
    }
    public function destroy($id)
    {
        $this->student->deleteStudent($id);
        toastr()->error(__('site.deleted_successfully'));
        return redirect()->route('students.index');
    }

    public function getSections($id){
        $list_sections = Section::where('class_id', $id)->pluck("section_name", "id");
        return $list_sections;
    }
    public function destroyImage($id) {
        return $id;
    }
    public function uploadAttachment(Request $request) {
        return $this->student->uploadAttachment($request);
    }

    public function download_attachment($student_name, $file_name){
        return $this->student->download_attachment($student_name, $file_name);
    }
    public function delete_attachment(Request $request, $id){
        return $this->student->delete_attachment($request, $id);
    }
}
