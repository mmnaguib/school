<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;
class TeacherController extends Controller
{
    protected $teacher;
    public function __construct(TeacherRepositoryInterface $Teacher){
        $this->teacher = $Teacher;
    }
    public function index(){
        $teachers = $this->teacher->getAllTeachers();
        return view('pages.teachers.teachers', compact('teachers'));
    }
    public function create(){
        $specializations = $this->teacher->getAllSpecializations();
        $genders = $this->teacher->getAllGenders();
        return view('pages.teachers.create', compact('specializations','genders'));
    }
    public function store(Request $request){
        $this->teacher->storeTeachers($request);
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('teachers.index');
    }
    public function show($id)
    {}
    public function edit($id){
        $specializations = $this->teacher->getAllSpecializations();
        $genders = $this->teacher->getAllGenders();
        $teacher = $this->teacher->getTeacher($id);
        return view('pages.teachers.edit', compact('specializations','genders','teacher'));
    }
    public function update(Request $request, $id){
        $this->teacher->updateTeachers($request, $id);
        toastr()->success(__('site.updated_successfully'));
        return redirect()->route('teachers.index');
    }
    public function destroy($id)
    {
        $teacher = $this->teacher->getTeacher($id);
        $teacher->delete();
        toastr()->success(__('site.deleted_successfully'));
        return redirect()->route('teachers.index');
    }
}
