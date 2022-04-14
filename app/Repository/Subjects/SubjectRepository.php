<?php

namespace App\Repository\Subjects;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectRepository implements SubjectRepositoryInterface {
    Public function index(){
        $subjects = Subject::all();
        return view('pages.Subjects.index', compact('subjects'));
    }

    Public function create(){
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Subjects.create', compact('grades','teachers'));

    }
    Public function store($request){
        $request->validate([
            'ar_subject'   => 'required',
            'en_subject'   => 'required',
            'Grade_id'     => 'required',
            'Class_id'     => 'required',
            'teacher_id'   => 'required',
        ]);
        $subject = new Subject();
        $subject->name = ['ar' => $request->ar_subject, 'en' => $request->en_subject];
        $subject->grade_id = $request->Grade_id;
        $subject->classroom_id = $request->Class_id;
        $subject->teacher_id = $request->teacher_id;
        $subject->save();
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('subjects.index');
    }


    Public function show($id){

    }

    Public function edit($id){
        $grades = Grade::all();
        $teachers = Teacher::all();
        $subject = Subject::findOrFail($id);
        return view('pages.Subjects.edit', compact('grades','teachers','subject'));
    }

    Public function update($request, $id){
        $request->validate([
            'ar_subject'   => 'required',
            'en_subject'   => 'required',
            'Grade_id'     => 'required',
            'Class_id'     => 'required',
            'teacher_id'   => 'required',
        ]);
        $subject = Subject::findOrFail($id);
        $subject->name = ['ar' => $request->ar_subject, 'en' => $request->en_subject];
        $subject->grade_id = $request->Grade_id;
        $subject->classroom_id = $request->Class_id;
        $subject->teacher_id = $request->teacher_id;
        $subject->save();
        toastr()->success(__('site.updated_successfully'));
        return redirect()->route('subjects.index');
    }

    Public function destroy($id){
        Subject::findOrFail($id)->delete();
        toastr()->error(__('site.deleted_successfully'));
        return redirect()->route('subjects.index');
    }
}
