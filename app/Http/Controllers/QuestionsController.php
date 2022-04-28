<?php

namespace App\Http\Controllers;

use App\Repository\Questions\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    protected $question;
    public function __construct(QuestionRepositoryInterface $question){
        $this->question = $question;
    }

    public function index(){
        return $this->question->index();
    }

    public function create(){
        return $this->question->create();
    }

    public function store(Request $request){
        return $this->question->store($request);
    }

    public function show($id){}

    public function edit($id){
        return $this->question->edit($id);
    }

    public function update(Request $request, $id){
        return $this->question->update($request, $id);
    }

    public function destroy($id){
        return $this->question->destroy($id);
    }
}
