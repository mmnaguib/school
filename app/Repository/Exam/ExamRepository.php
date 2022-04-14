<?php

namespace App\Repository\Exam;

use App\Models\Exam;
use App\Models\Grade;

class ExamRepository implements ExamRepositoryInterface{
    public function index(){
        $exams = Exam::get();
        return view('pages.Exams.index', compact('exams'));
    }

    public function show($id){

    }

    public function create(){
        return view('pages.Exams.create');
    }

    public function store($request){
        $exam = new Exam();
        $exam->name = ['ar'=> $request->ar_exam, 'en'=> $request->en_exam];
        $exam->term = $request->term;
        $exam->academic_year = $request->academic_year;
        $exam->save();
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('exams.index');
    }

    public function edit($id){
        $exam = Exam::findOrFail($id);
        return view('pages.Exams.edit', compact('exam'));
    }

    public function update($request, $id){
        $exam = Exam::findOrFail($id);
        $exam->name = ['ar'=> $request->ar_exam, 'en'=> $request->en_exam];
        $exam->term = $request->term;
        $exam->academic_year = $request->academic_year;
        $exam->save();
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('exams.index');
    }

    public function destroy($id){
        $exam = Exam::findOrFail($id)->delete();
        toastr()->error(__('site.deleted_successfully'));
        return redirect()->route('exams.index');
    }
}
