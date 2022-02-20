<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Repository\Students\StudentRepositoryInterface;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

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
}
