<?php

namespace App\Repository\Qizzes;

use App\Models\Grade;
use App\Models\Quiz;
use App\Models\Subject;
use App\Models\Teacher;

class QuizzRepository implements QuizzRepositoryInterface {
    public function index(){
        $quizes = Quiz::get();
        return view('pages.Quiz.index', compact('quizes'));
    }

    public function create(){
        $grades = Grade::get();
        $subjects = Subject::get();
        $teachers = Teacher::get();
        return view('pages.Quiz.create', compact('grades','subjects','teachers'));
    }

    public function store($request){
        $request->validate([
            'ar_quiz'       => 'required',
            'en_quiz'       => 'required',
            'subject_id'    => 'required',
            'teacher_id'    => 'required',
            'grades'      => 'required',
            'classrooms'  => 'required',
            ]);
        $quiz = new Quiz();
        $quiz->name        = ['ar' => $request->ar_quiz, 'en'=> $request->en_quiz];
        $quiz->subject_id  = $request->subject_id;
        $quiz->teacher_id  = $request->teacher_id;
        $quiz->grade_id      = $request->grades;
        $quiz->classroom_id  = $request->classrooms;
        $quiz->section_id    = $request->sections;
        $quiz->save();
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('quizes.index');
    }

    public function edit($id){
        $quiz = Quiz::findOrFail($id);
        $grades = Grade::get();
        $subjects = Subject::get();
        $teachers = Teacher::get();
        return view('pages.Quiz.edit', compact('grades','subjects','teachers','quiz'));
    }

    public function update($request, $id){
        $request->validate([
            'ar_quiz'       => 'required',
            'en_quiz'       => 'required',
            'subject_id'    => 'required',
            'teacher_id'    => 'required',
            'grades'      => 'required',
            'classrooms'  => 'required',
            ]);
        $quiz = Quiz::findOrFail($id);
        $quiz->name        = ['ar' => $request->ar_quiz, 'en'=> $request->en_quiz];
        $quiz->subject_id  = $request->subject_id;
        $quiz->teacher_id  = $request->teacher_id;
        $quiz->grade_id      = $request->grades;
        $quiz->classroom_id  = $request->classrooms;
        $quiz->section_id    = $request->sections;
        $quiz->save();
        toastr()->info(__('site.updated_successfully'));
        return redirect()->route('quizes.index');
    }

    public function destroy($id){
        Quiz::findOrFail($id)->delete();
        toastr()->error(__('site.deleted_successfully'));
        return redirect()->route('quizes.index');

    }
}
