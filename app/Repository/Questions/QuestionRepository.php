<?php

namespace App\Repository\Questions;

use App\Models\Question;
use App\Models\Quiz;

class QuestionRepository implements QuestionRepositoryInterface {
    public function index(){
        $questions = Question::get();
        return view('pages.Questions.index', compact('questions'));
    }
    public function create(){
        $quizes = Quiz::get();
        return view('pages.Questions.create', compact('quizes'));
    }
    public function store($request){
        $request->validate([
            'title'         => 'required',
            'answers'       => 'required',
            'right_answer'  => 'required',
            'score'         => 'required',
            'quiz_id'       => 'required',
        ]);
        $question = new Question();
        $question->title = $request->title;
        $question->answers = $request->answers;
        $question->right_answer = $request->right_answer;
        $question->score = $request->score;
        $question->quiz_id = $request->quiz_id;
        $question->save();
        toastr()->success(__('site.added_successfully'));
        return redirect()->route('questions.index');
    }
    public function edit($id){
        $question = Question::findOrFail($id);
        $quizes = Quiz::get();
        return view('pages.Questions.edit', compact('quizes','question'));
    }
    public function update($request, $id){
        $request->validate([
            'title'         => 'required',
            'answers'       => 'required',
            'right_answer'  => 'required',
            'score'         => 'required',
            'quiz_id'       => 'required',
        ]);
        $question = Question::findOrFail($id);
        $question->title = $request->title;
        $question->answers = $request->answers;
        $question->right_answer = $request->right_answer;
        $question->score = $request->score;
        $question->quiz_id = $request->quiz_id;
        $question->save();
        toastr()->info(__('site.updated_successfully'));
        return redirect()->route('questions.index');
    }
    public function destroy($id){
        Question::findOrFail($id)->delete();
        toastr()->error(__('site.deleted_successfully'));
        return redirect()->route('questions.index');
    }
}
