<?php
namespace App\Repository\Graduated;

use App\Models\Grade;
use App\Models\Student;

class GraduatedRepository implements GraduatedRepositoryInterface{
    public function Index(){
        $students = Student::onlyTrashed()->get();
        return view('pages.students.Graduated.index', compact('students'));
    }

    public function Create(){
        $grades = Grade::all();
        return view('pages.students.Graduated.add_graduated', compact('grades'));
    }

    public function softDeletes($request){
        $students = Student::where('grade_id', $request->grades)->where('classroom_id', $request->classrooms)->where('section_id', $request->sections)->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }
        foreach($students as $student){
            $ids = explode(',', $student->id);
            student::whereIn('id', $ids)->Delete();
        }
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('graduated.index');

    }

    public function edit($id) {
        Student::onlyTrashed()->where('id', $id)->first()->restore();
        toastr()->success(__('site.updated_successfully'));
        return redirect()->route('graduated.index');
    }
    public function destroy($id) {
        Student::onlyTrashed()->where('id', $id)->first()->forceDelete();
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('graduated.index');
    }
}
